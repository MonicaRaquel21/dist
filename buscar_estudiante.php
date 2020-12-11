<?php
	
    session_start();
	include_once "controller/db.php";
    $name = $_SESSION['usuario'];

    if($name == null){
        header("location: pages-login.php");
    }
?>
	<?php include_once 'includes/header.php'; ?>

         <!-- third party css -->
        <link href="assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/select.bootstrap4.css" rel="stylesheet" type="text/css" />
        <!-- third party css end -->
		
		<!-- App css -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
		
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery-ui.min.js"></script>
		
		<SCRIPT type="text/javascript">
		
		$(document).ready(function(){
			
			$("#estadomatricula").load("matriculaestado.php");
			$("#edad").load("edad.php");
			$("#nacademico").load("nivel_academico.php");
					
		/*$('#basic-datatable').DataTable({
        "language": {
            "lengthMenu": "Mostrando _MENU_ filas por página",
            "zeroRecords": "No hay coincidencias",
            "info": "Mostrando  _PAGE_ de _PAGES_",
            "infoEmpty": "No filas encontradas",
            "infoFiltered": "(En _MAX_ filas en total)",
			"sSearch": "Buscar estudiante",
        }
		});*/
		
		$(".editar").click(function(){
			//$('#basic-datatable').DataTable().reload();
			//$('#basic-datatable').DataTable().ajax.reload();
			 //table.api().ajax.reload(null,false);
			 //tables.ajax.reload(null,false);
			 //tables.clear().draw();
				var id=$(this).attr("id");
				var control=1;
				$.ajax({
					url:'info_estudiante.php',
					  beforeSend: function() {
							$("#nombres").val('Cargando datos...');
							$("#exito").addClass("d-none");
						},
					type:'POST',
					dataType:'json',
					data:{ idestudiante:id,control:control}
					}).done(function(resul){
						if ((resul.codigoestudiante)!=0)
							{
								$("#idestudiante").val(id);
								$("#nombres").val(resul.nombres);
								$("#apellidos").val(resul.apellidos);
								$("#direccion").val(resul.direccion);
								$("#codigo").val(resul.codigoestudiante);
								$("#telestudiante").val(resul.telefonoestudiante);
								$("#edad").val(resul.edad);
								$("#poseefacebook").val(resul.poseefacebook);
								$("#facebook").val(resul.nombrecuentaFB);
								$("#institucionproviene").val(resul.institucionproviene);
								$("#nacademico").val(resul.grado);
								$("#recomienda").val(resul.nombrerecomienda);
								
							}
					});
		});
		
		$("#btnactualizar").click(function (){
				var myForm = $('#actualizar-estudiante');
				if(myForm[0].checkValidity()) 
					{
					  var formdata=$('#actualizar-estudiante').serialize();
					  var url='actualizar_estudiante.php';
			   
					  $.post(url, formdata, function(data){
					  $("#exito").removeClass("d-none");
					  myForm[0].reset();
					  //table.ajax.reload();
					});
					//$("#exito").removeClass("d-none");
				}
				else
				$("#exito").addClass("d-none");
			return false;	
		});
		
		$("#btnestado").click(function (){
				var myForm = $('#actualizar-estado');
				if(myForm[0].checkValidity()) 
					{
					  var formdata=$('#actualizar-estado').serialize();
					  var url='actu_estado_estu.php';
			   
					  $.post(url, formdata, function(data){
					  $("#exito1").removeClass("d-none");
					  myForm[0].reset();
					  setTimeout('location.reload();',1000);
					  //table.ajax.reload();
					});
					//$("#exito").removeClass("d-none");
				}
				else
				$("#exito1").addClass("d-none");
			return false;	
		});
		
		$(".borrar").click(function() {
				var id=$(this).attr("id");
				var control=2;
				$.ajax({
					url:'info_estudiante.php',
					  beforeSend: function() {
							//$("#nombres").val('Cargando datos...');
							$("#exito1").addClass("d-none");
						},
					type:'POST',
					dataType:'json',
					data:{ idestudiante:id,control:control}
					}).done(function(resul){
						if ((resul.codigoestudiante)!=0)
							{
								$("#idestudiante1").val(id);
								$("#estadomatricula").val(resul.estadomatricula);
							}
					})
		});
});	
 </SCRIPT>
 </head>


    <body>
		<?php include_once 'includes/menu.php'; ?>

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inicio</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Mantenimiento</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Estudiantes</a></li>
											<li class="breadcrumb-item active">Buscar</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Estudiantes</h4>
                                </div>
								
                            </div>
                        </div>     
                        <!-- end page title --> 
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Listado de estudiantes</h4>
                                        <p class="text-muted font-13 mb-4">
                                            Se muestran los estudiantes registrados en el sistema.
                                        </p>

                                        <table id="basic-datatable" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Código</th>
                                                    <th>Nombre</th>
                                                    <th>Grado</th>
                                                    <th>Edad</th>
                                                    <th>Telefono</th>
                                                    <th>Email Encargado</th>
													<th>Editar</th>
													<th>Estado</th>
                                                </tr>
                                            </thead>
                                        
                                        
                                            <tbody>
												<?php
													$sql="SELECT codigoestudiante, concat_ws(' ', nombres, apellidos) as nombre,(select grado from grados where Idgrado=grados_IdGrado) as grado,edad,telefonoEstudiante,religion,IdEstudiante FROM estudiante;";
													$result=mysqli_query($con,$sql);
													while( $row=mysqli_fetch_array($result,MYSQLI_NUM))
													{
														echo '<tr>';
														echo '<td>'.$row[0].'</td>';
														echo '<td>'.$row[1].'</td>';
														echo '<td>'.$row[2].'</td>';
														echo '<td>'.$row[3].'</td>';
														echo '<td>'.$row[4].'</td>';
														echo '<td>'.$row[5].'</td>';
														echo '<td><a class="editar" id="'.$row[6].'" data-toggle="modal" data-target="#con-close-modal"><img src="view/img/editar.jpg" style="cursor:pointer"></a></td>';
														echo '<td><a class="borrar" id="'.$row[6].'" data-toggle="modal" data-target="#con-close-modal1"><img src="view/img/estado.jpg" style="cursor:pointer"></a></td>';
														echo '</tr>';
													}	
													mysqli_close($con); 
												?>
											</tbody>
                                        </table>

                                    </div> <!-- end card body-->
                                </div> <!-- end card -->
                            </div><!-- end col-->
                        </div>
                        <!-- end row-->
						<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Actualizando Estudiante</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
												<div class='alert alert-success d-none' role='alert' id="exito">
												<h4 class='alert-heading'><i class='fa fa-user-plus'></i> Modificación exitosa</h4>
												<p>Información de estudiante actualizada.</p>
												</div>
												<form id="actualizar-estudiante">
                                                <div class="modal-body p-4">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Nombres</label>
																<input type="hidden" name="idestudiante" id="idestudiante">
                                                                <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Digite nombre" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-2" class="control-label">Apellidos</label>
                                                                <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Digite apellidos" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-3" class="control-label">Dirección</label>
                                                                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Direccion" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="field-1" class="control-label">Codigo estudiante</label>
                                                                <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Codigo" required="">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="field-5" class="control-label">Tel. Estudiante</label>
                                                                <input type="number" class="form-control" name="telestudiante" id="telestudiante" placeholder="# telefono">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">Edad</label>
                                                               <select class="form-control" name="edad" id="edad" required="">
                                                                    </select>
                                                            </div>
                                                        </div>
														  <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="field-4" class="control-label">Posee facebook</label>
                                                                <select class="form-control" id="poseefacebook" name="poseefacebook" required="">
                                                                            <option value="1">Si</option>
                                                                            <option value="2">No</option>
                                                                 </select>
                                                            </div>
                                                        </div>
                                                    </div>
													  <div class="row">
                                                      <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-5" class="control-label">Facebbok</label>
                                                                <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Cuenta de facebbok">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">Institucion anterior</label>
                                                                <input type="text" class="form-control" name="institucionproviene" id="institucionproviene" placeholder="Especifique">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="field-4" class="control-label">Grado</label>
                                                                <select class="form-control" id="nacademico" name="nacademico" required="">
                                                                    </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="field-5" class="control-label">Recomendado por</label>
                                                                <input type="text" class="form-control" id="recomienda" name="recomienda" placeholder="Especifique">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">Email encargado</label>
                                                                <input type="email" class="form-control" name="emailencargado" id="emailencargado" placeholder="Especifique">
                                                            </div>
                                                        </div>
                                                    </div>                                                
													</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
                                                    <input type="submit" id="btnactualizar" class="btn btn-info waves-effect waves-light" value="Actualizar"/>
													</form>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->
									<div id="con-close-modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Cambiando estado de estudiante</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                </div>
												<div class='alert alert-success d-none' role='alert' id="exito1">
												<h4 class='alert-heading'><i class='fa fa-user-plus'></i> Cambio de estado con exito</h4>
												<p>El estudiante ha sido actualizado.</p>
												</div>
												<form id="actualizar-estado">
                                                <div class="modal-body p-4">
                                                      <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="field-6" class="control-label">Estado de matricula</label>
                                                               <input type="hidden" name="idestudiante1" id="idestudiante1">
															   <select class="form-control" name="estadomatricula" id="estadomatricula" required="">
                                                                    </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                 	</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancelar</button>
                                                    <input type="submit" id="btnestado" class="btn btn-info waves-effect waves-light" value="Cambiar estado"/>
													</form>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- /.modal -->
					</div> <!-- container -->

                </div> <!-- content -->

               <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                2020 &copy; LC <a href="">San Antonio</a> 
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-sm-block">
                                    <a href="javascript:void(0);">About Us</a>
                                    <a href="javascript:void(0);">Help</a>
                                    <a href="javascript:void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->


            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- third party js -->
        <script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/libs/datatables/dataTables.bootstrap4.js"></script>
        <script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>
        <script src="assets/libs/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/libs/datatables/buttons.bootstrap4.min.js"></script>
        <script src="assets/libs/datatables/buttons.html5.min.js"></script>
        <script src="assets/libs/datatables/buttons.flash.min.js"></script>
        <script src="assets/libs/datatables/buttons.print.min.js"></script>
        <script src="assets/libs/datatables/dataTables.keyTable.min.js"></script>
        <script src="assets/libs/datatables/dataTables.select.min.js"></script>
        <script src="assets/libs/pdfmake/pdfmake.min.js"></script>
        <script src="assets/libs/pdfmake/vfs_fonts.js"></script>
        <!-- third party js ends -->

        <!-- Datatables init -->
        <script src="assets/js/pages/datatables.init.js"></script>
		<script src="assets/libs/custombox/custombox.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>