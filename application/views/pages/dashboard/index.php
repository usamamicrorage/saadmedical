    <!-- Begin page -->
    <div class="wrapper">
        <?php $this->load->view('pages/dashboard/includes/sidemenu') ?>
        <?php $this->load->view('pages/dashboard/includes/topbar') ?>
        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->
        <div class="page-content">

            <div class="page-container">
                <?php $this->load->view('pages/dashboard/includes/breadcrumb') ?>

                <?php $this->load->view("pages/dashboard/$content"); ?>
            </div>
            <!-- container -->

            <?php $this->load->view('pages/dashboard/includes/customer_form'); ?>
            <!-- Footer Start -->
            <?php $this->load->view('pages/dashboard/includes/footer') ?>
        </div>
        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->