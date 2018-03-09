<?php DEFINE('Template_Call', TRUE); 
    
    //Check if the user is login
    if (!isset($_COOKIE['isAdminLogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>领婴后台管理</title>
    <!-- Bootstrap core CSS-->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="/css/sb-admin.css" rel="stylesheet">
    <style>
        #map {
            height: 600px;
            width: 100%;
        }
        .header{
            margin-top: 50px;
            border-radius: 10px;
        }
    </style>    
</head>

<body class="bg-dark">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="../admin_access.php">领婴海外孕产后台</a>
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
                    <a class="nav-link" href="./edit.php">
                    <i class="fa fa-fw fa-sign-out"></i>管理</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../admin_access.php">
                    <i class="fa fa-fw fa-sign-out"></i>返回菜单</a>
                </li>
            </ul>
        </div>
    </nav>
    <br/><br/><br/>
    <div class="container">
            <div class="header">
                <div id="map"></div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script>
        function initMap() {
            var richmond = {lat: 49.16319, lng: -123.13775};
            var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 13,
            center: richmond
            });

            <?php 
                include_once "../model/common.php";
                include_once "../model/access.func.php";

                $makerfunc = new AccessAd;
                $makerfunc-> generateMarker();
            ?>
            var marker = new google.maps.Marker({
            position: richmond,
            map: map
            });
            
        }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAX84TTeE_DvhLEAU5A3VwADL5Ryvjz3c&callback=initMap">
    </script>
</body>

</html>