<?php

session_start();

$name = $_SESSION['usuario'];
if ($name == null) {
    header("location: pages-login.php");
}
?>

<?php include_once 'includes/header.php'; ?>
  <!-- App css -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
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
                                </ol>
                            </div>
                            <h4 class="page-title">Bienvenido ¡ <?php echo $name; ?> !</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <!-- Start Content-->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box" style="height: 170px;">
                                <div class="row">
                                    <div class="col-6" >
                                        <div class="avatar-sm bg-soft-primary rounded" style="width: 50px; height: 50px;">
                                            <i class="fe-user-plus avatar-title font-22 text-primary" ></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                    <h4 class="header-title mt-1 mb-4 text-right">Solicitudes Nuevas</h4>
                                        <div class="text-right">
                                            <h3 class="text-dark my-1"><span data-plugin="counterup">12</span></h3>
                                           
                                        </div>
                                    </div>
                                </div>
                             
                            </div> <!-- end card-box-->
                            </div> <!-- end col -->

                          
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box" style="height: 170px;">
                                <div class="row">
                                    <div class="col-6" >
                                        <div class="avatar-sm bg-soft-success rounded" style="width: 50px; height: 50px;">
                                            <i class="fe-user-check avatar-title font-22 text-success" ></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                    <h4 class="header-title mt-1 mb-4 text-right">Solicitudes Aceptadas</h4>
                                        <div class="text-right">
                                            <h3 class="text-dark my-1"><span data-plugin="counterup">12</span></h3>
                                           
                                        </div>
                                    </div>
                                </div>
                             
                            </div> <!-- end card-box-->
                        </div> <!-- end col -->
                           
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box" style="height: 170px;">
                                <div class="row">
                                    <div class="col-6" >
                                        <div class="avatar-sm bg-soft-danger rounded" style="width: 50px; height: 50px;">
                                            <i class="fe-user-x avatar-title font-22 text-danger" ></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                    <h4 class="header-title mt-1 mb-4 text-right">Solicitudes Rechasadas</h4>
                                        <div class="text-right">
                                            <h3 class="text-dark my-1"><span data-plugin="counterup">12</span></h3>
                                           
                                        </div>
                                    </div>
                                </div>
                             
                            </div> <!-- end card-box-->
                        </div> <!-- end col -->
                        <div class="col-md-6 col-xl-3">
                            <div class="card-box" style="height: 170px;">
                                <div class="row">
                                    <div class="col-6" >
                                        <div class="avatar-sm bg-soft-dark rounded" style="width: 50px; height: 50px;">
                                            <i class="fe-user-minus avatar-title font-22 text-dark" ></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                    <h4 class="header-title mt-1 mb-4 text-right">Solicitudes Canceladas</h4>
                                        <div class="text-right">
                                            <h3 class="text-dark my-1"><span data-plugin="counterup">12</span></h3>
                                           
                                        </div>
                                    </div>
                                </div>
                             
                            </div> <!-- end card-box-->
                        </div> <!-- end col -->
                        

                    </div>
                    
                </div>
                
            </div>
            </div>
            </div>



            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->



            <!-- END wrapper -->


            <?php include_once 'includes/scripts.php'; ?>
            <!-- Third Party JS -->
            <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>
            <script src="assets/libs/peity/jquery.peity.min.js"></script>
</body>

</html>