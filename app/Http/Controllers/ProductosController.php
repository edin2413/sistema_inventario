<?php

namespace App\Http\Controllers;

use App\Producto;
use App\Categoria;
use App\SubCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #return view("productos.productos_index", ["productos" => Producto::all()]);
        $productos = Producto::paginate();

        return view('productos.productos_index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        $categorias =  Categoria::all();
        
        return view('productos.productos_create', compact('producto'))
        ->with('categorias', $categorias);
        #return view("productos.productos_create");
    }

    public function crear_producto(Request $request)
    {
        // $categoria_id = $request->get('categoria_id');
        // $var = $this->buscarSubCategorias($categoria_id);
        
        #$producto->categoria_id = $request->get('categoria_id');
        $categoriass = Categoria::all();
        $sub_categorias =  SubCategoria::all();
        #$this->buscarSubCategorias();
        return view('productos.productos_create', compact('categoriass'))
        ->with('sub_categorias', $sub_categorias);
        
    }

    public function buscarSubCategorias($categoria_id){
        echo $categoria_id;
        #$categoria_id = $request->get('categoria_id');
        $sub_categorias = SubCategoria::find($categoria_id);
        return view('productos.productos_create', compact('sub_categorias'));
        // $sub_categorias = [];

        // if($request->has('q')){
        //     $search = $request->q;
        //     $sub_categorias =SubCategoria::select("descripcion_sub_categoria")
        //     		->where('descripcion_sub_categoria', 'LIKE', "%$search%")
        //     		->get();
        // }
        
        // return response()->json($sub_categorias);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto();
        
        $producto->sub_categoria_id = $request->get('sub_categoria_id');
        $producto->codigo_barras = $request->get('codigo_barras');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio_compra = $request->get('precio_compra');
        $producto->precio_venta = $request->get('precio_venta');
        $producto->existencia = $request->get('existencia');
        $producto->saveOrFail();

        return redirect()->route("productos.index")->with('success', 'Producto agregado  exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        #$categoria_id=$producto->categoria_id;
        #$categorias =  Categoria::where('id',$categoria_id)->get();
        #return view('productos.productos_edit', compact('producto'))
        #->with('categorias', $categorias);


        $sub_categorias = SubCategoria::all();
        $categorias = Categoria::all();

        return view('productos.productos_edit', compact('producto'))
        ->with('categorias', $categorias)
        ->with('sub_categorias', $sub_categorias);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $producto = Producto::find($id);
        $producto->sub_categoria_id = $request->get('sub_categoria_id');
        $producto->codigo_barras = $request->get('codigo_barras');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio_compra = $request->get('precio_compra');
        $producto->precio_venta = $request->get('precio_venta');
        $existencia_agregar = $request->get('existencia_agregar');
        $existencia = $request->get('existencia');
        $producto->existencia = $existencia_agregar+$existencia;
        $producto->saveOrFail();
        return redirect()->route("productos.index")->with("success", "Producto actualizado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route("productos.index")->with("success", "Producto eliminado");
    }

    

    
}
