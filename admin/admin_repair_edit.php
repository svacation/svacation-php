<?php DEFINE('Template_Call', TRUE); 

    include_once "../component/adminHeader.php";
    
    
    //Check if the user is login
    if (!isset($_COOKIE['isAdminLogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }

?>
<div class="container">
<?php
    include_once "./model/common.php";
    include_once "./model/admin.repair.php";
    include_once "./model/check.admin.php";

    $check = new Check_Admin;
    $check->check_admin();

    $admin_repair = new Repair();

	if(isset($_POST['repair_edit'])){
        $serviceToken = isset($_POST['serviceToken']) ? $_POST['serviceToken'] : null;
		$admin_repair->repair_edit($serviceToken);
	} 
?>
</div>

<br/><br/>
<?php 
    include_once "../component/adminFooter.php";
?>