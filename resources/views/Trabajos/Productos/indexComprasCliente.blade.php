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
	        		<th>Producto</th>	        		
	        		<th>Precio</th>
	        		<th>Cantidad unidad</th>
	        		<th>Total</th>
	        		<th>Fecha</th>
	        	</tr>
	        </thead>
	        
	        <tbody>
	        	@foreach($compras as $compra)	
	        		<tr>
	        			<td>{{ $compra->id }}</td>	        			
	        			<td>{{ $compra->nombreProducto }}</td>
	        			<td>{{ $compra->precioProducto }}</td>
	        			<td>{{ $compra->cantidad }}</td>
	        			@php
	        				$valor = $compra->cantidad * $compra->precioProducto;
	        				$valor = number_format($valor, 0, ",", ".");
	        				$compraId = $compra->id;
	        			@endphp
	        			<td>{{ $valor }}</td>
	        			@php
	        				$fecha = $compra->created_at;
	        				$fecha = $fecha->format('d-m-Y');
	        			@endphp
	        			<td>
	        				{{ $fecha }}
	        			</td>
		        		
	        		</tr>
	        	@endforeach
	        	
	        </tbody>
	      </table>
	    </div>
	    <!-- /.box-body -->
	  </div>
	  
@stop