<?php if(!defined('In_System')) exit("Access Denied");
Class Housekeeping{
    public $time = "";
    public $date;
    public $table = "housekeeping_service INNER JOIN users ON users.salt=housekeeping_service.user";
    public $condition = "MONTH(housekeeping_service.time) = MONTH";
    public $stats = "users.uid,users.username,users.phone,housekeeping_service.time,housekeeping_service.accompany,housekeeping_service.maid,housekeeping_service.additionalNote";
    public function totalQuery($time) {
        return "select sum(accompany), sum(maid) from ".$this->table. " where ".$this->condition."(".$time.")";
    }
    public function summary(){
        $query="SELECT ". $this->stats." from ".$this->table. " ORDER BY housekeeping_service.hid DESC";
        $this->time = "（所有记录，含过期）";    
        $this->showResult($query, "select sum(accompany), sum(maid) from ".$this->table);
    }
    public function thisMonthListing(){
        $query="SELECT ". $this->stats." from ".$this->table. " where ".$this->condition."(CURDATE())";
        $this->time = "本月";    
        $this->showResult($query, $this -> totalQuery("CURDATE()"));
    }
    public function nextMonthListing(){
        $query="SELECT ". $this->stats." FROM ".$this->table. " WHERE ".$this->condition."(CURDATE()+ INTERVAL 1 MONTH)";
        $this->time = "下月";
        $this->showResult($query, $this -> totalQuery("CURDATE()+INTERVAL 1 MONTH"));
    }

    public function twoMonthLater(){
        $query="SELECT ". $this->stats." FROM ".$this->table. " WHERE ".$this->condition."(CURDATE()+ INTERVAL 2 MONTH)";
        $this->date = new DateTime('today');
        $this->time = $this->date->modify('+2 month')->format('m')."月";
        $this->showResult($query, $this -> totalQuery("CURDATE()+INTERVAL 2 MONTH"));
    }

    public function showResult($query,$totalQuery) {
        $pageString="";
        $tableString ="<br/>
        <div class=\"table-responsive\">
        <table class=\"table table-bordered\">
        <thead> 
        <tr>
            <th>#</th>
            <th>客户名</th>
            <th>电话</th>
            <th>时间</th>
            <th>陪产</th>
            <th>月嫂</th>
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
        $totalAccompany=$row['sum(accompany)'];
        $totalMaid=$row['sum(maid)'];
		if(sizeof($result->data) > 0){
            foreach($result->data as $Summary){
                $row = "
                    <tr>
                        <td>".$Summary['uid']."</td>
                        <td>".$Summary['username']."</td>
                        <td><a href=\"tel:".$Summary['phone']."\">".$Summary['phone']."</a></td> 
                        <td>".$Summary['time']."</td> 
                        <td>".$Summary['accompany']."</td> 
                        <td>".$Summary['maid']."</td> 
                        <td>".$Summary['additionalNote']."</td> 
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
             echo sprintf( "<br/><h5>%s一共%d项陪产，%d项月嫂服务</h5>",$this->time, $totalAccompany,$totalMaid);
             $pageString=$Paginator->createLinks($pageType,$links, 'pagination pagination-sm');
            }else{
            $tableString=$tableString."</table></div>";
        }
        echo $tableString;
        echo $pageString;
    }
}?>