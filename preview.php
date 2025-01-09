<!DOCTYPE html>
<html lang="en">
    <head>
        
        <?php $title = "Landing Page";
        include 'partials/title-meta.php'; ?>

        <!-- Swiper Css -->
        <link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet">

        <?php include 'partials/head-css.php'; ?>

    </head>

    <body>

        <!-- navbar section -->
        <nav class="navbar navbar-expand-lg fixed-top nav-light sticky" id="navbar">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="assets/images/logo-light.png" class="card-logo card-logo-light" alt="logo dark" height="24">
                    <img src="assets/images/logo-dark.png" class="card-logo card-logo-dark" alt="logo light" height="24">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="navbar-navlist">
                        <li class="nav-item">
                            <a class="nav-link" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#demo">Demo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#features">Features</a>
                        </li>
                    </ul>
                </div><!-- end collapse -->
            </div><!-- end container -->
        </nav><!-- end navbar -->
        
        <!-- start hero section -->
        <section class="section pb-0 d-flex hero-section h-auto" id="home">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 col-sm-10 z-1 position-relative">
                        <div class="text-center mt-lg-5 pt-5">
                            <div class="caption-box text-center mb-50">

                                <div class="mx-auto align-items-center">
                                    <span class="small-container fs-14 rounded-2 fw-medium text-success bg-success-subtle">Admin dashboard</span>
                                </div>

                                <h1 class="caption-title my-4 lh-base text-white mx-auto">A Tapeli Admin Template To Build  Dashboard Fast</h1>
                                <p class="subtitle text-white">Tapeli is Admin dashboad template with Bootstrap and well designed dashboards, applications and pages.</p>

                                <div class="d-flex gap-2 justify-content-center mt-4">
                                    <a href="#" target="_blank" class="btn btn-danger mt-3"><i class="mdi mdi-cart-outline me-1 fs-15 align-middle "></i> Purchase Now</a>
                                </div>
                            </div>
                        </div>

                        <div class="main-dashboard mt-4 text-center rounded-top-3 pb-0">
                            <img src="assets/images/landing/dashboard.png" class="img-fluid rounded-top-3" alt="img">
                        </div>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </section>
        <!-- end hero section -->

        <!-- start services -->
        <section class="section bg-white demo" id="demo">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center header-section">
                            <span class="text-uppercase fw-semibold text-primary">Demo</span>
                            <h3 class="fw-semibold text-dark mb-3 mt-2">Tapeli Theme Demos</h3>
                            <p class="text-muted fs-15">Our elegantly designed UI Framework offers hundreds of customizable features. <br>Each layout is just the beginning—style it to fit your unique vision.</p>
                        </div>
                    </div>
                </div>

                <div class="row row justify-content-center g-4 mt-4">

                    <div class="col-md-4 col-6">
                        <div class="box-demo text-center p-2">
                            <div class="demo-img rounded p-2">
                                <a href="index.php" target="_blank">
                                    <img src="assets/images/demo/analytical-sidebar.png" class="img-fluid rounded" alt="demo-img">
                                </a>
                            </div>
                            <h6 class="title text-uppercase mt-4 fw-bold">Analytical</h6>
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-6">
                        <div class="box-demo text-center p-2">
                            <div class="demo-img rounded p-2">
                                <a href="index-sidebar-dark.php" target="_blank">
                                    <img src="assets/images/demo/analytical-sidebar-dark.png" class="img-fluid rounded" alt="demo-img">
                                </a>
                            </div>
                            <h6 class="title text-uppercase mt-4 fw-bold">Dark Sidebar</h6>
                        </div>
                    </div>

                    <div class="col-md-4 col-6">
                        <div class="box-demo text-center p-2">
                            <div class="demo-img rounded p-2">
                                <a href="index-sidebar-dark-rtl.php" target="_blank">
                                    <img src="assets/images/demo/analytical-sidebar-dark-rtl.png" class="img-fluid rounded" alt="demo-img">
                                </a>
                            </div>
                            <h6 class="title text-uppercase mt-4 fw-bold">dark sidebar RTL</h6>
                        </div>
                    </div>

                    <div class="col-md-4 col-6">
                        <div class="box-demo text-center p-2">
                            <div class="demo-img rounded p-2">
                                <a href="index-sidebar-rtl.php" target="_blank">
                                    <img src="assets/images/demo/analytical-sidebar-rtl.png" class="img-fluid rounded" alt="demo-img">
                                </a>
                            </div>
                            <h6 class="title text-uppercase mt-4 fw-bold">Light Sidebar RTL</h6>
                        </div>
                    </div>

                    <div class="col-md-4 col-6">
                        <div class="box-demo text-center p-2">
                            <div class="demo-img rounded p-2">
                                <a href="ecommerce.php" target="_blank">
                                    <img src="assets/images/demo/ecommerce.png" class="img-fluid rounded" alt="demo-img">
                                </a>
                            </div>
                            <h6 class="title text-uppercase mt-4 fw-bold">ecommerce</h6>
                        </div>
                    </div>

                    <div class="col-md-4 col-6">
                        <div class="box-demo text-center p-2">
                            <div class="demo-img rounded p-2">
                                <a href="ecommerce-sidebar-dark.php" target="_blank">
                                    <img src="assets/images/demo/ecommerc-sidebar-dark.png" class="img-fluid rounded" alt="demo-img">
                                </a>
                            </div>
                            <h6 class="title text-uppercase mt-4 fw-bold">dark sidebar</h6>
                        </div>
                    </div>

                    <div class="col-md-4 col-6">
                        <div class="box-demo text-center p-2">
                            <div class="demo-img rounded p-2">
                                <a href="ecommerce-sidebar-dark-rtl.php" target="_blank">
                                    <img src="assets/images/demo/ecommerc-sidebar-dark-rtl.png" class="img-fluid rounded" alt="demo-img">
                                </a>
                            </div>
                            <h6 class="title text-uppercase mt-4 fw-bold">dark sidebar RTL</h6>
                        </div>
                    </div>

                    <div class="col-md-4 col-6">
                        <div class="box-demo text-center p-2">
                            <div class="demo-img rounded p-2">
                                <a href="ecommerce-sidebar-rtl.php" target="_blank">
                                    <img src="assets/images/demo/ecommerc-sidebar-rtl.png" class="img-fluid rounded" alt="demo-img">
                                </a>
                            </div>
                            <h6 class="title text-uppercase mt-4 fw-bold">light sidebar rtl</h6>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- end service -->

        <!-- start feathers -->
        <section class="section bg-white bg-opacity-50" id="features">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="text-center header-section mb-5">
                            <span class="text-uppercase fw-semibold text-primary">Feature</span>
                            <h3 class="fw-semibold text-dark mb-3 mt-2">Key feature</h3>
                            <p class="text-muted fs-15 mb-0">Tapeli - Admin Dashboard Template Empowers rapid project initiation with customizable <br> design developer-friendly code, and responsive layout.</p>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-sm-4 col-lg-3 text-center mt-4 pt-2 px-2">
                        <div class="icon-box rounded-3 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="#537AEF" d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2m-6 2h6v6h-3l1-4l-4 1zM5 5h6v3L7 7l1 4H5zm6 14H5v-6h3l-1 4l4-1zm8 0h-6v-3l4 1l-1-4h3zm-4.37-4.37L12 13.72l-2.63.91l.91-2.63l-.91-2.63l2.63.91l2.63-.91l-.91 2.63z"/>
                            </svg>
                        </div>
                        <div class="mb-3">
                            <h5 class="fs-18">85+ Page Tampates</h5>
                            <p class="text-muted my-3 fs-15 lh-base">Ready-made designs for versatile website development solutions.</p>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-3 text-center mt-4 pt-2">
                        <div class="icon-box rounded-3 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 48 48">
                                <path fill="#537AEF" d="M23 22.922c0-.526.474-.922 1-.922s1 .396 1 .922V41a1 1 0 1 1-2 0zM28 16a4 4 0 0 0-3-3.874V7a1 1 0 1 0-2 0v5.126A4.002 4.002 0 0 0 24 20a4 4 0 0 0 4-4M12 36a4 4 0 0 0 1-7.874V7a1 1 0 1 0-2 0v21.126A4.002 4.002 0 0 0 12 36m24-3c-.526 0-1 .396-1 .922V41a1 1 0 1 0 2 0v-7.078c0-.526-.474-.922-1-.922m1-9.874A4.002 4.002 0 0 1 36 31a4 4 0 0 1-1-7.874V7a1 1 0 1 1 2 0zM11 38.922c0-.526.474-.922 1-.922s1 .396 1 .922V41a1 1 0 1 1-2 0z"/>
                            </svg>
                        </div>
                        <div class="mb-3">
                            <h5 class="fs-18">300+ UI Components</h5>
                            <p class="text-muted my-3 fs-15">Diverse elements for versatile web development solutions.</p>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-3 text-center mt-4 pt-2">
                        <div class="icon-box rounded-3 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="#537AEF" d="M12 21q-1.875 0-3.512-.712t-2.85-1.925t-1.925-2.85T3 12t.713-3.512t1.924-2.85t2.85-1.925T12 3q2.05 0 3.888.875T19 6.35V5q0-.425.288-.712T20 4t.713.288T21 5v4q0 .425-.288.713T20 10h-4q-.425 0-.712-.288T15 9t.288-.712T16 8h1.75q-1.025-1.4-2.525-2.2T12 5Q9.075 5 7.038 7.038T5 12t2.038 4.963T12 19q2.375 0 4.25-1.425t2.475-3.675q.125-.4.45-.6t.725-.15q.425.05.675.362t.15.688q-.725 2.975-3.15 4.888T12 21m1-9.4l2.5 2.5q.275.275.275.7t-.275.7t-.7.275t-.7-.275l-2.8-2.8q-.15-.15-.225-.337T11 11.975V8q0-.425.288-.712T12 7t.713.288T13 8z"/>
                            </svg>
                        </div>
                        <div class="mb-3">
                            <h5 class="fs-18">Regular Updates</h5>
                            <p class="text-muted my-3 fs-15">Ensuring software remains secure and up-to-date with new features.</p>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-3 text-center mt-4 pt-2">
                        <div class="icon-box rounded-3 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="#537AEF" d="M12 2C6.486 2 2 6.486 2 12v4.143C2 17.167 2.897 18 4 18h1a1 1 0 0 0 1-1v-5.143a1 1 0 0 0-1-1h-.908C4.648 6.987 7.978 4 12 4s7.352 2.987 7.908 6.857H19a1 1 0 0 0-1 1V18c0 1.103-.897 2-2 2h-2v-1h-4v3h6c2.206 0 4-1.794 4-4c1.103 0 2-.833 2-1.857V12c0-5.514-4.486-10-10-10"/>
                            </svg>
                        </div>
                        <div class="mb-3">
                            <h5 class="fs-18">Dedicated Support</h5>
                            <p class="text-muted my-3 fs-15">Tailored assistance for issue resolution and optimal user experience.</p>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-3 text-center mt-4 pt-2">
                        <div class="icon-box rounded-3 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="none" stroke="#537AEF" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8.557 2.75H4.682A1.932 1.932 0 0 0 2.75 4.682v3.875a1.942 1.942 0 0 0 1.932 1.942h3.875a1.942 1.942 0 0 0 1.942-1.942V4.682A1.942 1.942 0 0 0 8.557 2.75m10.761 0h-3.875a1.942 1.942 0 0 0-1.942 1.932v3.875a1.943 1.943 0 0 0 1.942 1.942h3.875a1.942 1.942 0 0 0 1.932-1.942V4.682a1.932 1.932 0 0 0-1.932-1.932M8.557 13.5H4.682a1.943 1.943 0 0 0-1.932 1.943v3.875a1.932 1.932 0 0 0 1.932 1.932h3.875a1.942 1.942 0 0 0 1.942-1.932v-3.875a1.942 1.942 0 0 0-1.942-1.942m8.818-.001a3.875 3.875 0 1 0 0 7.75a3.875 3.875 0 0 0 0-7.75"/>
                            </svg>
                        </div>
                        <div class="mb-3">
                            <h5 class="fs-18">Smart Dashboards</h5>
                            <p class="text-muted my-3 fs-15">Dynamic interfaces offering real-time insights and customizable visualizations.</p>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-3 text-center mt-4 pt-2">
                        <div class="icon-box rounded-3 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="#537AEF" fill-rule="evenodd" d="M10.944 1.25h2.112c1.838 0 3.294 0 4.433.153c1.172.158 2.121.49 2.87 1.238a.75.75 0 0 1-1.06 1.06c-.424-.422-1.004-.676-2.01-.811c-1.027-.138-2.382-.14-4.289-.14h-2c-1.907 0-3.261.002-4.29.14c-1.005.135-1.585.389-2.008.812c-.423.423-.677 1.003-.812 2.009c-.138 1.028-.14 2.382-.14 4.289v4c0 1.907.002 3.262.14 4.29c.135 1.005.389 1.585.812 2.008c.423.423 1.003.677 2.009.812c1.028.138 2.382.14 4.289.14h2c1.907 0 3.262-.002 4.29-.14c1.005-.135 1.585-.389 2.008-.812c.696-.696.907-1.777.943-4.309a.75.75 0 0 1 1.5.022c-.035 2.427-.192 4.158-1.382 5.348c-.749.748-1.698 1.08-2.87 1.238c-1.14.153-2.595.153-4.433.153h-2.112c-1.838 0-3.294 0-4.433-.153c-1.172-.158-2.121-.49-2.87-1.238c-.748-.749-1.08-1.698-1.238-2.87c-.153-1.14-.153-2.595-.153-4.433V9.944c0-1.838 0-3.294.153-4.433c.158-1.172.49-2.121 1.238-2.87c.749-.748 1.698-1.08 2.87-1.238c1.14-.153 2.595-.153 4.433-.153m7.17 5.796a2.716 2.716 0 1 1 3.84 3.84L17.2 15.643a7.025 7.025 0 0 1-.63.587c-.23.18-.48.334-.744.46c-.224.107-.46.185-.806.3l-2.084.695a1.28 1.28 0 0 1-1.62-1.62l.681-2.04l.014-.043c.116-.347.194-.582.301-.806a4.03 4.03 0 0 1 .46-.744c.153-.196.328-.371.587-.63l.031-.031zm2.78 1.06a1.216 1.216 0 0 0-1.72 0l-.182.182c.01.033.021.07.034.107c.094.27.273.63.611.968a2.553 2.553 0 0 0 1.075.645l.182-.182a1.216 1.216 0 0 0 0-1.72m-1.328 3.048a4.083 4.083 0 0 1-.99-.73a4.083 4.083 0 0 1-.73-.99L14.45 12.83c-.301.301-.407.409-.496.523c-.113.145-.21.302-.289.467c-.062.131-.111.274-.246.678l-.4 1.2l.283.283l1.2-.4c.404-.135.547-.184.678-.246c.165-.08.322-.176.467-.289c.114-.089.222-.195.523-.496zM7.25 9A.75.75 0 0 1 8 8.25h6.5a.75.75 0 0 1 0 1.5H8A.75.75 0 0 1 7.25 9m0 4a.75.75 0 0 1 .75-.75h2.5a.75.75 0 0 1 0 1.5H8a.75.75 0 0 1-.75-.75m0 4a.75.75 0 0 1 .75-.75h1.5a.75.75 0 0 1 0 1.5H8a.75.75 0 0 1-.75-.75" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="mb-3">
                            <h5 class="fs-18">Well Documented</h5>
                            <p class="text-muted my-3 fs-15">Clear, comprehensive guides for seamless implementation and user experience.</p>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-3 text-center mt-4 pt-2">
                        <div class="icon-box rounded-3 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><g fill="#537AEF" fill-rule="evenodd" clip-rule="evenodd">
                                <path d="M17.206 1.856c-1.063-.419-2.09-.135-2.817.512c-.71.63-1.139 1.602-1.139 2.632v4c0 .967.784 1.75 1.75 1.75h4c1.03 0 2.002-.43 2.633-1.139c.646-.727.93-1.754.51-2.817a8.776 8.776 0 0 0-4.937-4.938M14.75 9V5c0-.627.265-1.182.636-1.512c.353-.314.791-.425 1.27-.236a7.276 7.276 0 0 1 4.092 4.092c.189.479.078.917-.236 1.27c-.33.371-.885.636-1.512.636h-4a.25.25 0 0 1-.25-.25"/><path d="M10.995 2.87c-.61-.396-1.2-.51-1.85-.396c-.55.096-1.14.36-1.767.641l-.067.03A10.25 10.25 0 1 0 20.855 16.69l.03-.068c.281-.627.545-1.217.641-1.768c.113-.648 0-1.239-.396-1.85c-.426-.657-1.01-.979-1.724-1.125c-.634-.13-1.426-.13-2.334-.129H15.5c-.964 0-1.612-.002-2.095-.066c-.461-.063-.659-.17-.789-.3c-.13-.13-.237-.328-.3-.79c-.064-.482-.066-1.13-.066-2.094V6.928c0-.908 0-1.7-.13-2.334c-.145-.714-.467-1.298-1.125-1.724M7.924 4.514c.719-.322 1.136-.503 1.48-.563c.265-.046.474-.018.776.178c.254.165.389.361.471.765c.095.467.099 1.104.099 2.106v1.552c0 .898 0 1.648.08 2.242c.084.628.27 1.195.726 1.65c.455.456 1.022.642 1.65.726c.594.08 1.344.08 2.242.08H17c1.002 0 1.639.004 2.106.099c.404.082.6.217.765.471c.196.302.224.511.178.777c-.06.343-.241.76-.563 1.48a8.755 8.755 0 0 1-4.638 4.507a8.75 8.75 0 0 1-6.924-16.07"/></g>
                            </svg>
                        </div>
                        <div class="mb-3">
                            <h5 class="fs-18">Apex Chart</h5>
                            <p class="text-muted my-3 fs-15">Modern library for interactive, responsive data visualization on websites.</p>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-3 text-center mt-4 pt-2">
                        <div class="icon-box rounded-3 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <g fill="none" stroke="#537AEF" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="#537AEF"><path d="M12.882 12c1.17 0 2.118.895 2.118 2s-.948 2-2.118 2H10.6c-.754 0-1.131 0-1.366-.234C9 15.53 9 15.154 9 14.4V12m3.882 0c1.17 0 2.118-.895 2.118-2s-.948-2-2.118-2H10.6c-.754 0-1.131 0-1.366.234C9 8.47 9 8.846 9 9.6V12m3.882 0H9"/><path d="M22 12a2 2 0 0 1-2-2V8c0-3.31-.69-4-4-4H8c-3.31 0-4 .69-4 4v2a2 2 0 0 1-2 2m0 0a2 2 0 0 1 2 2v2c0 3.31.69 4 4 4h8c3.31 0 4-.69 4-4v-2a2 2 0 0 1 2-2"/></g>
                            </svg>
                        </div>
                        <div class="mb-3">
                            <h5 class="fs-18">Bootstrap v5.3.3</h5>
                            <p class="text-muted my-3 fs-15">Open-source framework for responsive, mobile-first website design.</p>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-3 text-center mt-4 pt-2">
                        <div class="icon-box rounded-3 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                <path fill="#537AEF" d="m20.208 25.912l.849-1.448s-1.927.787-5.145.787c-3.224 0-5.12-.756-5.12-.756l.948 1.579l.333 4.968c0 .543 1.749.959 3.916.959c2.161 0 3.917-.416 3.917-.959l.301-5.109zm.819-9.396c-1.021.063-1.537 1.203-2.053 2.405c-.187.439-.837 2.319-1.26 2.084c-.427-.229.547-1.771.823-2.688c-.317.229-1.473 1.131-1.771.287c-.479.417-1.505.641-1.391-.443c-.255.464-.828 1.099-1.515.823c-.901-.344.525-3.219.88-3.077c.353.161-.073.801-.183 1.057c-.251.563-.531 1.281-.344 1.416c.323.26 1.208-.932 1.229-.959c.161-.219.636-1.635 1.016-1.473c.38.177-.948 2.057-.453 2.432c.099.084.511-.036.76-.317c.156-.156.104-.557.636-1.833c.541-1.281 1.02-2.875 1.385-2.756c.369.12.068.939-.068 1.256c-.62 1.437-1.688 3.792-1.188 3.615c.5-.183.761-.183 1.261-.76c.5-.579.459-1.537.796-1.516c.324.02.281.339.204.557c.317-.36 1.531-1.156 1.812-.38c.344.916-1.735 2.26-1.219 2.176c.5-.057 1.317-.577 1.683-1.057l.959-8.667s-.98.803-7.152.803c-6.167 0-7.047-.781-7.047-.781l.817 7.907c.443-1.235 1.48-3.751 3.1-3.652c.739.043 1.733 1.48.875 1.516c-.36.021-.401-.719-.817-.817c-.319-.057-.74.183-1.016.464c-.541.536-1.74 2.671-1.579 3.733c.199 1.355 1.875-.463 2.156-1c.199-.38.339-1.52.756-1.4c.443.119-.037 1.301-.36 2.317c-.359 1.161-.541 2.375-.973 2.235c-.443-.141.276-1.636.235-1.896c-.417.401-1.177 1.359-2.172.88l.495 4.932s1.359 1.057 5.432 1.057s5.489-1.057 5.489-1.057l.641-5.713c-.521.521-2.157 1.416-2.256.401c-.077-.819 1.776-1.995 1.297-2.021zM23.131.891l-3.547 3.735l-.652 2.536c2.511.156 4.256.516 4.256.921c0 .563-3.219 1.011-7.188 1.011s-7.188-.457-7.188-1.015c0-.557 3.219-1.021 7.188-1.021c.563 0 1.125 0 1.688.021l.744-3.032L22.197.052c.095-.12.376-.021.636.199c.255.203.396.457.317.577v.041zM18.016 8.62s-.699 0-.813-.109a.178.178 0 0 1-.047-.12c0-.079.052-.12.12-.145l.057.099c-.027.011-.036.02-.041.031c0 .057.416.095.739.089c.319-.005.709-.032.709-.084c0-.016-.032-.031-.084-.047l.063-.093c.084.025.156.077.156.161c0 .145-.187.172-.307.187c-.141.021-.547.032-.547.032z"/>
                            </svg>
                        </div>
                        <div class="mb-3">
                            <h5 class="fs-18">Gulp Workflow</h5>
                            <p class="text-muted my-3 fs-15">Streamlined automation for efficient web development task management.</p>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-3 text-center mt-4 pt-2">
                        <div class="icon-box rounded-3 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="32" viewBox="0 0 640 512">
                                <path fill="#537AEF" d="M301.84 378.92c-.3.6-.6 1.08 0 0m249.13-87a131.16 131.16 0 0 0-58 13.5c-5.9-11.9-12-22.3-13-30.1c-1.2-9.1-2.5-14.5-1.1-25.3s7.7-26.1 7.6-27.2s-1.4-6.6-14.3-6.7s-24 2.5-25.29 5.9a122.83 122.83 0 0 0-5.3 19.1c-2.3 11.7-25.79 53.5-39.09 75.3c-4.4-8.5-8.1-16-8.9-22c-1.2-9.1-2.5-14.5-1.1-25.3s7.7-26.1 7.6-27.2s-1.4-6.6-14.29-6.7s-24 2.5-25.3 5.9s-2.7 11.4-5.3 19.1s-33.89 77.3-42.08 95.4c-4.2 9.2-7.8 16.6-10.4 21.6c-.4.8-.7 1.3-.9 1.7c.3-.5.5-1 .5-.8c-2.2 4.3-3.5 6.7-3.5 6.7v.1c-1.7 3.2-3.6 6.1-4.5 6.1c-.6 0-1.9-8.4.3-19.9c4.7-24.2 15.8-61.8 15.7-63.1c-.1-.7 2.1-7.2-7.3-10.7c-9.1-3.3-12.4 2.2-13.2 2.2s-1.4 2-1.4 2s10.1-42.4-19.39-42.4c-18.4 0-44 20.2-56.58 38.5c-7.9 4.3-25 13.6-43 23.5c-6.9 3.8-14 7.7-20.7 11.4c-.5-.5-.9-1-1.4-1.5c-35.79-38.2-101.87-65.2-99.07-116.5c1-18.7 7.5-67.8 127.07-127.4c98-48.8 176.35-35.4 189.84-5.6c19.4 42.5-41.89 121.6-143.66 133c-38.79 4.3-59.18-10.7-64.28-16.3c-5.3-5.9-6.1-6.2-8.1-5.1c-3.3 1.8-1.2 7 0 10.1c3 7.9 15.5 21.9 36.79 28.9c18.7 6.1 64.18 9.5 119.17-11.8c61.78-23.8 109.87-90.1 95.77-145.6C386.52 18.32 293-.18 204.57 31.22c-52.69 18.7-109.67 48.1-150.66 86.4c-48.69 45.6-56.48 85.3-53.28 101.9c11.39 58.9 92.57 97.3 125.06 125.7c-1.6.9-3.1 1.7-4.5 2.5c-16.29 8.1-78.18 40.5-93.67 74.7c-17.5 38.8 2.9 66.6 16.29 70.4c41.79 11.6 84.58-9.3 107.57-43.6s20.2-79.1 9.6-99.5c-.1-.3-.3-.5-.4-.8c4.2-2.5 8.5-5 12.8-7.5c8.29-4.9 16.39-9.4 23.49-13.3c-4 10.8-6.9 23.8-8.4 42.6c-1.8 22 7.3 50.5 19.1 61.7c5.2 4.9 11.49 5 15.39 5c13.8 0 20-11.4 26.89-25c8.5-16.6 16-35.9 16-35.9s-9.4 52.2 16.3 52.2c9.39 0 18.79-12.1 23-18.3v.1s.2-.4.7-1.2c1-1.5 1.5-2.4 1.5-2.4v-.3c3.8-6.5 12.1-21.4 24.59-46c16.2-31.8 31.69-71.5 31.69-71.5a201.24 201.24 0 0 0 6.2 25.8c2.8 9.5 8.7 19.9 13.4 30c-3.8 5.2-6.1 8.2-6.1 8.2a.31.31 0 0 0 .1.2c-3 4-6.4 8.3-9.9 12.5c-12.79 15.2-28 32.6-30 37.6c-2.4 5.9-1.8 10.3 2.8 13.7c3.4 2.6 9.4 3 15.69 2.5c11.5-.8 19.6-3.6 23.5-5.4a82.2 82.2 0 0 0 20.19-10.6c12.5-9.2 20.1-22.4 19.4-39.8c-.4-9.6-3.5-19.2-7.3-28.2c1.1-1.6 2.3-3.3 3.4-5C434.8 301.72 450.1 270 450.1 270a201.24 201.24 0 0 0 6.2 25.8c2.4 8.1 7.09 17 11.39 25.7c-18.59 15.1-30.09 32.6-34.09 44.1c-7.4 21.3-1.6 30.9 9.3 33.1c4.9 1 11.9-1.3 17.1-3.5a79.46 79.46 0 0 0 21.59-11.1c12.5-9.2 24.59-22.1 23.79-39.6c-.3-7.9-2.5-15.8-5.4-23.4c15.7-6.6 36.09-10.2 62.09-7.2c55.68 6.5 66.58 41.3 64.48 55.8s-13.8 22.6-17.7 25s-5.1 3.3-4.8 5.1c.5 2.6 2.3 2.5 5.6 1.9c4.6-.8 29.19-11.8 30.29-38.7c1.6-34-31.09-71.4-89-71.1zm-429.18 144.7c-18.39 20.1-44.19 27.7-55.28 21.3C54.61 451 59.31 421.42 82 400c13.8-13 31.59-25 43.39-32.4c2.7-1.6 6.6-4 11.4-6.9c.8-.5 1.2-.7 1.2-.7c.9-.6 1.9-1.1 2.9-1.7c8.29 30.4.3 57.2-19.1 78.3zm134.36-91.4c-6.4 15.7-19.89 55.7-28.09 53.6c-7-1.8-11.3-32.3-1.4-62.3c5-15.1 15.6-33.1 21.9-40.1c10.09-11.3 21.19-14.9 23.79-10.4c3.5 5.9-12.2 49.4-16.2 59.2m111 53c-2.7 1.4-5.2 2.3-6.4 1.6c-.9-.5 1.1-2.4 1.1-2.4s13.9-14.9 19.4-21.7c3.2-4 6.9-8.7 10.89-13.9c0 .5.1 1 .1 1.6c-.13 17.9-17.32 30-25.12 34.8zm85.58-19.5c-2-1.4-1.7-6.1 5-20.7c2.6-5.7 8.59-15.3 19-24.5a36.18 36.18 0 0 1 1.9 10.8c-.1 22.5-16.2 30.9-25.89 34.4z"/>
                            </svg>
                        </div>
                        <div class="mb-3">
                            <h5 class="fs-18">SASS Support</h5>
                            <p class="text-muted my-3 fs-15">Integration for leveraging CSS preprocessing in web development.</p>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-3 text-center mt-4 pt-2">
                        <div class="icon-box rounded-3 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <g fill="none" stroke="#537AEF" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="#537AEF"><path d="M21 17.5a3.5 3.5 0 1 1-7 0a3.5 3.5 0 0 1 7 0"/><path d="M17.5 14h-11a3.5 3.5 0 1 0 0 7h11a3.5 3.5 0 1 0 0-7M3 6.5a3.5 3.5 0 1 0 7 0a3.5 3.5 0 0 0-7 0"/><path d="M6.5 3h11a3.5 3.5 0 1 1 0 7h-11a3.5 3.5 0 1 1 0-7"/></g>
                            </svg>
                        </div>
                        <div class="mb-3">
                            <h5 class="fs-18">Easy to Customize</h5>
                            <p class="text-muted my-3 fs-15">Empowering web development with advanced CSS preprocessing capabilities.</p>
                        </div>
                    </div>

                    <div class="col-sm-4 col-lg-3 text-center mt-4 pt-2">
                        <div class="icon-box rounded-3 mb-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="#537AEF" d="M18.27 6c1.01 2.17.78 4.73-.33 6.81c-.94 1.69-2.29 3.12-3.44 4.69c-.5.7-1 1.45-1.37 2.26c-.13.27-.22.55-.32.83s-.19.56-.28.84c-.09.26-.2.57-.53.57c-.39 0-.5-.44-.58-.74c-.24-.73-.48-1.43-.85-2.1c-.42-.79-.95-1.52-1.49-2.23zM9.12 8.42l-3.3 3.92c.61 1.29 1.52 2.39 2.39 3.49c.21.25.42.51.62.78L13 11.67l-.04.01c-1.46.5-3.08-.24-3.66-1.68c-.08-.17-.14-.37-.18-.57a3 3 0 0 1 0-1zm-2.54-3.8l-.01.01c-1.62 2.05-1.9 4.9-.93 7.31L9.63 7.2l-.05-.05zm7.64-2.26L11 6.17l.04-.01c1.34-.46 2.84.12 3.52 1.34c.15.28.27.58.31.88c.06.38.08.65.01 1.02v.01l3.2-3.8a7 7 0 0 0-3.85-3.24zM9.89 6.89l3.91-4.65l-.04-.01C13.18 2.08 12.59 2 12 2c-1.97 0-3.83.85-5.15 2.31l-.02.01z"/>
                            </svg>
                        </div>
                        <div class="mb-3">
                            <h5 class="fs-18">Google & Vector Map</h5>
                            <p class="text-muted my-3 fs-15">Scalable, detail-rich maps for precise geographic data representation.</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End feathers -->

        <!-- Start footer  -->
        <div class="section-half pt-0 bg-white bg-opacity-50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12 text-center">
                        <h3 class="text-dark text-capitalize mb-3">Get Started with Tapeli</h3>
                        <p class="text-dark para-desc mx-auto fs-15">Kickstart with Tapeli Your all-in-one solution for boosting visibility, traffic, and connections effortlessly</p>
                        <a href="#" target="_blank" class="btn btn-danger mt-3"><i class="mdi mdi-cart-outline me-1 fs-15 align-middle"></i> Purchase Now</a>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div> 
        <!-- End section -->
        

        <!-- Start Footer Section -->
        <footer class="footer-section bg-dark-color">
            <div class="footer-bar border-top border-gray py-4">
                <div class="container">
                    <div class="row">
                        <div class="col fs-14 text-white text-center">
                            <p class="mb-0 fw-medium">&copy; <script>document.write(new Date().getFullYear())</script> - Made with <span class="mdi mdi-heart text-danger"></span> by <a href="#!" class="text-reset fw-semibold">Zoyothemes</a></p>
                        </div>
                    </div><!--end row-->
                </div><!--end container-->
            </div>
        </footer>
        <!-- End Footer Section -->


        <?php include 'partials/vendor.php'; ?>

        <!-- Gumshoe Js -->
        <script src="assets/libs/gumshoejs/gumshoe.min.js"></script>
        <script src="assets/js/pages/gumshoe.init.js"></script>

        <!-- Swiper Js -->
        <script src="assets/libs/swiper/swiper-bundle.min.js"></script>
        <script src="assets/js/pages/swiper.init.js"></script>

        <!-- Landing Init Js-->
        <script src="assets/js/pages/landing.init.js"></script>
        
        <!-- App Js-->
        <script src="assets/js/app.js"></script>
    </body>
</html>