@extends('Admin.layout')
@section('header')
	<h1>
	    Productos
	    <small> Detalle de los productos</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Productos</li>
  	</ol>
@stop

@section('contenido')
	<div class="box box-warning col-md-8">
	    <div class="box-header">
	      <h3 class="box-title">Detalle de los productos</h3>
	    </div>
	    <!-- /.box-header -->
	    <div class="box-body col-md-12 bg-success table-responsive">
	      <table id="example1" class="table table-bordered table-striped">
	        <thead>
	        	<tr>
	        		<th>Codigo</th>
	        		<th>Nombre</th>
	        		<th>Lote</th>
	        		<th>Fecha de Vencimiento</th>
	        		<th>Cantidad</th>
	        		<th>Precio</th>
	        		@if(auth()->user()->rol_id == 1)
	        		    <th>Acciones</th>
	        		@endif
	        	</tr>
	        </thead>
	        
	        <tbody>
	        	@foreach($productos as $producto)	
	        		<tr>
	        			<td>{{ $producto->codigoProducto }}</td>
	        			<td>{{ $producto->nombreProducto }}</td>
	        			<td>{{ $producto->loteProducto }}</td>
	        			<td>{{ $producto->vencimientoProducto }}</td>
	        			<td>{{ $producto->cantidadProducto }}</td>
	        			<td>{{ $producto->precio }}</td>
	        			@if(auth()->user()->rol_id == 1)
	        			    <td>
		        			<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#exampleModal{{$producto->id}}">Editar</button>
		        			
		        			<div class="modal fade" id="exampleModal{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

								<form method="POST" action="{{ route('productos.update') }}">
						    	{{ csrf_field() }}
							    	<div class="modal-dialog" role="document">

									    <div class="modal-content">

									      <div class="modal-header">
									        <h3 class="modal-title" id="exampleModalLabel">{{ $producto->codigoProducto }}</h3>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>

									      <div class="modal-body">
									      	<input type="hidden" value="{{$producto->id}}" name="idProducto">
								        	<div class="form-group col-md-6">
								    			<label>Codigo</label>
								    			<input name="codigo" class="form-control" value="{{ $producto->codigoProducto }}"  required></input>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Nombre</label>
								    			<input name="nombre" class="form-control" value="{{ $producto->nombreProducto }}" required></input>	    			
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Lote</label>
								    			<input name="lote" class="form-control" value="{{ $producto->loteProducto }}" required></input>	    			
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Fecha vencimiento</label>
								    			<input type="date" name="vencimiento" class="form-control" value="{{ $producto->vencimientoProducto }}" required></input>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Cantidad</label>
								    			<input name="cantidad" class="form-control" value="{{ $producto->cantidadProducto }}" required></input>	    			
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label>Precio</label>
								    			<input name="precio" class="form-control" value="{{ $producto->precio }}" required></input>	    			
								    		</div>

									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									        <button type="submit" class="btn btn-success">Editar Producto</button>
									      </div>
									    </div>
									</div>								
								</form>
					  		</div>
		        		</td>
                        @endif
		        		
	        		</tr>
	        	@endforeach
	        	
	        </tbody>
	      </table>
	    </div>
	    <!-- /.box-body -->
	  </div>
	  
@stop