<?php if(!defined('In_System')) exit("Access Denied");


class DetailHistory{

    public function historyDetail($type, $serviceToken){
        global $mysqli;
        $user_id =  $_COOKIE['uid'];
        if($serviceToken == ""){
            echo "<script type=\"text/javascript\">alert('您选择的详细信息不存在! ');window.history.back();</script>"; 
        }

        if($type == "采购服务"){
            $detail_query="SELECT * FROM purchase_service WHERE serviceToken = '$serviceToken'";
            $detail_retrieve = $mysqli->query($detail_query);
            if($detail_retrieve->num_rows > 0){
                $detail_result = $detail_retrieve->fetch_assoc();
                $address = $detail_result['origin_address'];
                
                echo sprintf("
                        <form action=\"./service_function.php\" method=\"post\">
                        <input type=\"hidden\" name=\"serviceToken\" value=\"%d\">
                        <button type=\"submit\" class=\"btn btn-primary\" name=\"purchase_delete\">删除采购订单</button>
                        </form>
                        <table class=\"table table-hover table-info\">
                        <tr>
                            <td>公寓类型</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>地址</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>豆浆(甜)</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>豆浆(原味)</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>牛奶</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>果汁</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>腐乳</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>榨菜</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>老干妈</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>橄榄菜</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>咸鸭蛋</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>花生酱</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>草莓酱</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>生鸡蛋</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>麦片</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>粗粮面包</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>豆沙包</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>小馒头</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>手抓饼</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>饺子</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>面条</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>大米</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>小米</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>红豆</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>绿豆</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>苹果</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>香蕉</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>橙子</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>果梨</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>橘子</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>西红柿</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>菠菜</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>地瓜</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>黄瓜</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>土豆</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>油</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>盐</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>酱</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>醋</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>糖</td>
                            <td>%d</td>
                        </tr>
                    </table>
                ", $detail_result['serviceToken'], $detail_result['property'], $address, $detail_result['doujiang'], $detail_result['tiandoujiang'], $detail_result['niunai'], $detail_result['guozhi'], $detail_result['furu'], $detail_result['zhacai'], $detail_result['laoganma'], $detail_result['ganlancai'], $detail_result['xianyadan'], $detail_result['huashengjiang'], $detail_result['caomeijiang'], $detail_result['shengjidan'], $detail_result['maipian'], $detail_result['culiangmianbao'], $detail_result['doushabao'], $detail_result['xiaomantou'], $detail_result['shouzhuabing'], $detail_result['jiaozi'], $detail_result['miantiao'], $detail_result['dami'], $detail_result['xiaomi'], $detail_result['hongdou'], $detail_result['lvdou'], $detail_result['pingguo'], $detail_result['xiangjiao'], $detail_result['chengzi'], $detail_result['guoli'], $detail_result['juzi'] 
                , $detail_result['xihongshi'], $detail_result['bocai'], $detail_result['digua'], $detail_result['huanggua'], $detail_result['tudou'], $detail_result['you'], $detail_result['yan'], $detail_result['jiang'], $detail_result['cu'], $detail_result['tang']
                    );
            }
        }elseif($type == "孕妈月子餐" || $type == "孕妈待产餐"){
            $detail_query="SELECT * FROM food_service WHERE serviceToken = '$serviceToken'";
            $detail_retrieve = $mysqli->query($detail_query);
            if($detail_retrieve->num_rows > 0){
                $detail_result = $detail_retrieve->fetch_assoc();

                echo sprintf("<table class=\"table table-hover table-info\">
                        <tr>
                            <td>服务名称</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>开始时间</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>结束时间</td>
                            <td>%s</td>
                        </tr>
                    </table>
                ", $detail_result['serviceType'], $detail_result['startDate'] . " " .$detail_result['startTime'], $detail_result['endDate'] . " " . $detail_result['endTime']);
            }else{
                echo "您要的信息不存在！";
            }
        }elseif($type == "待产餐"){
            $detail_query="SELECT * FROM food_service WHERE serviceToken = '$serviceToken'";
            $detail_retrieve = $mysqli->query($detail_query);
            if($detail_retrieve->num_rows > 0){
                $detail_result = $detail_retrieve->fetch_assoc();

                echo sprintf("<table class=\"table table-hover table-info\">
                        <tr>
                            <td>服务名称</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>开始时间</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>结束时间</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>人数</td>
                            <td>%d</td>
                        </tr>
                    </table>
                ", $detail_result['serviceType'], $detail_result['startDate'] . " " .$detail_result['startTime'], $detail_result['endDate'] . " " . $detail_result['endTime'], $detail_result['num_ppl'] );
            }else{
                echo "您要的信息不存在！";
            }
        }elseif($type == "医疗接送"){
            $detail_query="SELECT * FROM medical_service WHERE serviceToken = '$serviceToken'";
            $detail_retrieve = $mysqli->query($detail_query);
            if($detail_retrieve->num_rows > 0) {
                $detail_result = $detail_retrieve->fetch_assoc();
                echo sprintf("<table class=\"table table-hover table-info\">
                        <tr>
                            <td>时间</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>医疗服务</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>备注信息</td>
                            <td>%s</td>
                        </tr>
                    </table>
                ", $detail_result['time'], $detail_result['medicalServiceType'], $detail_result['additional']);
            }else{
                echo "您要的信息不存在！";
            }
        }elseif($type == "住房维修"){
            $detail_query="SELECT * FROM repair_service WHERE serviceToken = '$serviceToken'";
            $detail_retrieve = $mysqli->query($detail_query);
            if($detail_retrieve->num_rows > 0) {
                $detail_result = $detail_retrieve->fetch_assoc();
                $services="";
                if ($detail_result['finish']  == 1){
                    $services = "已完成";
                }
                if($detail_result['finish']  == 0){
                    $services = "进行中";
                }
                echo sprintf("<table class=\"table table-hover table-info\">
                        <tr>
                            <td>提交时间</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>服务事项</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>工作人员回复</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>状态</td>
                            <td>%s</td>
                        </tr>
                    </table>
                ", $detail_result['time'], $detail_result['repairNote'], $detail_result['replyNote'], $services);
            }else{
                echo "您要的信息不存在！";
            }
        }elseif($type == "孕产服务"){
            $detail_query="SELECT * FROM housekeeping_service WHERE serviceToken = '$serviceToken'";
            $detail_retrieve = $mysqli->query($detail_query);
            if($detail_retrieve->num_rows > 0) {
                $detail_result = $detail_retrieve->fetch_assoc();
                $services="";
                if ($detail_result['accompany']  == 1){
                    $services .= " 陪产, ";
                }
                if($detail_result['maid']  == 1){
                    $services .= " 月嫂, ";
                }
                echo sprintf("<table class=\"table table-hover table-info\">
                        <tr>
                            <td>时间</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>服务事项</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>备注信息</td>
                            <td>%s</td>
                        </tr>
                    </table>
                ", $detail_result['time'], $services, $detail_result['additionalNote']);
            }else{
                echo "您要的信息不存在！";
            }
        }elseif($type == "接送服务"){
            $detail_query="SELECT * FROM pickup_service WHERE serviceToken = '$serviceToken'";
            $detail_retrieve = $mysqli->query($detail_query);
            if($detail_retrieve->num_rows > 0) {
                $detail_result = $detail_retrieve->fetch_assoc();
                echo sprintf("<table class=\"table table-hover table-info\">
                        <tr>
                            <td>时间</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>出发地</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>目的地</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>人数</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>备注信息</td>
                            <td>%s</td>
                        </tr>
                    </table>
                ", $detail_result['date'] . " " . $detail_result['time'], $detail_result['departure'], $detail_result['destination'], $detail_result['num_ppl'], $detail_result['additional']);
            }else{
                echo "您要的信息不存在！";
            }
        }elseif($type == "接机送机"){
            $detail_query="SELECT * FROM flight_service WHERE serviceToken = '$serviceToken'";
            $detail_retrieve = $mysqli->query($detail_query);
            if($detail_retrieve->num_rows > 0) {
                $detail_result = $detail_retrieve->fetch_assoc();
                echo sprintf("<table class=\"table table-hover table-info\">
                        <tr>
                            <td>时间</td>
                            <td>%s</td>
                        </tr>
                        <tr>
                            <td>预定车数量</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>人数</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>行李数</td>
                            <td>%d</td>
                        </tr>
                        <tr>
                            <td>备注信息</td>
                            <td>%s</td>
                        </tr>
                    </table>
                ", $detail_result['time'], $detail_result['numCars'], $detail_result['num_ppl'], $detail_result['packages'], $detail_result['additionalNote']);
            }else{
                echo "您要的信息不存在！";
            }
        }
    }
}

?>