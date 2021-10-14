<?php

namespace App\Http\Controllers;

use App\HistoricoProducto;
use App\Models\Articulo;
use App\Models\Marca;
use App\Models\Modelo;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = DB::select('select * from productos_articulos_marcas_modelos');
        return view('producto.index', compact('productos'))
        ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        $articulos = Articulo::all();
        $marcas = Marca::all();
        $modelos = Modelo::all();
        return view('producto.create', compact('producto'))
        ->with('articulos', $articulos)
        ->with('marcas', $marcas)
        ->with('modelos', $modelos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $codigo_barras = uniqid();
        $producto = new Producto();
        $producto->articulo_id = $request->get('articulo_id');
        $producto->modelo_id = $request->get('modelo_id');
        $producto->codigo_barras = $codigo_barras;
        $producto->descripcion = $request->get('descripcion');
        $producto->precio_compra = $request->get('precio_compra');
        $producto->precio_venta = $request->get('precio_venta');
        $producto->cantidad_base = $request->get('cantidad_base');
        $producto->existencia_agregar = $request->get('existencia_agregar_');
        $producto->existencia_actual = $request->get('existencia_actual_');
        $producto->saveOrFail();
        return redirect()->route("productos.index")->with("success", "Producto Creado Exitosamente");

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        #$producto = Producto::find($id);
        #return view('producto.show', compact('producto'));

        $productos = DB::select("select * from view_hitorico_productos where producto_id='$id' ");
        return view('producto.show', compact('productos'))
        ->with('i');
        #->with('marca', $marca)
        #->with('modelo', $modelo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        #$producto = new Producto();
        $producto = Producto::find($id);
        $articulos = Articulo::all();
        $marcas = Marca::all();
        $modelos = Modelo::all();
        return view('producto.edit', compact('producto'))
        ->with('articulos', $articulos)
        ->with('marcas', $marcas)
        ->with('modelos', $modelos);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        $producto->articulo_id = $request->get('articulo_id');
        $producto->modelo_id = $request->get('modelo_id');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio_compra = $request->get('precio_compra');
        $producto->precio_venta = $request->get('precio_venta');
        $producto->cantidad_base = $request->get('cantidad_base_');
        $producto->existencia_agregar = $request->get('existencia_agregar');
        $producto->existencia_actual = $request->get('existencia_actual_');
        $producto->saveOrFail();

        $historico_producto = new HistoricoProducto();
        $historico_producto->producto_id = $id;
        $historico_producto->articulo_id = $request->get('articulo_id');
        $historico_producto->modelo_id = $request->get('modelo_id');
        #$historico_producto->codigo_barras = $codigo_barras;
        $historico_producto->descripcion = $request->get('descripcion');
        $historico_producto->precio_compra = $request->get('precio_compra');
        $historico_producto->precio_venta = $request->get('precio_venta');
        $historico_producto->cantidad_base = $request->get('cantidad_base_');
        $historico_producto->existencia_agregar = $request->get('existencia_agregar');
        $historico_producto->existencia_actual = $request->get('existencia_actual_');
        $historico_producto->saveOrFail();
        return redirect()->route("productos.index")->with("success", "Producto Creado Exitosamente");

        
        #return redirect()->route("productos.index")->with("success", "Producto actualizado");
    }


    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }

    

    
}
