<?php if(!defined('In_System')) exit("Access Denied");
Class Repair{
    public $time = "";
    public $date;
    private $serviceToken;
    private $finish;
    private $replyNote;

	public function __construct() {
        $this->serviceToken = isset($_POST['serviceToken']) ? $_POST['serviceToken'] : null;
        $this->finish = isset($_POST['finish']) ? $_POST['finish'] : null;
        $this->replyNote = isset($_POST['replyNote']) ? $_POST['replyNote'] : null;
	}

    public function totalQuery($time) {
        return "select count(*) from repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(".$time.")";
    }

    // public function showResult($date) {
    //     if ($date == "summary"){
    //         $display_query = "SELECT users.uid,users.username,users.phone, users.address, repair_service.rid, repair_service.serviceToken, repair_service.repairNote, repair_service.replyNote, repair_service.finish FROM repair_service INNER JOIN users ON users.salt=repair_service.user ORDER BY repair_service.rid DESC"; 
    //         $results = mysqli_fetch_all($mysqli->query($display_query), MYSQLI_ASSOC);
    //         if(sizeof($results) >= 0){
    //             $this->displayResult($results, sizeof($results));
    //         }else{
    //             printf("Registration failure: %s\n", $mysqli->error);
    //             exit();
    //         }
    //     }
    //     if ($date == "today"){
    //         $display_query = "SELECT users.uid,users.username,users.phone, users.address, repair_service.rid, repair_service.serviceToken, repair_service.repairNote, repair_service.replyNote, repair_service.finish FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()) ORDER BY repair_service.rid DESC"; 
    //         $results = mysqli_fetch_all($mysqli->query($display_query), MYSQLI_ASSOC);
    //         if(sizeof($results) >= 0){
    //             $this->displayResult($results, sizeof($results));
    //         }else{
    //             printf("Registration failure: %s\n", $mysqli->error);
    //             exit();
    //         }
    //     }
    //     if ($date == "tomorrow"){
    //         $display_query = "SELECT users.uid,users.username,users.phone, users.address, repair_service.rid, repair_service.serviceToken, repair_service.repairNote, repair_service.replyNote, repair_service.finish FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 1 DAY) ORDER BY repair_service.rid DESC"; 
    //         $results = mysqli_fetch_all($mysqli->query($display_query), MYSQLI_ASSOC);
    //         if(sizeof($results) >= 0){
    //             $this->displayResult($results, sizeof($results));
    //         }else{
    //             printf("Registration failure: %s\n", $mysqli->error);
    //             exit();
    //         }
    //     }
    //     if ($date == "twoDaysLater"){
    //         $display_query = "SELECT users.uid,users.username,users.phone, users.address, repair_service.rid, repair_service.serviceToken, repair_service.repairNote, repair_service.replyNote, repair_service.finish FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 2 DAY) ORDER BY repair_service.rid DESC"; 
    //         $results = mysqli_fetch_all($mysqli->query($display_query), MYSQLI_ASSOC);
    //         if(sizeof($results) >= 0){
    //             $this->displayResult($results, sizeof($results));
    //         }else{
    //             printf("Registration failure: %s\n", $mysqli->error);
    //             exit();
    //         }
    //     }
    //     if ($date == "threeDaysLater"){
    //         $display_query = "SELECT users.uid,users.username,users.phone, users.address, repair_service.rid, repair_service.serviceToken, repair_service.repairNote, repair_service.replyNote, repair_service.finish FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 3 DAY) ORDER BY repair_service.rid DESC"; 
    //         $results = mysqli_fetch_all($mysqli->query($display_query), MYSQLI_ASSOC);
    //         if(sizeof($results) >= 0){
    //             $this->displayResult($results, sizeof($results));
    //         }else{
    //             printf("Registration failure: %s\n", $mysqli->error);
    //             exit();
    //         }
    //     }
    //     if ($date == "fourDaysLater"){
    //         $display_query = "SELECT users.uid,users.username,users.phone, users.address, repair_service.rid, repair_service.serviceToken, repair_service.repairNote, repair_service.replyNote, repair_service.finish FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 4 DAY) ORDER BY repair_service.rid DESC"; 
    //         $results = mysqli_fetch_all($mysqli->query($display_query), MYSQLI_ASSOC);
    //         if(sizeof($results) >= 0){
    //             $this->displayResult($results, sizeof($results));
    //         }else{
    //             printf("Registration failure: %s\n", $mysqli->error);
    //             exit();
    //         }
    //     }
    //     if ($date == "fiveDaysLater"){
    //         $display_query = "SELECT users.uid,users.username,users.phone, users.address, repair_service.rid, repair_service.serviceToken, repair_service.repairNote, repair_service.replyNote, repair_service.finish FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 5 DAY) ORDER BY repair_service.rid DESC"; 
    //         $results = mysqli_fetch_all($mysqli->query($display_query), MYSQLI_ASSOC);
    //         if(sizeof($results) >= 0){
    //             $this->displayResult($results, sizeof($results));
    //         }else{
    //             printf("Registration failure: %s\n", $mysqli->error);
    //             exit();
    //         }
    //     }
    // }

    // public function paginateResult($repair_query) {
    //     global $mysqli;
    //     $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
    //     $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
    //     $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 3;
    //     $Paginator  = new Paginator( $mysqli, $repair_query);
    //     $result    = $Paginator->getData( $limit, $page);
    //     return $result;
    // }


    // public function displayResult($results, $count){
    //     echo sprintf(" 
    //         <p>共计有%d个事项, 奔跑吧!</p>
    //         ", $count);

    //     echo sprintf(" 
    //         <div class=\"table-responsive\">
    //         <table class=\"table table-bordered\">
    //         <thead> 
    //         <tr>
    //             <th>#</th>
    //             <th>姓名</th>
    //             <th>电话</th>
    //             <th>地址</th>
    //             <th>事项</th>
    //             <th>回复</th>
    //             <th>状态</th>
    //             <th>修改</th>
    //         </tr>
    //         </thead> 
    //         <tbody> 
    //         ");
        
    //     foreach( $results as $result){
    //         $isFinish = $result['finish'];
    //         if ($isFinish == 0){
    //             $finish = "没完成";
    //         }else{
    //             $finish = "已完成";
    //         }

    //         echo sprintf(" 
    //                     <form action=\"./admin_repair_edit.php\" method=\"post\">
    //                     <input type=\"hidden\" name=\"serviceToken\" value=%d>
    //                     <tr>
    //                         <td>%d</td> 
    //                         <td>%s</td> 
    //                         <td>%d</td>
    //                         <td>%s</td>
    //                         <td>%s</td>
    //                         <td>%s</td>
    //                         <td>%s</td>
    //                         <td><button tyle=\"submit\" class=\"btn btn-info\" name=\"repair_edit\">添加/修改</button></td> 
    //                     </tr> 
    //                     </form>
    //         ", $result['serviceToken'], $result['rid'], $result['username'], $result['phone'], $result['address'], $result['repairNote'], $result['replyNote'], $finish);
    //     }

    //     echo sprintf(" 
    //                 </tbody> 
    //                 </table>
    //             </div>");
    //     return 1;
    // }

    public function repair_edit($serviceToken){
        global $mysqli;
        if ($serviceToken == null){
            echo "<script type=\"text/javascript\">alert('系统出错啦，请联系管理员.');</script>";
            exit();
        }else{
            $repair_query = "SELECT * FROM repair_service WHERE serviceToken = '$serviceToken'";
            $repair_exist = $mysqli->query($repair_query);
            if($repair_exist->num_rows > 0){
                $repair_retrieve = $repair_exist->fetch_assoc();
                echo sprintf("<form action=\"./admin_function.php\" method=\"post\">
                            <input type=\"hidden\" name=\"serviceToken\" value=%d>
                            <div class=\"form-group\">
                            <label style=\"width:80px;\">服务序列: </label>
                            <label>%d</label>
                            </div>
                            <div class=\"form-group\">
                            <label style=\"width:80px;\">时间: </label>
                            <label>%s</label>
                            </div>
                            <div class=\"form-group\">
                            <label style=\"width:80px;\" >回复: </label>
                            <input style=\"text\" name=\"replyNote\" value=%s>
                            </div>
                            <div class=\"form-group\">
                            <label style=\"width:80px;\">完成进度: </label>
                            <select name=\"finish\">
                            <option value = 1>完成</option>
                            <option value = 0>未完成</option>
                            </select>
                            </div>
                            <br/>
                            <button type=\"submit\" class=\"btn btn-primary\" name=\"update_repair\">确认修改</button>
                            <button type=\"submit\" class=\"btn btn-danger\" name=\"delete_repair\">删除用户</button>
                    </form><br/>", $repair_retrieve['serviceToken'], $repair_retrieve['rid'], $repair_retrieve['time'], $repair_retrieve['replyNote']);
                /*cookies expire in 7 days*/
                return 1;
            }
        }
    }

    public function update_repair(){
        GLOBAL $mysqli;

        /* UPdate DB if the user change the user info data */
        $update_query = "UPDATE repair_service SET replyNote='$this->replyNote', finish='$this->finish' WHERE serviceToken = '$this->serviceToken' ";
        if($mysqli->query($update_query)){
            echo "<script type=\"text/javascript\">alert('您已成功修改信息！');window.location.replace('/admin/admin_repair.php?pageType=summary');</script>";
        }else{
            printf("Registration failure: %s\n", $mysqli->error);
            exit();
        }
    }

    public function delete_repair(){
        GLOBAL $mysqli;

        /* UPdate DB if the user change the user info data */
        $delete_query = "DELETE FROM repair_service WHERE serviceToken = '$this->serviceToken' ";
        if($mysqli->query($delete_query)){
            echo "<script type=\"text/javascript\">alert('您已成功删除信息！');window.location.replace('/admin/admin_repair.php?pageType=summary');</script>";
        }else{
            printf("Registration failure: %s\n", $mysqli->error);
            exit();
        }

        /* UPdate DB if the user change the user info data */
        $delete_history_query = "DELETE FROM history WHERE token = '$this->serviceToken' ";
        if($mysqli->query($delete_history_query)){
        }else{
            printf("Registration failure: %s\n", $mysqli->error);
            exit();
        }
    }

    public function summary(){
        $query="SELECT users.uid,users.username,users.phone, users.address, repair_service.serviceToken, repair_service.repairNote, repair_service.replyNote, repair_service.finish FROM repair_service INNER JOIN users ON users.salt=repair_service.user ORDER BY repair_service.rid DESC";
        $this->time = "总";
        $this->showResult($query,"select count(*) from repair_service INNER JOIN users ON users.salt=repair_service.user");
    }

    public function todayListing(){
        $query="SELECT users.uid,users.username,users.phone, users.address, repair_service.serviceToken, repair_service.repairNote, repair_service.replyNote, repair_service.finish FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE())";
        $this->time = "今天";
        $this->showResult($query, $this -> totalQuery("CURDATE()"));
    }

    public function tomorrowListing(){
        $query="SELECT users.uid,users.username,users.phone, users.address, repair_service.serviceToken, repair_service.repairNote, repair_service.replyNote, repair_service.finish FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 1 DAY)";
        $this->time = "明天";
        $this->showResult($query, $this -> totalQuery("CURDATE()+ INTERVAL 1 DAY"));
    }

    public function twoDaysLater(){
        $query="SELECT users.uid,users.username,users.phone, users.address, repair_service.serviceToken, repair_service.repairNote, repair_service.replyNote, repair_service.finish FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 2 DAY)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+2 day')->format('m-d');
        $this->showResult($query, $this -> totalQuery("CURDATE()+ INTERVAL 2 DAY"));
    }

    public function threeDaysLater(){
        $query="SELECT users.uid,users.username,users.phone, users.address, repair_service.serviceToken, repair_service.repairNote, repair_service.replyNote, repair_service.finish FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 3 DAY)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+3 day')->format('m-d');
        $this->showResult($query, $this -> totalQuery("CURDATE()+ INTERVAL 3 DAY"));
    }

    public function fourDaysLater(){
        $query="SELECT users.uid,users.username,users.phone, users.address, repair_service.serviceToken, repair_service.repairNote, repair_service.replyNote, repair_service.finish FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 4 DAY)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+4 day')->format('m-d');
        $this->showResult($query, $this -> totalQuery("CURDATE()+ INTERVAL 4 DAY"));
    }

    public function fiveDaysLater(){
        $query="SELECT users.uid,users.username,users.phone, users.address, repair_service.serviceToken, repair_service.repairNote, repair_service.replyNote, repair_service.finish FROM repair_service INNER JOIN users ON users.salt=repair_service.user WHERE DATE(repair_service.time) = DATE(CURDATE()+ INTERVAL 5 DAY)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+5 day')->format('m-d');
        $this->showResult($query, $this -> totalQuery("CURDATE()+ INTERVAL 5 DAY"));
    }

    public function showResult($query,$totalQuery) {
        $pageString="";
        $tableString ="<br/>
        <div class=\"table-responsive\">
        <table class=\"table table-bordered\">
        <thead> 
        <tr>
            <th>#</th>
            <th>姓名</th>
            <th>电话</th>
            <th>地址</th>
            <th>事项</th>
            <th>回复</th>
            <th>状态</th>
            <th>修改</th>
        </tr>
        </thead> 
        <tbody> 
        ";

        global $mysqli;
        $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
        $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
        $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 3;
        $Paginator  = new Paginator( $mysqli, $query);
        $result    = $Paginator->getData( $limit, $page);
        $rs = $mysqli->query( $totalQuery );
        $row = $rs->fetch_assoc();
        $total=$row['count(*)'];
        if(sizeof($result->data) > 0){
            foreach($result->data as $Summary){
                $isFinish = $Summary['finish'];
                    if ($isFinish == 0){
                        $finish = "没完成";
                    }else{
                        $finish = "已完成";
                    }
                $row = "
                <form action=\"./admin_repair_edit.php\" method=\"post\">
                    <input type=\"hidden\" name=\"serviceToken\" value=".$Summary['serviceToken'].">
                    <tr>
                        <td>".$Summary['uid']."</td>
                        <td>".$Summary['username']."</td>
                        <td><a href=\"tel:".$Summary['phone']."\">".$Summary['phone']."</a></td>
                        <td>".$Summary['address']."</td> 
                        <td>".$Summary['repairNote']."</td> 
                        <td>".$Summary['replyNote']."</td> 
                        <td>".$finish."</td> 
                        <td><button tyle=\"submit\" class=\"btn btn-info\" name=\"repair_edit\">添加/修改</button></td>
                    </tr>
                </form>
            ";
            $tableString=$tableString.$row;
            }
            $tableString=$tableString.
            "</tbody>
            </table>
            </div>";
            $pageType = $_GET['pageType'];
            if (!isset($pageType)) {
                printf("undefined pageType");
                exit();
            }
             echo sprintf( "<br/><h5>%s共有%d个事项，奔跑吧！</h5>",$this->time, $total);
             $pageString=$Paginator->createLinks($pageType,$links, 'pagination pagination-sm');
            }else{
            $tableString=$tableString."</table></div>";
        }
        echo $tableString;
        echo $pageString;
    }
}
?>