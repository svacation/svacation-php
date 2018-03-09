<?php if(!defined('In_System')) exit("Access Denied");
    

class Check_Foodcpy{

    public function check_foodcpys(){
        GLOBAL $mysqli;
        $user_id =  $_COOKIE['uid'];
        $check_query="SELECT * FROM food_service WHERE user = '$user_id' AND serviceType = '待产餐' AND display = 1";
        $result = $mysqli->query($check_query);
        if ($result->num_rows > 0){
            $check_retrieve = $result->fetch_assoc();
            if($check_retrieve['serviceType'] == "待产餐" ){
                echo sprintf(
                    "<div>
                        <h2><b>您已经预定了 - %s</b></h2>
                        <p>(如果有错误或者急事, 请打电话 Chuck: 778-895-3579, 微信有时无法及时回复。)</p>
                        <p>您预订的时间：</p>
                        <p>从 %s %s</p>
                        <p>到 %s %s</p>
                        <form action = \"./service_function.php\" method=\"post\">
                            <input type=\"hidden\" value=\"%d\" name=\"token\">
                            <button type=\"submit\" class=\"btn btn-primary\" style=\"margin-bottom:20px;\" name=\"food_delete\">更换套餐</button>
                        </form>
                    </div>", $check_retrieve['serviceType'], $check_retrieve['startDate'], $check_retrieve['startTime'], $check_retrieve['endDate'], $check_retrieve['endTime'], $check_retrieve['serviceToken']
                );
                return false;
            }
            return true;
        }else{
            return true;
        }
    
    }

}
?>