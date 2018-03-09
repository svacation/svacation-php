<?php DEFINE('Template_Call', TRUE); 


    
    //Check if the user is login
    if (!isset($_COOKIE['isAdminLogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }

?>
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
<br/>
<body>
<div style="padding-left:8%;padding-right:8%;">
 <h3>--地图管理后台--</h3>
 <br/>
<?php 
    include_once "../model/common.php";
    include_once "../model/map_edit.php";


    $mapEdit = new MapEdit();
    $mapEdit->mapEdit();

    if(isset($_POST['addNewAddress'])){
		$mapEdit->addNewAddress();
	} else if(isset($_POST['deleteAddress'])){
		$mapEdit->deleteAddress();
	} 
?>
<br/><br/>
<a href="../admin_access.php"><span style="font-size:20px;"><b><-返回菜单</b></span></a>
<?php 
    include_once "../../component/adminFooter.php";
?>
</div>
</body>
</html>