<?php if(!defined('In_System')) exit("Access Denied");


class History{

    public function historyListing(){
        global $mysqli;

        $user_id =  $_COOKIE['uid'];
        $histories_query="SELECT * FROM history WHERE user_id = '$user_id' ORDER BY hid DESC LIMIT 20";
        $result = mysqli_fetch_all($mysqli->query($histories_query), MYSQLI_ASSOC);
		if(sizeof($result) > 0){
            echo "
            <table class=\"table table-hover table-info\">
                <tr>
                    <th>服务类型</th>
                    <th>预定时间</th> 
                    <th>详细信息</th>
                </tr>
            ";
            foreach($result as $history){
                echo sprintf("
                    <tr>
                    <td>%s</td>
                    <td>%s</td> 
                    <td><a href=\"./history-detail.php?type=%s&token=%s\" class=\"btn btn-warning\" style=\"cursor:pointer;\">详细信息</a></td>
                    </tr>
                ", $history['serviceType'], $history['time'], $history['serviceType'], $history['token']     );
            }
            echo "
                </table>
             ";
		}else{
            echo "
                <table class=\"table table-hover table-info\">
                    <tr>
                        <th>服务类型</th>
                        <th>预定时间</th> 
                        <th>详细信息</th>
                    </tr>
                </table>
            ";
		}
    }
}

?>