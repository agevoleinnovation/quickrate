<?php include 'services/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <?php $title = "Google Map";
        include 'partials/title-meta.php'; ?>

        <?php include 'partials/head-css.php'; ?>

    </head>

    <?php include 'partials/body.php'; ?>

        <!-- Begin page -->
        <div id="app-layout">


            <?php include 'partials/menu.php'; ?>

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
        
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-xxl">

                        <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                            <div class="flex-grow-1">
                                <h4 class="fs-18 fw-semibold m-0">Google</h4>
                            </div>
            
                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Maps</a></li>
                                    <li class="breadcrumb-item active">Google</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Marker Map</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="gmaps-markers" class="google-maps"></div>
                                    </div>
                                </div>  
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Overlay Map</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="gmaps-overlay" class="google-maps"></div>
                                    </div>
                                </div>  
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Street View Panoramas Map</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="gmaps-streetview" class="google-maps"></div>
                                    </div>
                                </div>  
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Type Map</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="gmaps-types" class="google-maps"></div>
                                    </div>
                                </div>  
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Polygons Map</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="gmaps-polygons" class="google-maps"></div>
                                    </div>
                                </div>  
                            </div>

                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Routes Map</h5>
                                    </div>
                                    <div class="card-body">
                                        <div id="gmaps-route" class="google-maps"></div>
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

        <!-- Google Maps Api -->
        <script src="https://maps.google.com/maps/api/js?key=AIzaSyDKXKdHQdtqgPVl2HI2RnUa_1bjCxRCQo4&callback=initMap"></script>
        <script src="assets/libs/gmaps/gmaps.min.js"></script>

        <!-- Google Maps Inits -->
        <script src="assets/js/pages/google-maps-init.js"></script>

        <!-- App js-->
        <script src="assets/js/app.js"></script>
        
    </body>
</html>