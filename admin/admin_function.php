<?php
    include_once "./model/common.php";
	include_once "./model/user_permission.func.php";
    include_once "./model/admin_login.func.php";
    include_once "./model/admin.repair.php";
    
    $user_permission = new User_Permission();
    $repair_admin = new Repair();
    $admin = new Admin();
    
    if(isset($_POST['update_user'])){
        $user_permission->update_user();
    }elseif(isset($_POST['admin_login'])){
		$admin->admin_login();
	}elseif(isset($_POST['delete_user'])){
		$user_permission->delete_user();
	}elseif(isset($_POST['update_repair'])){
		$repair_admin->update_repair();
	}elseif(isset($_POST['delete_repair'])){
		$repair_admin->delete_repair();
	}
?>