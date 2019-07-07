@extends('Admin.layout')
@section('header')
	<h1>
	    Compra realizada 
	    <small> Detalle de la compra {{ $compra[0]->id }}</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Compras</li>
  	</ol>
@stop

@section('contenido')
	<div class="box box-warning col-md-8">
	    <div class="box-header">
	      <h3 class="box-title">Factura {{ $compra[0]->id }}</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body col-md-12 bg-info table-responsive">
	      <table class="table table-bordered table-striped">
	        <thead>
	        	<tr>
	        		<th>Venta</th>
	        		<th>Producto</th>	        		
	        		<th>Precio</th>
	        		<th>Cantidad unidad</th>
	        		<th>Total</th>
	        	</tr>
	        </thead>
	        
	        <tbody>
        		<tr>
        			<td>{{ $compra[0]->id }}</td>	        			
        			<td>{{ $compra[0]->nombreProducto }}</td>
        			<td>{{ $compra[0]->precioProducto }}</td>
        			<td>{{ $compra[0]->cantidad }}</td>
        			@php
        				$valor = $compra[0]->cantidad * $compra[0]->precioProducto;
        				$valor = number_format($valor, 0, ",", ".");
        			@endphp
        			<td>{{ $valor }}</td>
        		</tr>	        	
	        </tbody>
	      </table>
	       <form method="POST" action="{{ route('compra.eliminarCompraRealizada') }}">
	    		{{ csrf_field() }}
	    		<input type="hidden" value="{{ $compra[0]->id }}" name="compraId">
	    		<div class="form-group">
	    			<button type="submit" class="btn btn-danger col-md-1 col-md-offset-2">Eliminar</button>
	    		</div>
	      </form>
	      <a href="{{ route('productos.comprar') }}" class="btn btn-primary"></i>Aceptar</a>
	    </div>
	    <!-- /.box-body -->
	  </div>
	  
@stop