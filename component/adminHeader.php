<?php if(!defined('Template_Call')) exit("Access Denied"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>领婴海外孕产后台</title>
    <!-- Bootstrap core CSS-->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Page level plugin CSS-->
    <link href="/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="/css/sb-admin.css" rel="stylesheet">
    <!-- Custom styles-->
    <link href="/css/custom.css" rel="stylesheet">
    <!-- date-picker styles-->
    <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
</head>

<body id="page-top">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="./admin_access.php">领婴海外孕产后台</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
    
        <!-- <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-fw fa-sign-out"></i>Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul> -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="./admin_access.php">
                <i class="fa fa-fw fa-sign-out"></i>返回菜单</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="signOut()">
                <i class="fa fa-fw fa-sign-out"></i>登出</a>
            </li>
        </ul>
    </div>
</nav>
<br/><br/><br/>

<script>
function signOut() {
    document.cookie = "isAdminLogin" + '=; Max-Age=-99999999;';
    window.location.href = '/admin/' ;
}
</script>