<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="<?= base_url('assets/') ?>" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title><?= esc($title) ?></title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('/assets/img/favicon/favicon.ico') ?>" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&family=Rubik:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/fonts/boxicons.css') ?>" />

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.24/dist/sweetalert2.min.css">

    <!-- select2 -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/select2/select2.css') ?>">

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/css/core.css') ?>" class="template-customizer-core-css" />
    <!-- <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" /> -->
    <link rel="stylesheet"
        href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/assets/vendor/css/rtl/theme-semi-dark.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/demo.css') ?>" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/perfect-scrollbar/perfect-scrollbar.css') ?>">
    <!-- <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" /> -->

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css"
        href="<?= base_url('assets/vendor/datatables-bs5/datatables.bootstrap5.css') ?>" />

    <!-- animation -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/modal-animation/animate.css') ?>">

    <!-- jQuery Toast -->
    <link rel="stylesheet" href="<?= base_url('assets/vendor/jquery-toast/jquery.toast.min.css') ?>">

    <!-- Tippy CSS -->
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css" />

    <!-- Helpers -->
    <script src="<?= base_url('assets/vendor/js/helpers.js') ?>"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="<?= base_url('assets/js/config.js') ?>"></script>

    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 0px grey;
        }

        ::-webkit-scrollbar-track:hover {
            box-shadow: inset 0 0 5px grey;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #233446;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #304256;
            border-radius: 3px;
        }

        .list-hover:hover {
            transition: 0.3s;
            background-color: #f3f3f3;
            padding: 10px;
            border-radius: 15px;
        }

        .active2 {
            font-weight: bold;
        }

        body {
            font-family: 'Rubik', 'sans-serif';
        }
    </style>
</head>

<body style="user-select: none">