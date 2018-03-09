<?php if(!defined('In_System')) exit("Access Denied");
Class Pickup{
    public $time = "";
    public $date;
    public function totalQuery($time) {
        return "select count(*) FROM medical_service INNER JOIN users ON users.salt=medical_service.user WHERE DATE(medical_service.time) = DATE(".$time.")";
    }
    public function summaryListing(){
        $query="SELECT users.uid,users.username,users.phone,medical_service.time,medical_service.additional,medical_service.medicalServiceType FROM medical_service INNER JOIN users ON users.salt=medical_service.user ORDER BY medical_service.sid DESC";
        $this->time = "";
        $this->showResult($query, "select count(*) FROM medical_service INNER JOIN users ON users.salt=medical_service.user");
    }
    public function todayListing(){
        $query="SELECT users.uid,users.username,users.phone,medical_service.time,medical_service.additional,medical_service.medicalServiceType FROM medical_service INNER JOIN users ON users.salt=medical_service.user WHERE DATE(medical_service.time) = DATE(CURDATE())";
        $this->time = "今天";
        $this->showResult($query, $this -> totalQuery("CURDATE()"));
    }

    public function tomorrowListing(){
        $query="SELECT users.uid,users.username,users.phone,medical_service.time,medical_service.additional,medical_service.medicalServiceType FROM medical_service INNER JOIN users ON users.salt=medical_service.user WHERE DATE(medical_service.time) = DATE(CURDATE()+ INTERVAL 1 DAY)";
        $this->time = "明天";
        $this->showResult($query, $this -> totalQuery("CURDATE()+ INTERVAL 1 DAY"));
    }

    public function twoDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,medical_service.time,medical_service.additional,medical_service.medicalServiceType FROM medical_service INNER JOIN users ON users.salt=medical_service.user WHERE DATE(medical_service.time) = DATE(CURDATE()+ INTERVAL 2 DAY)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+2 day')->format('m-d');
        $this->showResult($query, $this -> totalQuery("CURDATE()+ INTERVAL 2 DAY"));
    }

    public function threeDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,medical_service.time,medical_service.additional,medical_service.medicalServiceType FROM medical_service INNER JOIN users ON users.salt=medical_service.user WHERE DATE(medical_service.time) = DATE(CURDATE()+ INTERVAL 3 DAY)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+3 day')->format('m-d');
        $this->showResult($query, $this -> totalQuery("CURDATE()+ INTERVAL 3 DAY"));
    }

    public function fourDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,medical_service.time,medical_service.additional,medical_service.medicalServiceType FROM medical_service INNER JOIN users ON users.salt=medical_service.user WHERE DATE(medical_service.time) = DATE(CURDATE()+ INTERVAL 4 DAY)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+4 day')->format('m-d');
        $this->showResult($query, $this -> totalQuery("CURDATE()+ INTERVAL 4 DAY"));
    }

    public function fiveDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,medical_service.time,medical_service.additional,medical_service.medicalServiceType FROM medical_service INNER JOIN users ON users.salt=medical_service.user WHERE DATE(medical_service.time) = DATE(CURDATE()+ INTERVAL 5 DAY)";
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
            <th>时间</th>
            <th>服务</th>
            <th>备注</th>
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
                $time = new DateTime($Summary['time']);
                $time = $time->format('Y-m-d G:i');
                $row = "
                    <tr>
                        <td>".$Summary['uid']."</td>
                        <td>".$Summary['username']."</td>
                        <td><a href=\"tel:".$Summary['phone']."\">".$Summary['phone']."</a></td> 
                        <td>".$time."</td> 
                        <td>".$Summary['medicalServiceType']."</td> 
                        <td>".$Summary['additional']."</td> 
                    </tr>
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
             echo sprintf( "<br/><h5>%s一共%d项医疗接送服务</h5>",$this->time, $total);
             $pageString=$Paginator->createLinks($pageType,$links, 'pagination pagination-sm');
            }else{
            $tableString=$tableString."</table></div>";
        }
        echo $tableString;
        echo $pageString;
    }
}?>