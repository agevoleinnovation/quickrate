<?php include 'services/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <?php $title = "Area Charts";
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
                                <h4 class="fs-18 fw-semibold m-0">Area Charts</h4>
                            </div>
            
                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Charts</a></li>
                                    <li class="breadcrumb-item active">Area Charts</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Area Charts -->
                        <div class="row">
                            <!-- Basic Area Chart -->
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Basic Area Chart</h5>
                                    </div>

                                    <div class="card-body">
                                        <div id="basic_area_chart" class="apex-charts"></div> 
                                    </div>

                                </div>  
                            </div>

                            <!-- Spline Area Chart -->
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Spline Area Chart</h5>
                                    </div>

                                    <div class="card-body">
                                        <div id="spline_area_chart" class="apex-charts"></div> 
                                    </div>

                                </div>  
                            </div>
                        </div>

                        <div class="row">
                            <!-- Datetime X-Axis Area Chart -->
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Datetime X-Axis Area Chart</h5>
                                    </div>

                                    <div class="card-body">
                                        <div id="datetime_Xaxis_area_chart" class="apex-charts"></div> 
                                    </div>

                                </div>  
                            </div>

                            <!-- Negative Area Chart -->
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Negative Values Area Chart</h5>
                                    </div>

                                    <div class="card-body">
                                        <div id="negative_area_chart" class="apex-charts"></div> 
                                    </div>

                                </div>  
                            </div>
                        </div>

                        <div class="row">
                            <!-- Github Style Area Chart -->
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Github Style Area Chart</h5>
                                    </div>

                                    <div class="card-body">
                                        <div class="bg-light">
                                            <div id="area_chart-months" class="apex-charts"></div> 
                                        </div>

                                        <div class="github-style d-flex align-items-center my-2">
                                            <div class="flex-shrink-0 me-2">
                                                <img class="avatar-sm rounded" src="assets/images/users/user-6.jpg" data-hovercard-user-id="634573" alt="" />
                                            </div>
                                            <div class="flex-grow-1">
                                                <a class="font-size-14 text-body fw-medium">coder</a>
                                                <div class="cmeta text-muted font-size-11">
                                                    <span class="commits text-body fw-medium"></span> commits
                                                </div>
                                            </div>
                                        </div>

                                        <div class="bg-light">
                                            <div id="area_chart-years" class="apex-charts"></div> 
                                        </div>
                                    </div>

                                </div>  
                            </div>

                            <!-- Stacked Area Chart -->
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Stacked Area Chart</h5>
                                    </div>

                                    <div class="card-body">
                                        <div id="stacked_area_chart" class="apex-charts"></div> 
                                    </div>
                                </div>  
                            </div>
                        </div>

                        <div class="row">
                            <!-- Irregular Timeseries Chart -->
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Irregular Timeseries Chart</h5>
                                    </div>

                                    <div class="card-body">
                                        <div id="irregular_area_chart" class="apex-charts"></div> 
                                    </div>
                                </div>  
                            </div>

                            <!-- Area Chart With Null Values Chart -->
                            <div class="col-xl-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Area Chart With Null Values Chart</h5>
                                    </div>

                                    <div class="card-body">
                                        <div id="missing_null-value_area_chart" class="apex-charts"></div> 
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

        <!-- For Basic Area Chart Js-->
        <script src="https://apexcharts.com/samples/assets/stock-prices.js"></script>

        <!-- For Github Style Chart -->
        <script src="https://apexcharts.com/samples/assets/github-data.js"></script>

        <!-- For Irregular-data-series Area Chart JS-->
        <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
        <script src="assets/libs/moment/min/moment.min.js"></script>

        <!-- Apexcharts Init Js -->
        <script src="assets/js/pages/apexcharts-area.init.js"></script>

        <!-- App js-->
        <script src="assets/js/app.js"></script>
        
    </body>
</html>