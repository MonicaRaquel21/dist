<?php session_start(); ?>

<?php include_once 'includes/header.php'; ?>;

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center w-75 m-auto">
                                    <a >
                                        <span><img src="assets/images/Liceo Cristiano.png" alt="" height="150"></span>
                                    </a>
                                    <p class="text-muted mb-5 mt-4">Liceo Cristiano Reverendo Juan Bueno <b>San Antonio</b> </p>
                                </div>

                                <h5 class="auth-title">Login</h5>
                                <?php if(isset($_SESSION['message'])){?>

                                    <div class="alert alert-<?= $_SESSION['type']?> alert-dismissible fade show" role="alert">
                                    <?= $_SESSION['message'];?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    
                                    <?php session_unset(); };?>
                                <form action="controller/acceder.php" method="POST" >

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Usuario</label>
                                        <input class="form-control"  name="username" id="emailaddress" required="" placeholder="Ingrese su Usuario">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="password">Contraseña</label>
                                        <input class="form-control" type="password" name="contra" required="" id="password" placeholder="Ingrese su Contraseña">
                                    </div>

                                    <div class="form-group mb-3">
                                        <div class="custom-control custom-checkbox checkbox-info">
                                            <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                           
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-primary btn-block" name="acceder" type="submit"> Log In </button>
                                    </div>

                                </form>


                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="pages-recoverpw.html" class="text-muted ml-1">Olvido Su Contraseña?</a></p>
                               
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            2020 &copy; LC San Antonio 
        </footer>

        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
        
    </body>
</html>