<?php


class AccessAd{

    public function accessAdmin(){
        global $mysqli;
        $isAdminLogin =  $_COOKIE['isAdminLogin'];
		$check_query = "SELECT * FROM admin WHERE password = '$isAdminLogin'";
        $result = $mysqli->query($check_query);
		if($result->num_rows > 0){
            $result_retrieve = $result->fetch_assoc();
            $permissions =  explode( '/',$result_retrieve['permission']);
            foreach($permissions as $permission){
                /* Check for permission: 
                    1.用户管理
                    2.医疗接送
                    3.订餐服务
                    4.采购服务
                    5.住房维修
                    6.出行服务
                    7.孕产服务
                */
                if($permission === "1"){
                    echo sprintf("
                        <a class=\"btn\" href=\"./user_permission.php\">用户管理</a><br/>   
                    ");
                }
                if($permission === "10"){
                    echo sprintf("
                        <a class=\"btn\" href=\"./user_pickup_info.php\">用户出行管理</a><br/>   
                    ");
                }
                if($permission === "2"){
                    echo sprintf("
                        <a class=\"btn\" href=\"./admin_medical.php?pageType=summary\">医疗接送</a><br/>  
                    ");
                }
                if($permission === "3"){
                    echo sprintf("
                        <a class=\"btn\" href=\"./admin_food.php?pageType=summary\">订餐服务</a><br/>   
                    ");
                }
                if($permission === "4"){
                    echo sprintf("
                        <a class=\"btn\" href=\"./admin_purchase.php?pageType=summary\">采购服务</a><br/>   
                    ");
                }
                if($permission === "5"){
                    echo sprintf("
                        <a class=\"btn\" href=\"./admin_repair.php?pageType=summary\">住房维修</a><br/>   
                    ");
                }
                if($permission === "6"){
                    echo sprintf("
                        <a class=\"btn\" href=\"./admin_pickup.php?pageType=summary\">出行服务</a><br/>   
                    ");
                }
                if($permission === "7"){
                    echo sprintf("
                        <a class=\"btn\" href=\"./admin_housekeeping.php?pageType=summary\">孕产服务</a><br/>   
                    ");
                }
                if($permission === "8"){
                    echo sprintf("
                        <a class=\"btn\" href=\"./admin_flight.php?pageType=summary\">接机送机</a><br/>   
                    ");
                }
                if($permission === "9"){
                    echo sprintf("
                        <a class=\"btn\" href=\"./map\">用户地址</a><br/>   
                    ");
                }
            }

        }else{
			echo "<script type=\"text/javascript\">alert('您的账户有问题，请联系管理员！ '); ;</script>";
		}
    }

    public function generateMarker(){
        global $mysqli;

        $address_query = "SELECT * FROM address";
        $address_result = $mysqli->query($address_query);
        $results = mysqli_fetch_all ($address_result, MYSQLI_ASSOC);
        foreach ($results as $result){
            $address_format = "{lat: " .$result['lat']. ", lng: ".$result['lng']. "}";
            echo sprintf("
                var contentString%d = '<div id=\"content\">'+
                '<div id=\"siteNotice\">'+
                '</div>'+
                '<h5 id=\"firstHeading\" class=\"firstHeading\">%s</h5>'+
                '</div></div></div>';

                var infowindow%d = new google.maps.InfoWindow({
                    content: contentString%d
                });
                var marker%d = new google.maps.Marker({
                    position: %s,
                    map: map,
                    title: \"dadd\"
                }); 
                
                marker%d.addListener('click', function() {
                    infowindow%d.open(map, marker%d);
                });
            ", $result['aid'],$result['address'],$result['aid'], $result['aid'], $result['aid'], $address_format, $result['aid'],$result['aid'],  $result['aid']);
        }
    }
}

?>