@extends('Admin.layout')
@section('header')
	<h1>
	    Productos
	    <small> Compra de productos</small>
  	</h1>
  	<ol class="breadcrumb">
	    <li class="active">Productos</li>
  	</ol>
@stop

@section('contenido')

	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="box box-warning">
			    <div class="box-header bg-warning">
			      <h3 class="box-title">Datos del producto</h3>
			    </div>
			    <!-- /.box-header -->
			    <form method="POST" action="{{-- route('trabajos.ordenos.almacenar') --}}">
			    	{{ csrf_field() }}
			    	<div class="box-body">
			    		<div class="form-group col-md-12">
							<label>Producto</label>
							<select id="productoSeleccionado" class="js-example-basic-single form-control" name="producto" onchange="productoSeleccionado(this)">
								@foreach($productos as $producto)
									<option value="{{ $producto->id }}">{{$producto->codigoProducto}} - {{$producto->nombreProducto}}</option>
								@endforeach
							</select>
						</div>

			    		<table class="table">
						  <thead>
						    <tr>
						      <th scope="col">Codigo</th>
						      <th scope="col">Nombre</th>
						      <th scope="col">Fecha vencimiento</th>
						      <th scope="col">Precio</th>
						    </tr>
						  </thead>
						  <tbody id="tblUsuario">
						   
						    
						  </tbody>
						</table>
						<div class="form-group col-md-offset-5">
			    			<button type="submit" class="btn btn-warning">Comprar Producto</button>
			    		</div>
			    	</div>
			    </form>
			    
			</div>
			<input type="hidden" id="inpUrl" value="{{config('app.url')}}">
		</div>
	</div>
	<script type="text/javascript">
		
		/*Petición*/
		function productoSeleccionado(e){
				
				peticion_ajax("GET",'pruebaInventario/public/Trabajos/productos/productoSeleccionado/'+e.value,{},function(respuesta_servidor){
					cargarProducto(respuesta_servidor);
				},function(e){
					console.log(e);
				});
			
		}
		/*Funcion para cargar los datos de formulario con la respuesta json*/
		function cargarProducto(datos){
		    var tabla=document.getElementById("tblProductos");
		    for(var c in datos){
		        if(datos[c]!=null){

		            var tr=document.createElement("tr");  

		            var td=document.createElement("td");            
		            tr.innerHTML=datos[c].codigoProducto;            
		            tr.append(td);

		            var td=document.createElement("td");            
		            td.innerHTML=datos[c].nombreProducto;            
		            tr.append(td);

		            var td=document.createElement("td");            
		            td.innerHTML=datos[c].venciemientoProducto;            
		            tr.append(td);
		            var td=document.createElement("td");

		            var td=document.createElement("td");            
		            td.innerHTML=datos[c].precio;            
		            tr.append(td);
		            var td=document.createElement("td");                               
		            
		            var txt="";
		            for(var a in datos[c].producto){
		               
		                txt+=datos[c].producto[a].nombreProducto+", ";  
		            }
		            td.innerHTML=txt.substring(0, txt.length-2)+".";

		            tr.append(td);

		            tabla.append(tr);		           
		        }
		    }		    
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