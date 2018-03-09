<?php
    include_once "./model/common.php";
	include_once "./model/member.func.php";
	include_once "./admin/model/admin_login.func.php";

	$member = new Member();
	$admin = new Admin();
	// $history = new History();
	if(isset($_POST['login'])){
		$member->login();
	}elseif(isset($_POST['register'])){
		$member->register();
	}elseif(isset($_POST['admin_login'])){
		$admin->admin_login();
	}elseif(isset($_POST['history'])){ 
		$history->history_list();
	}elseif(isset($_POST['logout'])){
        $member->logout();
    }elseif(isset($_POST['getUser'])){
        $member->getUser();
    }elseif(isset($_POST['update_user'])){
        $member->update_user();
    }
?>