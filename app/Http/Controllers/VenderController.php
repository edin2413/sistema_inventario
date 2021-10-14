<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Models\Producto;
use App\ProductoVendido;
use App\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VenderController extends Controller
{

    public function terminarOCancelarVenta(Request $request)
    {
        if ($request->input("accion") == "terminar") {
            return $this->terminarVenta($request);
        } else {
            return $this->cancelarVenta();
        }
    }

    public function terminarVenta(Request $request)
    {
        // Crear una venta
        $venta = new Venta();
        $venta->id_cliente = $request->get("id_cliente");
        $venta->saveOrFail();
        $idVenta = $venta->id;
        $productos = $this->obtenerProductos();
        // Recorrer carrito de compras
        foreach ($productos as $producto) {
            // El producto que se vende...
            $productoVendido = new ProductoVendido();
            $productoVendido->fill([
                "id_venta" => $idVenta,
                "descripcion" => $producto->descripcion,
                "codigo_barras" => $producto->codigo_barras,
                "precio" => $producto->precio_venta,
                "cantidad" => $producto->cantidad,
            ]);
            // Lo guardamos
            $productoVendido->saveOrFail();
            // Y restamos la existencia del original
            $productoActualizado = Producto::find($producto->id);
            $productoActualizado->existencia_actual -= $productoVendido->cantidad;
            $productoActualizado->saveOrFail();
        }
        $this->vaciarProductos();
        return redirect()
            ->route("vender.index")
            ->with("mensaje", "Venta terminada");
    }

    private function obtenerProductos()
    {
        $productos = session("productos");
        if (!$productos) {
            $productos = [];
        }
        return $productos;
    }

    private function vaciarProductos()
    {
        $this->guardarProductos(null);
    }

    private function guardarProductos($productos)
    {
        session(["productos" => $productos,
        ]);
    }

    public function cancelarVenta()
    {
        $this->vaciarProductos();
        return redirect()
            ->route("vender.index")
            ->with("mensaje", "Venta cancelada");
    }

    public function quitarProductoDeVenta(Request $request)
    {
        $indice = $request->post("indice");
        $productos = $this->obtenerProductos();
        array_splice($productos, $indice, 1);
        $this->guardarProductos($productos);
        return redirect()
            ->route("vender.index");
    }

    public function agregarProductoVenta(Request $request)
    {
        $codigo_barras = $request->post("codigo_barras");
        $producto = Producto::where("codigo_barras", "=", $codigo_barras)->first();
        
        if (!$producto) {
            return redirect()
                ->route("vender.index")
                ->with("mensaje", "Producto no encontrado");
        }
        $this->agregarProductoACarrito($producto);
        return redirect()->route("vender.index");
    }

    public function searchP(Request $request){
        $productos = [];

        if($request->has('q')){
            $search = $request->q;
            $productos =Producto::select("id", "descripcion","codigo_barras")
                    ->where('descripcion', 'LIKE', "%$search%")
                    //->where('id', 'LIKE', "%$search%")
            		->get();
        }
        #$this->agregarProductoACarrito($productos);
        return response()->json($productos);

    }

    public function productos(Request $request){
        $search = $request->get('search');
        $querys =Producto::where('descripcion', 'LIKE', '%'.$search.'%')->get();
                    //->where('descripcion', 'LIKE', "%$search%")
                    //->where('id', 'LIKE', "%$search%")
                    //->get();
        $data = [];

        foreach ($querys as $query){
            $data[] = [
                'label' => $query->descripcion
            ];
        }
        #$this->agregarProductoACarrito($productos);
        return $data;

    }

    function action(Request $request)
    {
      if($request->ajax())
      {
          $data = Producto::search($request->get('full_text_search_query'))->get();

          return response()->json($data);
      }
    }

    private function agregarProductoACarrito($producto)
    {
        if ($producto->existencia_actual <= 0) {
            return redirect()->route("vender.index")
                ->with([
                    "mensaje" => "No hay existencias del producto",
                    "tipo" => "danger"
                ]);
        }
        $productos = $this->obtenerProductos();
        $posibleIndice = $this->buscarIndiceDeProducto($producto->codigo_barras, $productos);
        // Es decir, producto no fue encontrado
        if ($posibleIndice === -1) {
            $producto->cantidad = 1;
            array_push($productos, $producto);
        } else {
            if ($productos[$posibleIndice]->cantidad + 1 > $producto->existencia_actual) {
                return redirect()->route("vender.index")
                    ->with([
                        "mensaje" => "No se pueden agregar más productos de este tipo, se quedarían sin existencia",
                        "tipo" => "danger"
                    ]);
            }
            $productos[$posibleIndice]->cantidad++;
        }
        $this->guardarProductos($productos);
    }

    private function buscarIndiceDeProducto(string $codigo_barras, array &$productos)
    {
        foreach ($productos as $indice => $producto) {
            if ($producto->codigo_barras === $codigo_barras) {
                return $indice;
            }
        }
        return -1;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = 0;
        foreach ($this->obtenerProductos() as $producto) {
            $total += $producto->cantidad * $producto->precio_venta;
        }
        return view("vender.vender",
            [
                "total" => $total,
                "clientes" => Cliente::all(),
            ]);
    }
}
