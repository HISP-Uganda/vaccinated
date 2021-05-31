<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>MInistry of Health Uganda - COVID-19 Vaccination Certification Portal</title>
        <link rel="stylesheet" href="<?= base_url('public/assets/vendors/animate.css/animate.min.css') ?>"/>
        <link rel="stylesheet" href="<?= base_url('public/assets/vendors/bootstrap-5.0.0-dist/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?= base_url('public/assets/vendors/bootstrap-icons/bootstrap-icons.css') ?>"/>
        <link rel="stylesheet" href="<?= base_url('public/assets/vendors/boxicons/css/boxicons.min.css') ?>"/>
        <link rel="stylesheet" href="<?= base_url('public/assets/vendors/fontawesome-free/css/all.min.css') ?>"/>
        <link rel="stylesheet" href="<?= base_url('public/assets/vendors/glightbox/css/glightbox.min.css') ?>"/>
        <link rel="stylesheet" href="<?= base_url('public/assets/vendors/remixicon/remixicon.css') ?>"/>
        <link rel="stylesheet" href="<?= base_url('public/assets/vendors/swiper/swiper-bundle.min.css') ?>"/>
        <link rel="stylesheet" href="<?= base_url('public/assets/vendors/datepicker.css') ?>"/>
        <link rel="stylesheet" href="<?= base_url('public/assets/vendors/tailwind.min.css') ?>"/>
    </head>
    <body>
	    <!-- <div class="container"> -->
        <!-- End Header -->
        <!-- ======= Hero Section ======= -->
		<?= $this->include('partials/navbar'); ?>
		
        <?= $this->renderSection("content"); ?>

        <!-- ======= Footer ======= -->
		<?= $this->include('partials/footer'); ?>
		
		<!-- </div> -->
        <script src="<?= base_url('public/assets/js/jquery-3.5.1.js') ?>"></script>
        <script src="<?= base_url('public/assets/js/jquery.dataTables.min.js') ?>"></script>
        <script src="<?= base_url('public/assets/vendors/bootstrap-5.0.0-dist/js/bootstrap.min.js') ?>"></script>
        <script src="<?= base_url('public/assets/js/anca.js') ?>"></script>
        <script src="<?= base_url('public/assets/js/jquery-print.js') ?>"></script>
    </body>
</html>