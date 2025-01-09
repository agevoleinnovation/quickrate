<!DOCTYPE html>
<html lang="en">
    <head>

        <?php $title = "Error 429";
        include 'partials/title-meta.php'; ?>

        <?php include 'partials/head-css.php'; ?>

    </head>

    <body class="bg-white">
        
        <!-- Begin page -->
        <div class="maintenance-pages">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">

                        <div class="text-center">
                            <div class="mb-4 text-center">
                                <a href="index.php" class="auth-logo">
                                    <img src="assets/images/logo-dark.png" alt="logo-dark" class="mx-auto" height="28" />
                                </a>
                            </div>
    
                            <div class="maintenance-img">
                                <img src="assets/images/svg/429-error.svg" class="img-fluid" alt="coming-soon">
                            </div>
                            
                            <div class="text-center">
                                <h3 class="mt-4 fw-semibold text-black text-capitalize">Too many requests</h3>
                                <p class="text-muted">This pages you are trying to access does not exits or has been moved. <br> Try going back to our homepage.</p>
                            </div>

                            <a class="btn btn-primary mt-3 me-1" href="index.php">Back to Home</a>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- END wrapper -->

        <?php include 'partials/vendor.php'; ?>

        <!-- App js-->
        <script src="assets/js/app.js"></script>
        
    </body>
</html>