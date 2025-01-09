<?php include 'services/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <?php $title = "Treemaps Charts";
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
                                <h4 class="fs-18 fw-semibold m-0">Treemaps Charts</h4>
                            </div>
            
                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Charts</a></li>
                                    <li class="breadcrumb-item active">Treemaps Charts</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Treemap Charts -->
                        <div class="row">
                            <!-- Basic  Treemap Charts -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Basic Treemap Chart</h5>
                                    </div>

                                    <div class="card-body">
                                        <div id="basic_treemap_chart" class="apex-charts"></div> 
                                    </div>
                                </div>  
                            </div>

                            <!-- Multiple Series Charts -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Multiple Series Chart</h5>
                                    </div>

                                    <div class="card-body">
                                        <div id="multi_series_chart" class="apex-charts"></div> 
                                    </div>
                                </div>  
                            </div>

                            <!-- Color Range Charts -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Color Range Chart</h5>
                                    </div>

                                    <div class="card-body">
                                        <div id="color_range_chart" class="apex-charts"></div> 
                                    </div>
                                </div>  
                            </div>

                            <!-- Distributed Treemap Charts -->
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Distributed Treemap Charts (Different Color for each Cell)</h5>
                                    </div>

                                    <div class="card-body">
                                        <div id="distributed_treemap_chart" class="apex-charts"></div> 
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

        <!-- Apexcharts JS -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- Boxplot Charts Init Js -->
        <script src="assets/js/pages/apexcharts-treemap.init.js"></script>

        <!-- App js-->
        <script src="assets/js/app.js"></script>
        
    </body>
</html>