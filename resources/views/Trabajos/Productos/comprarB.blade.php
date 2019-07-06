@extends('Admin.layout')
@section('header')
	<h1>
	    Productos
	    <small> Comprar productos</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Productos</li>
  	</ol>
@stop

@section('contenido')
	<div class="box box-warning col-md-8">
	    <div class="box-header">
	      <h3 class="box-title">Comprar productos</h3>
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
        		    <th>Acciones</th>
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
        			    <td>
		        			<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#exampleModal{{$producto->id}}">Comprar</button>
		        			
		        			<div class="modal fade" id="exampleModal{{$producto->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

								<form method="POST" action="{{ route('productos.realizarCompra') }}">
						    	{{ csrf_field() }}
							    	<div class="modal-dialog" role="document">

									    <div class="modal-content">
									    	<input type="hidden" name="idProducto" value="{{$producto->id}}">
									      <div class="modal-header">
									        <h3 class="modal-title" id="exampleModalLabel">{{ $producto->nombreProducto }}</h3>
									        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
									          <span aria-hidden="true">&times;</span>
									        </button>
									      </div>

									      <div class="modal-body">

								        	<div class="form-group col-md-2">
								    			<label>lote</label>
								    			<h4>{{ $producto->loteProducto }}</h4>
								    		</div>
								    		<div class="form-group col-md-5">
								    			<label>fecha Vencimiento</label>
								    			<h4>{{ $producto->vencimientoProducto }}</h4>
								    		</div>
								    		<div class="form-group col-md-2">
								    			<label>Precio</label>
								    			<h4>{{ $producto->precio }}</h4>
								    			<input type="hidden" name="precio" value="{{ $producto->precio }}">
								    		</div>
								    		<div class="form-group col-md-2">
								    			<label>Exitencias</label>
								    			<h4>{{ $producto->cantidadProducto }}</h4>
								    		</div>
								    		<div class="form-group col-md-6">
								    			<label class="text-danger">Cantidad que desea comprar</label>
								    			<input id="cantidadCompra" name="cantidad" class="form-control" onchange="calcular(this, '{{ $producto->cantidadProducto }}','{{ $producto->precio }}')" required></input>
								    		</div>
									      </div>
									      <div class="modal-footer">
									        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
									        <button type="submit"id="boton" class="btn btn-success">Comprar Producto</button>
									      </div>
									    </div>
									</div>								
								</form>
								<script type="text/javascript">
								  	function calcular(e, cantidadProducto, precio){
								  		console.log(e.value);
							    		console.log(cantidadProducto);
							    		if( Number(e.value) > Number(cantidadProducto))
							    		{
							    			alert('la cantidad de compra no puede ser mayor a las existencias');
							    			document.getElementById("boton").style.display='none';
							    		}
							    		else{
							    			
							    			var total = e.value * precio;
							    			alert('El total a pagar es '+total);
							    			document.getElementById("boton").style.display='';	
							    		}							    		
								  	}
								  </script>
					  		</div>
		        		</td>
                        
		        		
	        		</tr>
	        	@endforeach
	        	
	        </tbody>
	      </table>
	    </div>
	    <!-- /.box-body -->
	  </div>

	  
@stop