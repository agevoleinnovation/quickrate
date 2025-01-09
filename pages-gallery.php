<?php include 'services/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <?php $title = "Gallery";
        include 'partials/title-meta.php'; ?>

        <!-- Glight Box Css -->
        <link href="assets/libs/glightbox/css/glightbox.min.css" rel="stylesheet" type="text/css"/>

        <?php include 'partials/head-css.php'; ?>

    </head>

    <?php include 'partials/body.php'; ?>

        <!-- Begin page -->
        <div id="app-layout">
            
            <?php $pagetitle = "Gallery";
            include 'partials/menu.php'; ?>

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
         
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-xxl">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Gallery</h4>
                            </div>
            
                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                                    <li class="breadcrumb-item active">Gallery</li>
                                </ol>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4">
                                        <div class="card gallery-container gallery-grid position-relative d-block overflow-hidden rounded">
                                            <div class="card-body gallery-image p-0">
                                                <a href="assets/images/gallery/1.jpg" class="image-popup d-inline-block" title="">
                                                    <img src="assets/images/gallery/1.jpg" class="img-fluid" alt="gallery-image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4">
                                        <div class="card gallery-container gallery-grid position-relative d-block overflow-hidden rounded">
                                            <div class="card-body gallery-image p-0">
                                                <a href="assets/images/gallery/2.jpg" class="image-popup d-inline-block" title="">
                                                    <img src="assets/images/gallery/2.jpg" class="img-fluid" alt="gallery-image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4">

                                        <div class="card gallery-container gallery-grid position-relative d-block overflow-hidden rounded">
                                            <div class="card-body gallery-image p-0">
                                                <a href="assets/images/gallery/3.jpg" class="image-popup d-inline-block" title="">
                                                    <img src="assets/images/gallery/3.jpg" class="img-fluid" alt="gallery-image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4">
                                        <div class="card gallery-container gallery-grid position-relative d-block overflow-hidden rounded">
                                            <div class="card-body gallery-image p-0">
                                                <a href="assets/images/gallery/4.jpg" class="image-popup d-inline-block" title="">
                                                    <img src="assets/images/gallery/4.jpg" class="img-fluid" alt="gallery-image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4">
                                        <div class="card gallery-container gallery-grid position-relative d-block overflow-hidden rounded">
                                            <div class="card-body gallery-image p-0">
                                                <a href="assets/images/gallery/5.jpg" class="image-popup d-inline-block" title="">
                                                    <img src="assets/images/gallery/5.jpg" class="img-fluid" alt="gallery-image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4">
                                        <div class="card gallery-container gallery-grid position-relative d-block overflow-hidden rounded">
                                            <div class="card-body gallery-image p-0">
                                                <a href="assets/images/gallery/6.jpg" class="image-popup d-inline-block" title="">
                                                    <img src="assets/images/gallery/6.jpg" class="img-fluid" alt="gallery-image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4">
                                        <div class="card gallery-container gallery-grid position-relative d-block overflow-hidden rounded mb-0">
                                            <div class="card-body gallery-image p-0">
                                                <a href="assets/images/gallery/7.jpg" class="image-popup d-inline-block" title="">
                                                    <img src="assets/images/gallery/7.jpg" class="img-fluid" alt="gallery-image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4">
                                        <div class="card gallery-container gallery-grid position-relative d-block overflow-hidden rounded mb-0">
                                            <div class="card-body gallery-image p-0">
                                                <a href="assets/images/gallery/8.jpg" class="image-popup d-inline-block" title="">
                                                    <img src="assets/images/gallery/8.jpg" class="img-fluid" alt="gallery-image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-4">
                                        <div class="card gallery-container gallery-grid position-relative d-block overflow-hidden rounded mb-0">
                                            <div class="card-body gallery-image p-0">
                                                <a href="assets/images/gallery/9.jpg" class="image-popup d-inline-block" title="">
                                                    <img src="assets/images/gallery/9.jpg" class="img-fluid" alt="gallery-image">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- container-fluid -->

                </div> <!-- content -->

                <?php include 'partials/footer.php'; ?>

            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->

        <?php include 'partials/vendor.php'; ?>

        <!-- Glight Box js -->
        <script src="assets/libs/glightbox/js/glightbox.min.js"></script>

        <!-- glight box init -->
        <script src="assets/js/pages/glightbox.init.js"></script>

        <!-- App js-->
        <script src="assets/js/app.js"></script>
        
    </body>
</html>