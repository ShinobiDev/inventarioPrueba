@extends('Admin.layout')
@section('header')
	<h1>
	    Productos
	    <small> En esta sección podra crear o actualizar los productos</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Prodcutos</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="box box-success">
			    <div class="box-header bg-success">
			      <h3 class="box-title">Ingrese los datos del producto</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{ route('productos.almacenar') }}">
			    	{{ csrf_field() }}
			    	<div class="box-body">
			    		<div class="form-group col-md-4">
			    			<label>Codigo del producto</label>
			    			<input id="codProducto" list="listaProductos" name="codigo" class="form-control" onchange="cargar_producto(this)"> 
							<datalist id="listaProductos">
								@foreach($productos as $producto)
									<option> {{ $producto->codigoProducto }}</option>
								@endforeach
							</datalist>
			    		</div>
			    		<div class="form-group col-md-4">
			    			<label>Nombre del producto</label>
			    			<input id="nombreProducto" name="nombre" class="form-control" placeholder="Ingrese el nombre" required></input>
			    		</div>
			    		<div class="form-group col-md-4">
			    			<label>Cantidad</label>
			    			<input type="number" id="candidad" name="cantidad" class="form-control" placeholder="Ingrese la cantidad" required></input>
			    		</div>
			    		<div class="form-group col-md-4">
			    			<label>Numero de lote</label>
			    			<input type="number" id="lote" name="lote" class="form-control" placeholder="Ingrese el lote" required></input>
			    		</div>
			    		<div class="form-group col-md-4">
			    			<label>Fecha vencimiento</label>
			    			<input type="date" id="vencimiento" min="{{ $hoy }}" name="fechaVencimiento" class="form-control" placeholder="Ingrese la fecha" required></input>
			    		</div>
			    		<div class="form-group col-md-4">
			    			<label>Precio</label>
			    			<input type="number" name="precio" id="precio" class="form-control" placeholder="Ingrese el precio" required></input>
			    		</div>
			    		<div class="form-group">
			    			<button type="submit" class="btn btn-success col-md-2 col-md-offset-5">Actualizar</button>
			    		</div>

			    	</div>
			    </form>
			    
			</div>
			<input type="hidden" id="inpUrl" value="{{config('app.url')}}">
		</div>
	</div>
	<script type="text/javascript">
		/*Petición*/
		function cargar_producto(e){
				
				peticion_ajax("GET",'pruebaInventario/public/Trabajos/productos/ajaxProducto/'+e.value,{},function(respuesta_servidor){
					cargarProductos(respuesta_servidor);
				},function(e){
					console.log(e);
				});
			
		}
		/*Funcion para cargar los datos de formulario con la respuesta json*/
		function cargarProductos(datos){
	
			document.getElementById("nombreProducto").value = datos[0].nombreProducto;
			document.getElementById("candidad").value = datos[0].cantidadProducto;
			document.getElementById("lote").value = datos[0].loteProducto;
			document.getElementById("vencimiento").value = datos[0].vencimientoProducto;
			document.getElementById("precio").value = datos[0].precio;	
		}

		/*Petición Ajax*/
      function peticion_ajax(metodo,url,datos,funsuccess,funerror){
              
             $.ajaxSetup({
                headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
             });

             var url_global =document.getElementById("inpUrl").value;
             $.ajax({
                   type: metodo,
                   url: url_global+"/"+url,
                   dataType: "json",
                   data:datos,
                   success: function(result){
                         
                         funsuccess(result);
                   },
	               error: function(err){
	                  if(funerror!=undefined){
	                     funerror(err);
	                  }
	                }  
	                  
	                  
               });
      }
	</script>	
	
@stop