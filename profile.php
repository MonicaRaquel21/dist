<?php

    session_start();

    $name = $_SESSION['usuario'];
    if($name == null){
        header("location: pages-login.php");
    }
?>


<?php include_once 'includes/header.php'; ?>

<body>

<?php include_once 'includes/menu.php'; ?>
            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

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
                                            <li class="breadcrumb-item active">Perfil</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Perfil</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-lg-4 col-xl-4">
                                <div class="card-box text-center">
                                    <img src="assets/images/users/user-1.jpg" class="rounded-circle avatar-lg img-thumbnail"
                                        alt="profile-image">

                                    <h4 class="mb-0"><?php echo $name; ?></h4>
                                    <p class="text-muted">Administrador</p>


                                    <div class="text-left mt-3">
                                        <h4 class="font-13 text-uppercase">About Me :</h4>
                                        <p class="text-muted font-13 mb-3">
                                            Hi I'm Johnathn Deo,has been the industry's standard dummy text ever since the
                                            1500s, when an unknown printer took a galley of type.
                                        </p>
                                        <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ml-2">Geneva
                                                D. McKnight</span></p>

                                        <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ml-2">(123)
                                                123 1234</span></p>

                                        <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ml-2 ">user@email.domain</span></p>

                                        <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ml-2">USA</span></p>
                                    </div>

                    
                                </div> <!-- end card-box -->


                                </div> <!-- end card-box-->

                            

                            <div class="col-lg-8 col-xl-8">
                                <div class="card-box">
                                    <ul class="nav nav-pills navtab-bg">
                                      
                                        <li class="nav-item">
                                            <a href="#settings" data-toggle="tab" aria-expanded="true" class="nav-link active">
                                                <i class="mdi mdi-settings-outline mr-1"></i>Configuración
                                            </a>
                                        </li>
                                    </ul>

                                    <div class="tab-content">
                                        
                                        <div class="tab-pane show active" id="timeline">


                                        <div class="tab-pane" id="settings">
                                            <form>
                                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="mdi mdi-account-circle mr-1"></i>Cuenta de Usuario</h5>
                                                
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="firstname">Nombre de Usuario</label>
                                                            <input type="text" class="form-control" id="firstname" placeholder="Nombre Usuario">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="userpassword">Contraseña</label>
                                                            <input type="password" class="form-control" id="userpassword" placeholder="Contraseña">
                                                        </div>
                                                    </div> <!-- end col -->

                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                    <label for="example-fileinput">Cambiar Foto de Perfil</label>
                                                        <input type="file" id="example-fileinput" class="form-control-file">
                                                        </div>
                                                    </div> <!-- end col -->
                                                </div> <!-- end row -->
                                                </div> <!-- end row -->
                                                
                                                <div class="text-right">
                                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Guardar</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- end settings content-->

                                    </div> <!-- end tab-content -->
                                </div> <!-- end card-box-->

                            </div> <!-- end col -->
                        </div>
                        <!-- end row-->
                        
                    </div> <!-- container -->

                </div> <!-- content -->




          

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->


        <?php include_once 'includes/scripts.php'; ?>
        
    </body>
</html>