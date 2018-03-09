<?php if(!defined('In_System')) exit("Access Denied");
Class Pickup{
    public $time = "";
    public $date;
    public function totalQuery($time) {
        return "select count(*) FROM pickup_service INNER JOIN users ON users.salt=pickup_service.user WHERE DATE(pickup_service.date) = DATE(".$time.")";
    }
    public function summary(){
        $query="SELECT users.uid,users.username,users.phone,pickup_service.date,pickup_service.time,pickup_service.departure,pickup_service.destination,pickup_service.additional,pickup_service.num_ppl FROM pickup_service INNER JOIN users ON users.salt=pickup_service.user ORDER BY pickup_service.pid DESC";
        $this->time = "（所有记录，含过期）";
        $this->showResult($query,"select count(*) FROM pickup_service INNER JOIN users ON users.salt=pickup_service.user");
    }

    public function todayListing(){
        $query="SELECT users.uid,users.username,users.phone,pickup_service.date,pickup_service.time,pickup_service.departure,pickup_service.destination,pickup_service.additional,pickup_service.num_ppl FROM pickup_service INNER JOIN users ON users.salt=pickup_service.user WHERE DATE(pickup_service.date) = DATE(CURDATE())";
        $this->time = "今天";
        $this->showResult($query, $this -> totalQuery("CURDATE()"));
    }

    public function tomorrowListing(){
        $query="SELECT users.uid,users.username,users.phone,pickup_service.date,pickup_service.time,pickup_service.departure,pickup_service.destination,pickup_service.additional,pickup_service.num_ppl FROM pickup_service INNER JOIN users ON users.salt=pickup_service.user WHERE DATE(pickup_service.date) = DATE(CURDATE()+ INTERVAL 1 DAY)";
        $this->time = "明天";
        $this->showResult($query, $this -> totalQuery("CURDATE()+ INTERVAL 1 DAY"));
    }

    public function twoDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,pickup_service.date,pickup_service.time,pickup_service.departure,pickup_service.destination,pickup_service.additional,pickup_service.num_ppl FROM pickup_service INNER JOIN users ON users.salt=pickup_service.user WHERE DATE(pickup_service.date) = DATE(CURDATE()+ INTERVAL 2 DAY)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+2 day')->format('m-d');
        $this->showResult($query, $this -> totalQuery("CURDATE()+ INTERVAL 2 DAY"));
    }

    public function threeDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,pickup_service.date,pickup_service.time,pickup_service.departure,pickup_service.destination,pickup_service.additional,pickup_service.num_ppl FROM pickup_service INNER JOIN users ON users.salt=pickup_service.user WHERE DATE(pickup_service.date) = DATE(CURDATE()+ INTERVAL 3 DAY)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+3 day')->format('m-d');
        $this->showResult($query, $this -> totalQuery("CURDATE()+ INTERVAL 3 DAY"));
    }

    public function fourDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,pickup_service.date,pickup_service.time,pickup_service.departure,pickup_service.destination,pickup_service.additional,pickup_service.num_ppl FROM pickup_service INNER JOIN users ON users.salt=pickup_service.user WHERE DATE(pickup_service.date) = DATE(CURDATE()+ INTERVAL 4 DAY)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+4 day')->format('m-d');
        $this->showResult($query, $this -> totalQuery("CURDATE()+ INTERVAL 4 DAY"));
    }

    public function fiveDaysLater(){
        $query="SELECT users.uid,users.username,users.phone,pickup_service.date,pickup_service.time,pickup_service.departure,pickup_service.destination,pickup_service.additional,pickup_service.num_ppl FROM pickup_service INNER JOIN users ON users.salt=pickup_service.user WHERE DATE(pickup_service.date) = DATE(CURDATE()+ INTERVAL 5 DAY)";
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
            <th>出发地</th>
            <th>目的地</th>
            <th>人数</th>
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

                list($am, $pm,$third) = explode('AM', $Summary['time']);
                list($nothing, $dash,$pm2) = explode(' ', $pm);

                $row = "
                    <tr>
                        <td>".$Summary['uid']."</td>
                        <td>".$Summary['username']."</td>
                        <td><a href=\"tel:".$Summary['phone']."\">".$Summary['phone']."</a></td> 
                        <td>".$Summary['date']." ".$am.$dash.$pm2."</td> 
                        <td>".$Summary['departure']."</td> 
                        <td>".$Summary['destination']."</td> 
                        <td>".$Summary['num_ppl']."</td> 
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
             echo sprintf( "<br/><h5>%s一共%d项接送服务</h5>",$this->time, $total);
             $pageString=$Paginator->createLinks($pageType,$links, 'pagination pagination-sm');
            }else{
            $tableString=$tableString."</table></div>";
        }
        echo $tableString;
        echo $pageString;
    }
}?>