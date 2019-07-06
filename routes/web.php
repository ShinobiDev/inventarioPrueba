<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Ruta del metodo auth*/
Route::auth();

/*Ruta del formulario login*/
Route::get('/', function () {
    return redirect()->route('login');
});

/*Grupo de rutas de usuarios*/
Route::group(['prefix'=>'Admin','namespace'=>'Admin','middleware'=>'auth'], function(){
	Route::get('/', 'UsuariosController@panel');
});

/*Grupo de rutas de los productos*/
Route::group(['prefix'=>'Trabajos','namespace'=>'Trabajos','middleware'=>'auth'], function(){
	/*Ruta para crear los productos*/
	Route::get('productos/crear','ProductosController@crear')->name('productos.crear');
	/*Ruta para el ajax en el formulario crear producto*/
	Route::get('productos/ajaxProducto/{id}','ProductosController@cargarProducto');	
	/*Ruta para almacenar los productos*/
	Route::post('productos/almacenar','ProductosController@almacenar')->name('productos.almacenar');
	
	/*Ruta para ver los productos*/
	Route::get('productos/index','ProductosController@index')->name('productos.index');
	
	/*Ruta para crear los productos*/
	Route::get('productos/comprar','ProductosController@comprar')->name('productos.comprar');
	/*Ruta para almacenar la compra*/
	Route::post('productos/realizarCompra','ProductosController@realizarCompra')->name('productos.realizarCompra');
	/*Ruta para el ajax para cargar la informacion en la compra del producto*/
	//Route::get('productos/productoSeleccionado/{id}','ProductosController@comprarProducto');

	/*Ruta para ver las compras*/
	Route::get('productos/indexCompras','ProductosController@indexCompras')->name('productos.indexCompras');
	/*Ruta para eliminar las compras*/
	Route::get('productos/eliminarCompras/{compra_id}','ProductosController@eliminarCompras')->name('compra.eliminarCompra');	

	
});
