<?php include 'services/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        
        <?php $title = "Range Slider";
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
                                <h4 class="fs-18 fw-semibold m-0">Range Slider</h4>
                            </div>
            
                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Extended UI</a></li>
                                    <li class="breadcrumb-item active">Range Slider</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Default</h5>
                                    </div><!-- end card header -->
        
                                    <div class="card-body">
                                        <label for="customRange1" class="form-label">Example range</label>
                                        <input type="range" class="form-range" id="customRange1">
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Disabled</h5>
                                    </div><!-- end card header -->
        
                                    <div class="card-body">
                                        <label for="disabledRange" class="form-label">Disabled range</label>
                                        <input type="range" class="form-range" id="disabledRange" disabled>
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Min and Max</h5>
                                    </div><!-- end card header -->
        
                                    <div class="card-body">
                                        <label for="customRange2" class="form-label">Example of min and max range</label>
                                        <input type="range" class="form-range" min="0" max="5" id="customRange2">
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->

                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Steps</h5>
                                    </div><!-- end card header -->
        
                                    <div class="card-body">
                                        <label for="customRange3" class="form-label">Example of step range</label>
                                        <input type="range" class="form-range" min="0" max="5" step="0.5" id="customRange3">
                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->

                        </div> <!-- end row -->
                        
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

        <!-- App js-->
        <script src="assets/js/app.js"></script>
        
    </body>
</html>