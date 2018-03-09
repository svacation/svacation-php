<?php DEFINE('Template_Call', TRUE); 

    include_once "../component/adminHeader.php";
    
    //Check if the user is login
    if (!isset($_COOKIE['isAdminLogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }

?>
 <h3>--用户出行管理后台--</h3>
 <br/>
<?php 
    include_once "./model/common.php";
    include_once "./model/user.pickup.info.php";

    $userPickupInfo = new UserPickupInfo();
    $userPickupInfo->generateTable();
?>
<br/><br/>
<?php 
    include_once "../component/adminFooter.php";
?>
</body>
</html>