@extends('Admin.layout')
@section('header')
	<h1>
	    Compras
	    <small> Detalle de las compras</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Compras</li>
  	</ol>
@stop

@section('contenido')
	<div class="box box-warning col-md-8">
	    <div class="box-header">
	      <h3 class="box-title">Detalle de las compras</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body col-md-12 bg-success table-responsive">
	      <table id="example1" class="table table-bordered table-striped">
	        <thead>
	        	<tr>
	        		<th>Venta</th>
	        		<th>Usuario</th>	        		
	        		<th>Producto</th>	        		
	        		<th>Precio</th>
	        		<th>Cantidad unidad</th>
	        		<th>Total</th>
	        		@if(auth()->user()->rol_id == 1)
	        		    <th>Acciones</th>
	        		@endif
	        	</tr>
	        </thead>
	        
	        <tbody>
	        	@foreach($compras as $compra)	
	        		<tr>
	        			<td>{{ $compra->id }}</td>
	        			<td>{{ $compra->name }}</td>	        			
	        			<td>{{ $compra->nombreProducto }}</td>
	        			<td>{{ $compra->precioProducto }}</td>
	        			<td>{{ $compra->cantidad }}</td>
	        			@php
	        				$valor = $compra->cantidad * $compra->precioProducto;
	        				$valor = number_format($valor, 0, ",", ".");
	        			@endphp
	        			<td>{{ $valor }}</td>
	        			<td>
	        				<a href="{{ route('compra.eliminarCompra', $compra->id) }}" class="btn btn-xs btn-danger"></i>Eliminar</a>
	        			</td>
		        		
	        		</tr>
	        	@endforeach
	        	
	        </tbody>
	      </table>
	    </div>
	    <!-- /.box-body -->
	  </div>
	  
@stop