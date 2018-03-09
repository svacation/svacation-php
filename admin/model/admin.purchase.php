<?php if(!defined('In_System')) exit("Access Denied");
Class Purchase{
    public $time = "";
    public $date;
    public $itemList = ["doujiang","tiandoujiang","niunai","guozhi","furu","zhacai","laoganma","ganlancai","xianyadan","huashengjiang","caomeijiang","shengjidan","maipian","culiangmianbao","doushabao","xiaomantou","shouzhuabing","jiaozi","miantiao","dami","xiaomi","hongdou","lvdou","pingguo","xiangjiao","chengzi","guoli","juzi","xihongshi","bocai","digua","huanggua","tudou","you","yan","jiang","cu","tang"];
    //
    public $itemChineseList = ["豆浆","甜豆浆","牛奶","果汁","腐乳","榨菜","老干妈","橄榄菜","咸鸭蛋","花生酱","草莓酱","生鸡蛋","麦片","粗粮面包","豆沙包","小馒头","手抓饼","饺子","面条","大米","小米","红豆","绿豆","苹果","香蕉","橙子","果梨","橘子","西红柿","菠菜","地瓜","黄瓜","土豆","油","盐","酱","醋","糖"];
    public $table = "purchase_service INNER JOIN users ON users.salt=purchase_service.user";
    public $rawStates = "users.uid,users.username,users.phone,users.address,purchase_service.date,purchase_service.property,purchase_service.origin_address,purchase_service.locker";
    public $completeStates = "";
    public function generateState() {
        $size = sizeof($this->itemList);
        $this->completeStates = $this->completeStates . $this->rawStates;
        while ($size>0){
            $this->completeStates = $this->completeStates . ",purchase_service." . $this->itemList[$size-1];
            $size--;
        }
    }
    public function totalQuery($condition) {
        $size = sizeof($this->itemList);
        $totalString = "select sum(doujiang)";
        $i = 1;
        while ($i<$size){
            $totalString = $totalString . ",sum(" . $this->itemList[$i] . ")";
            $i++;
        }
        return $totalString . " from ".$this->table. " where ".$condition;
    }
    public function summary(){
        $condition = "";
        $query="SELECT ". $this->completeStates." from ".$this->table. " ORDER BY purchase_service.pid DESC";
        $this->time = "";    
        $size = sizeof($this->itemList);
        $totalString = "select sum(doujiang)";
        $i = 1;
        while ($i<$size){
            $totalString = $totalString . ",sum(" . $this->itemList[$i] . ")";
            $i++;
        }
        $totalString = $totalString . " from ".$this->table;
        $this->showResult($query, $totalString);
    }
    public function thisWeekListing(){
        $condition = "(SUBDATE(CURDATE(),DATE_FORMAT(CURDATE(),'%w')+2))<=DATE(purchase_service.date) and DATE(purchase_service.date)<=(SUBDATE(CURDATE(),DATE_FORMAT(CURDATE(),'%w')-4))";
        $query="SELECT ". $this->completeStates." from ".$this->table. " where ".$condition;
        $this->time = "上周五到这周四";    
        $this->showResult($query, $this -> totalQuery($condition));
    }
    public function nextWeekListing(){
        $condition = "(SUBDATE(CURDATE(),DATE_FORMAT(CURDATE(),'%w')-5))<=DATE(purchase_service.date) and DATE(purchase_service.date)<=(SUBDATE(CURDATE(),DATE_FORMAT(CURDATE(),'%w')-11))";
        $query="SELECT ". $this->completeStates." FROM ".$this->table. " where ".$condition;
        $this->time = "这周五到下周四";
        $this->showResult($query, $this -> totalQuery($condition));
    }

    public function twoWeekLater(){
        $condition = "(SUBDATE(CURDATE(),DATE_FORMAT(CURDATE(),'%w')-12))<=DATE(purchase_service.date) and DATE(purchase_service.date)<=(SUBDATE(CURDATE(),DATE_FORMAT(CURDATE(),'%w')-18))";
        $query="SELECT ". $this->completeStates." FROM ".$this->table. " where ".$condition;
        $this->time = "下周五到下下周四";
        $this->showResult($query, $this -> totalQuery($condition));
    }

    public function showResult($query,$totalQuery) {
        $pageString="";
        $size = sizeof($this->itemList);
        $tableString ="<br/><br/>
        <div class=\"table-responsive\">
        <table class=\"table table-bordered\">
        <thead> 
        <tr>
            <th>#</th>
            <th>客户名</th>
            <th>电话</th>
            <th>地址</th>";
            for ($i = 0; $i<$size; $i++) {
                $tableString = $tableString . "<th>" . $this->itemChineseList[$i] ."</th>";
            }
        $tableString= $tableString . "</tr>
                        </thead> 
                        <tbody>";

        global $mysqli;
        $limit      = ( isset( $_GET['limit'] ) ) ? $_GET['limit'] : 10;
        $page       = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
        $links      = ( isset( $_GET['links'] ) ) ? $_GET['links'] : 3;
        $Paginator  = new Paginator( $mysqli, $query);
        $result    = $Paginator->getData( $limit, $page);
        $rs = $mysqli->query( $totalQuery );
        $row2 = $rs->fetch_assoc();
		if(sizeof($result->data) > 0){
            foreach($result->data as $Summary){
                $row = "
                    <tr>
                        <td>".$Summary['uid']."</td>
                        <td>".$Summary['username']."</td>
                        <td><a href=\"tel:".$Summary['phone']."\">".$Summary['phone']."</a></td>
                        <td>".$Summary['address']."</td>"; 

                for ($i = 0; $i<$size; $i++) {
                    if ($Summary[$this->itemList[$i]] == 0) {
                        $row = $row . "<th></th>";

                    }
                    else $row = $row . "<th>" . $Summary[$this->itemList[$i]] ."</th>";
                }
                $row = $row . "</tr>";
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
            
        $sumString ="<br/><br/>
        <div class=\"table-responsive\">
        <table class=\"table table-bordered\">
        <tbody>
        <tr>";
            for ($i = 0; $i<19; $i++) {
                $sumString = $sumString . "<th style='min-width:8rem'>" . $this->itemChineseList[$i] ." : ". $row2['sum(' . $this->itemList[$i] . ')']."</th>";
            }
            $sumString = $sumString ."</tr><tr>";
            for ($i = 19; $i<$size; $i++) {
                $sumString = $sumString . "<th style='min-width:9rem'>" . $this->itemChineseList[$i] ." : ". $row2['sum(' . $this->itemList[$i] . ')']."</th>";
            }
            $sumString= $sumString . "</tr>

                        </tbody>
                        </table>
                        </div>";
            $printString = "<br/><h5>" . $this->time ."一共 :";
            echo $printString;
            echo $sumString;
             $pageString=$Paginator->createLinks($pageType,$links, 'pagination pagination-sm');
            }else{
            $tableString=$tableString."</table></div><br/>";
        }
        echo $tableString;
        echo $pageString;
    }
}?>