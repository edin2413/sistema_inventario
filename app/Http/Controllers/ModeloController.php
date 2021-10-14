<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use App\Models\Modelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ModeloController
 * @package App\Http\Controllers
 */
class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelos = DB::select('select * from marcas_modelos');
        return view('modelo.index', compact('modelos'))
        ->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelo = new Modelo();
        $marcas =  Marca::all();
        return view('modelo.create', compact('modelo'))
        ->with('marcas', $marcas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Modelo::$rules);

        $modelo = Modelo::create($request->all());

        return redirect()->route('modelos.index')
            ->with('success', 'Modelo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = Modelo::find($id);

        return view('modelo.show', compact('modelo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = Modelo::find($id);
        $marcas = Marca::all();

        return view('modelo.edit', compact('modelo'))
        ->with('marcas', $marcas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Modelo $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modelo $modelo)
    {
        request()->validate(Modelo::$rules);

        $modelo->update($request->all());

        return redirect()->route('modelos.index')
            ->with('success', 'Modelo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $modelo = Modelo::find($id)->delete();

        return redirect()->route('modelos.index')
            ->with('success', 'Modelo deleted successfully');
    }

    public function porMarcas($id){
        return Modelo::where('marca_id','=',$id)->get();
    }

    public function buscar_modelos22(Request $request)
    {
        
        $marca_id = $request->marca_id;
        
        $modelos = Modelo::where('marca_id',$marca_id)
                              ->with('modelos')
                              ->get();
        return response()->json([
            'modelos' => $modelos
        ]);
    }

    public function buscar_modelos(Request $request)
    {
        $modelos = DB::table("modelos")
        ->where("marca_id",$request->marca_id)
        ->pluck("descripcion_modelo","id");
        return response()->json($modelos);
    }

    // public function subCat(Request $request)
    // {
         
    //     $parent_id = $request->cat_id;
         
    //     $subcategories = Category::where('id',$parent_id)
    //                           ->with('subcategories')
    //                           ->get();
    //     return response()->json([
    //         'subcategories' => $subcategories
    //     ]);
    // }
}
