<?php

namespace App\Http\Controllers\Trabajos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;
use App\Compra;
use Carbon\Carbon;

class ProductosController extends Controller
{
    public function crear()
    {	
    	$productos = Producto::all();
        $hoy = Carbon::now();
        $hoy = $hoy->toDateString();
        //dd($hoy);
    	return view('Trabajos.Productos.crear', compact('productos','hoy'));
    }

    public function almacenar(Request $request)
    {
        $productoExistente = Producto::where('codigoProducto', $request->codigo)->get();
        $p = count($productoExistente);
        if($p < 1)
        {
            //dd('No existe este codigo');
            $producto = new Producto;
            $producto->codigoProducto = $request->get('codigo');
            $producto->nombreProducto = $request->get('nombre');
            $producto->cantidadProducto = $request->get('cantidad');
            $producto->loteProducto = $request->get('lote');
            $producto->vencimientoProducto = $request->get('fechaVencimiento');
            $producto->precio = $request->get('precio');
            $producto->save();
            return back()->with('flash','El producto se creo exitosamente');
        }
    	//dd($request);
    	$producto = Producto::where('codigoProducto', $request->codigo)->first();
        $producto->nombreProducto = $request->get('nombre');
        $producto->cantidadProducto = $request->get('cantidad');
        $producto->loteProducto = $request->get('lote');
        $producto->vencimientoProducto = $request->get('fechaVencimiento');
        $producto->precio = $request->get('precio');
        $producto->update();

    	//dd($producto);
    	return back()->with('flash','El producto se actualizo exitosamente');
    }

    public function index()
    {	
    	$productos = Producto::all();
    	return view('Trabajos.Productos.index', compact('productos'));
    }
    public function cargarProducto($id)
    {
    	
        return response()->json(Producto::where('codigoProducto',$id)->get());
    	//dd($producto);
    }

    public function comprar()
    {   
        $productos = Producto::all();
        return view('Trabajos.Productos.comprarB', compact('productos'));
    }

    public function realizarCompra(Request $request)
    {   
        $user = auth()->user()->id;
        //dd($request);
        $compra = new Compra;
        $compra->id_producto = $request->get('idProducto');
        $compra->id_usuario = $user;
        $compra->cantidad = $request->get('cantidad');
        $compra->precioProducto = $request->get('precio');
        $compra->estado = 1;
        $compra->save();

        $producto = Producto::where('id', (int)$request->idProducto)->first();
        $valorA = (int)$producto->cantidadProducto;
        $valorB = (int)$request->get('cantidad');
        $valorFinal = $valorA - $valorB;
        $producto->cantidadProducto = $valorFinal;
        $producto->update();

        return back()->with('flash','La compra se registro Exitosamente');
    }

    public function indexCompras()
    {
        $compras = Compra::select('compras.id','productos.nombreProducto','users.name','compras.precioProducto','compras.cantidad')
        ->join('productos','compras.id_producto','productos.id')
        ->join('users','compras.id_usuario','users.id')
        ->where('estado', 1)
        ->get();

        return view('Trabajos.Productos.indexCompras', compact('compras'));
    }

    public function eliminarCompras($compra_id)
    {   
        $c = (int)$compra_id;
        //dd($c);
        $prod = Compra::select('id_producto')->where('id',$c)->first();
        $p = (int)$prod->id_producto;

        $cant = Compra::select('cantidad')->where('id',$c)->first();
        $cant = (int)$cant->cantidad;

        $compra = Compra::where('id',$c)->first();        
        $compra->estado = 2;
        $compra->update();
        
        $producto = Producto::where('id', $p)->first();
        $valorA = (int)$producto->cantidadProducto;
        $valorB = (int)$cant;
        $valorFinal = $valorA + $valorB;
        $producto->cantidadProducto = $valorFinal;
        $producto->update();

        return back()->with('flash','La compra ha sido eliminada');

    }
    


}
