<?php include 'services/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>

        <?php $title = "Calendar";
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
                                <h4 class="fs-18 fw-semibold m-0">Calendar</h4>
                            </div>
            
                            <div class="text-end">
                                <ol class="breadcrumb m-0 py-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Maps</a></li>
                                    <li class="breadcrumb-item active">Calendar</li>
                                </ol>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="card">
                                            
                                            <div class="card-body app-calendar">
                                                <div id="calendar"></div>
                                            </div> <!-- end card-body -->
                                            
                                        </div> <!-- end card-->
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
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

        <script src="assets/libs/fullcalendar/index.global.min.js"></script>

        <!-- Main Calendar Js -->
        <script src="assets/js/pages/demo.calendar.js"></script>

        <!-- App js-->
        <script src="assets/js/app.js"></script>
        
    </body>
</html>