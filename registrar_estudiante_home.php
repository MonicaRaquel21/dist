<?php

    session_start();
	include_once "controller/db.php";
    $name = $_SESSION['usuario'];
    if($name == null){
        header("location: pages-login.php");
    }
?>

<?php include_once 'includes/header.php'; ?>
        <!-- App css -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
		
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/jquery-ui.min.js"></script>
		
		<SCRIPT type="text/javascript">
		
		$(document).ready(function(){
			
			$("#edad").load("edad.php");
			$("#nacademico").load("nivel_academico.php");
			
			$("#Enviar").click( function () {
				var myForm = $('#demo-form');
				if(myForm[0].checkValidity()) 
					{
					var formdata=$('#demo-form').serialize();
					var url='guardar_estudiante.php';
			   
					$.post(url, formdata, function(data){
						alert(data);
					$("#exito").removeClass("d-none");
					myForm[0].reset();
					});
				}
				else
				$("exito").addClass("d-none");
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
                                            <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Estudiantes</a></li>
                                            <li class="breadcrumb-item active">Registro de Estudiantes</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Estudiantes</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="alert alert-warning d-none fade show" id="msjerror">
                            <h4 class="mt-0">Algo Salio Mal!</h4>
                            <p class="mb-0">No se pudo enviar el formulario por campos vacios</p>
                        </div>
						
						<div class='alert alert-success d-none' role='alert' id="exito">
                        <h4 class='alert-heading'><i class='fa fa-user-plus'></i> Estudiante Agregado</h4>
                        <p>Estudiante agregado exitosamente.</p>
                        </div>
							
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="header-title mb-3">Registrar Estudiante</h4>

                                        <form id="demo-form" method="POST" >
                                            <div id="progressbarwizard">

                                                <ul class="nav nav-pills bg-light nav-justified form-wizard-header mb-3">
                                                    <li class="nav-item">
                                                        <a href="#account-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                            <i class="mdi mdi mdi-account-outline mr-1"></i>
                                                            <span class="d-none d-sm-inline">Datos Estudiante</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#profile-tab-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                            <i class="mdi  mdi mdi-account-multiple-minus-outline
                                                            mr-1"></i>
                                                            <span class="d-none d-sm-inline">Datos Padre</span>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="#finish-2" data-toggle="tab" class="nav-link rounded-0 pt-2 pb-2">
                                                            <i class="mdi  mdi mdi-account-check-outline mr-1"></i>
                                                            <span class="d-none d-sm-inline">Final</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            
                                                <div class="tab-content b-0 mb-0 pt-0">
                                            
                                                    <div id="bar" class="progress mb-3" style="height: 7px;">
                                                        <div class="bar progress-bar progress-bar-striped progress-bar-animated bg-success"></div>
                                                    </div>
                                            
                                                    <div class="tab-pane" id="account-2">
                                                        <div class="row">
                                                            <div class="col-12" >
                                                            <div class="form-group row mb-3" >
                                                                    <label class="col-md-3
                                                                    . col-form-label"  type="hidden" for="userName1"></label>
                                                                    <div class="col-md-4">
                                                                        <input type="hidden" class="form-control" name="idestudiante" id="idestudiante">
                                                                    </div>
                                                                    </div>
                                                                <div class="form-group row mb-3">
                                                                    <label class="col-md-1 col-form-label" for="userName1">Nombres</label>
                                                                    <div class="col-md-5">
                                                                        <input type="text" name="nombres" class="form-control" id="nombres"  required="">
                                                                    </div>
                                                              
                                                               
                                                                    <label class="col-md-1 col-form-label" for=""> Apellidos</label>
                                                                    <div class="col-md-5">
                                                                        <input type="text" id="apellidos" name="apellidos" class="form-control" required="" >
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-3" >
                                                                    <label class="col-md-1 col-form-label" for=""> Edad</label>
                                                                    <div class="col-md-1">
                                                                    <select class="form-control" name="edad" id="edad" required="">
                                                                    </select>
                                                                </div>
                                                                 <label class="col-md-3 col-form-label" for=""> Nivel Academico al que Aplica</label>
                                                                <div class="col-md-2">
                                                                    <select class="form-control" id="nacademico" name="nacademico" required="">
                                                                    </select>
																</div>	
																<label class="col-md-2 col-form-label" for=""> Telefono de Estudiante (Si Posee)</label>
                                                                <div class="col-md-3">
                                                                       <input class="form-control" type="number" name="telestudiante" >
                                                                </div>
															 </div>
                                                                <div class="form-group row mb-3"  >
																<label class="col-md-1 col-form-label" for="">Direccion</label>
                                                                <div class="col-md-12">
                                                                    <input type="text" id="direccion" name="direccion" class="form-control" required="">
                                                                </div>
                                                                </div>
                                                               
                                                                <div class="form-group row mb-3" >
                                                                    <label class="col-md-2
                                                                    . col-form-label" for="userName1">Institucion Educativa de donde Proviene</label>
                                                                    <div class="col-md-5">
                                                                        <input type="text" class="form-control" id="institucionproviene" name="institucionproviene" required="">
                                                                    </div>
                                                       
                                                               
                                                                    <label class="col-md-1 col-form-label" for="">Religion</label>
                                                                    <div class="col-md-4">
                                                                        <input type="text" id="religion" name="religion" class="form-control" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row mb-3" >
                                                                    <label class="col-md-2
                                                                    . col-form-label" for="userName1">El estudiante Posee Facebook</label>
                                                                    <div class="col-md-2">
                                                                        <select class="form-control" id="poseefacebook" name="poseefacebook" required="">
                                                                            <option value="1">Si</option>
                                                                            <option value="2">No</option>
                                                                        </select>
                                                                    </div>
                                                                    <label class="col-md-2
                                                                    . col-form-label" for="userName1">Nombre de Cuenta de Facebook</label>
                                                                    <div class="col-md-6">
                                                                        <input type="text" id="facebook" name="facebook" class="form-control" >
                                                                    </div>
                                                               
                                                                </div>
                                                                <div class="form-group row mb-3" >
                                                                    
                                                              
                                                               
                                                                    <label class="col-md-2 col-form-label" for="">Quien lo Recomienda</label>
                                                                    <div class="col-md-10">
                                                                        <input type="text" id="recomienda" name="recomienda" class="form-control" required="">
                                                                    </div>
                                                                </div>
                                                          
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <div class="tab-pane" id="profile-tab-2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                               <div class="form-group row mb-3" >
                                                                <label class="col-md-2 col-form-label" for=""> Nombre del Padre</label>
                                                                    <div class="col-md-6">
                                                                        <input type="text" id="nombrepadre" name="nombrepadre" class="form-control" required="" >
                                                                    </div>
																	<label class="col-md-2 col-form-label" for=""> Telefono del Padre </label>
                                                                    <div class="col-md-2">
                                                                        <input class="form-control"  type="number" name="telpadre" required="">
                                                                 </div>
                                                                </div>
                                                                <div class="form-group row mb-3" >
																<label class="col-md-2 col-form-label" for=""> Lugar de Trabajo Padre</label>
                                                                <div class="col-md-10">
                                                                    <input type="text" id="password1" name="lugartrabajopadre" class="form-control" required="" >
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-3" >

                                                                <label class="col-md-2 col-form-label" for=""> Nombre de la Madre </label>
                                                                <div class="col-md-6">
                                                                    <input type="text" id="password1" name="nombremadre" class="form-control" required="" >
                                                            </div>

                                                            <label class="col-md-2 col-form-label" for=""> Telefono de la Madre</label>
                                                                    <div class="col-md-2">
                                                                        <input class="form-control"  type="number" name="telmadre" required="">
                                                                </div>
                                                        </div>
                                                        <div class="form-group row mb-3" >

                                                            <label class="col-md-2 col-form-label" for=""> Lugar de Trabajo Madre</label>
                                                            <div class="col-md-10">
                                                                <input type="text" id="password1" name="lugartrabajomadre" class="form-control" required="" >
                                                        </div>

                                                    </div>
                                                    <div class="form-group row mb-3">
														<label for="example-email" class="col-md-2 col-form-label">Persona responsable del estudiante</label>
                                                               <div class="col-md-10">
                                                                  <input type="text" id="nombreencargado" name="nombreencargado" class="form-control" placeholder="Nombre" required="">
                                                            </div>
													</div>
													<div class="form-group row mb-3">
													<label for="example-email" class="col-md-2 col-form-label">Correo electronico</label>
                                                               <div class="col-md-7">
                                                                  <input type="email" id="emailencargado" name="emailencargado" class="form-control" placeholder="Email del responsable" required="">
                                                            </div>
															<label for="example-email" class="col-md-1 col-form-label">Telefono</label>
                                                               <div class="col-md-2">
                                                                  <input type="number" id="telefonoencargado" name="telefonoencargado" class="form-control" placeholder="Tel. responsable" required="">
                                                            </div>
													</div>														
													<div class="form-group mb-12">
												       <label>El Estudiante Vive Con:</label>
													   <?php
													$sql="SELECT * FROM vive_con;";
													$result=mysqli_query($con,$sql);
													while( $row=mysqli_fetch_array($result,MYSQLI_NUM))
													{
														echo '<div class="radio mb-1">';
														echo '<input type="radio" name="vivecon" id="'.$row[0].'" value="'.$row[0].'" required="">';
														echo '<label for="'.$row[0].'">';
														echo $row[1];
														echo '</label>';
														echo '</div>';
													}	
													mysqli_close($con); 
												?>
												<div class="radio mb-2">
                                                     <input type="radio" name="vivecon" id="genders1" value="999">
                                                     <label for="genders1">
                                                      Otros
                                                     </label>
                                                  </div>
                                                            
                                                 </div>

                                                        <div class="form-group row mb-3" >

                                                            <label class="col-md-2 col-form-label" for=""> Vive Con Otros (Especifique el Parentesco):</label>
                                                            <div class="col-md-3">
                                                                <input type="text" id="viveconotros" name="viveconotros" class="form-control" >
                                                        </div>

                                                        <label class="col-md-2 col-form-label" for=""> La Razon por la cual desea que su Hijo/a Estudie en esta Institución es:</label>
                                                        <div class="col-md-5">
                                                            <input type="text" id="razon" name="razon" class="form-control" required="" >
                                                    </div>
                                                    </div>
                                                                
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </div>

                                                    <div class="tab-pane" id="finish-2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="text-center">
                                                                    <h2 class="mt-0"><i class="mdi mdi-check-all"></i></h2>
                                                                    <h3 class="mt-0">Enviar Formulario !</h3>

                                                                    <p class="w-75 mb-2 mx-auto">.</p>

                                                                    <div class="mb-3">
                                                                        <div class="custom-control custom-checkbox">
                                                                           
                                                                            <div class="form-group mb-0">
                                                                                <br>
                                                                                <br>
                                                                                <input type="submit" class="btn btn-success" id="Enviar" name="Enviar" value="Enviar">
                                                                            </div>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- end col -->
                                                        </div> <!-- end row -->
                                                    </div>

                                                  

                                                </div> <!-- tab-content -->
                                            </div> <!-- end #progressbarwizard-->
                                        </form>

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->

                        </div> 
                        <!-- end row -->
                        
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

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div class="rightbar-title">
                <a href="javascript:void(0);" class="right-bar-toggle float-right">
                    <i class="mdi mdi-close"></i>
                </a>
                <h5 class="m-0 text-white">Settings</h5>
            </div>
            <div class="slimscroll-menu">
                <!-- User box -->
                <div class="user-box">
                    <div class="user-img">
                        <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                        <a href="javascript:void(0);" class="user-edit"><i class="mdi mdi-pencil"></i></a>
                    </div>
            
                    <h5><a href="javascript: void(0);">Marcia J. Melia</a> </h5>
                    <p class="text-muted mb-0"><small>Product Owner</small></p>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <div class="row">
                    <div class="col-6 text-center">
                        <h4 class="mb-1 mt-0">8,504</h4>
                        <p class="m-0">Balance</p>
                    </div>
                    <div class="col-6 text-center">
                        <h4 class="mb-1 mt-0">8,504</h4>
                        <p class="m-0">Balance</p>
                    </div>
                </div>
                <hr class="mb-0" />

                <div class="p-3">
                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                        <label class="custom-control-label" for="customSwitch1">Notifications</label>
                    </div>
                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" class="custom-control-input" id="customSwitch2">
                        <label class="custom-control-label" for="customSwitch2">API Access</label>
                    </div>
                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" class="custom-control-input" id="customSwitch3" checked>
                        <label class="custom-control-label" for="customSwitch3">Auto Updates</label>
                    </div>
                    <div class="custom-control custom-switch mb-2">
                        <input type="checkbox" class="custom-control-input" id="customSwitch4" checked>
                        <label class="custom-control-label" for="customSwitch4">Online Status</label>
                    </div>
                </div>

                <!-- Timeline -->
                <hr class="mt-0" />
                <h5 class="pl-3 pr-3">Messages <span class="float-right badge badge-pill badge-danger">25</span></h5>
                <hr class="mb-0" />
                <div class="p-3">
                    <div class="inbox-widget">
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/user-2.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Tomaslau</a></p>
                            <p class="inbox-item-text">I've finished it! See you so...</p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/user-3.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Stillnotdavid</a></p>
                            <p class="inbox-item-text">This theme is awesome!</p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/user-4.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Kurafire</a></p>
                            <p class="inbox-item-text">Nice to meet you</p>
                        </div>

                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/user-5.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Shahedk</a></p>
                            <p class="inbox-item-text">Hey! there I'm available...</p>
                        </div>
                        <div class="inbox-item">
                            <div class="inbox-item-img"><img src="assets/images/users/user-6.jpg" class="rounded-circle" alt=""></div>
                            <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Adhamdannaway</a></p>
                            <p class="inbox-item-text">This theme is awesome!</p>
                        </div>
                    </div> <!-- end inbox-widget -->
                </div> <!-- end .p-3-->

            </div> <!-- end slimscroll-menu-->
        </div>
        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- Plugins js-->
        <script src="assets/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>

        <!-- Init js-->
        <script src="assets/js/pages/form-wizard.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
                <!-- Plugin js-->
                <script src="assets/libs/parsleyjs/parsley.min.js"></script>

                <!-- Validation init js-->
                <script src="assets/js/pages/form-validation.init.js"></script>
				
				
        
    </body>
</html>