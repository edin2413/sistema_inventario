<?php

use App\Http\Controllers\VenderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route("home");
});
Route::get("/acerca-de", function () {
    return view("misc.acerca_de");
})->name("acerca_de.index");
Route::get("/soporte", function(){
    return redirect("");
})->name("soporte.index");

Auth::routes([
    "reset" => false,// no pueden olvidar contraseña
]);

Route::get('/home', 'HomeController@index')->name('home');
// Permitir logout con petición get
Route::get("/logout", function () {
    Auth::logout();
    return redirect()->route("home");
})->name("logout");


Route::middleware("auth")
    ->group(function () {
        Route::resource("clientes", "ClientesController");
        Route::resource("usuarios", "UserController")->parameters(["usuarios" => "user"]);
        #Route::resource("categorias", "CategoriasController");
        #Route::resource("sub_categorias", "SubCategoriasController");
        Route::resource("articulos", "ArticuloController");
        Route::resource("marcas", "MarcaController");
        Route::resource("modelos", "ModeloController");
        Route::resource("productos", "ProductoController");
        //Route::resource("producto", "ProductosController");
        
        Route::get("/ventas/ticket", "VentasController@ticket")->name("ventas.ticket");
        Route::resource("ventas", "VentasController");
        Route::get("/vender", "VenderController@index")->name("vender.index");
        Route::post("/productoDeVenta", "VenderController@agregarProductoVenta")->name("agregarProductoVenta");
        Route::delete("/productoDeVenta", "VenderController@quitarProductoDeVenta")->name("quitarProductoDeVenta");
        Route::post("/terminarOCancelarVenta", "VenderController@terminarOCancelarVenta")->name("terminarOCancelarVenta");
        Route::get('/searchP',[VenderController::class, 'searchP']);
        Route::get('search/productos', 'VenderController@search')->name('search.productos');
        Route::get('/modelosPorMarca/{id}', 'ModeloController@porMarcas');

        #Route::post('full-text-search/action', 'VenderController@action')->name('full-text-search.action');

        #Route::get('full-text-search/normal-search', 'VenderController@normal_search')->name('full-text-search.normal-search');

        Route::post('buscar_modelos',[ModeloController::class, 'buscar_modelos'])->name('buscar_modelos');

        #Route::post('/buscar_modelos', 'ModeloController@buscar_modelos')->name('search.buscar_modelos');

        #Route::post('buscar_modelos', 'ModeloController@buscar_modelos')->name('buscar_modelos');
        //Route::post('/getSearch', 'SearchController@getSearch')->name('post');

        
        #Route::get("/crear_producto", "ProductosController@crear_producto")->name("crear_producto");
        #Route::get('/search', [ProductosController::class, 'search']);
});

    
