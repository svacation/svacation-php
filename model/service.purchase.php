<?php if(!defined('In_System')) exit("Access Denied");

class Purchase_Service{
    private $origin_address;
    private $serviceType;
    private $serviceToken;
    private $property;
    private $doujiang;
    private $tiandoujiang;
    private $niunai;
    private $guozhi;
    private $furu;
    private $zhacai;
    private $laoganma;
    private $ganlancai;
    private $xianyadan;
    private $huashengjiang;
    private $caomeijiang;
    private $shengjidan;
    private $maipian;
    private $culiangmianbao;
    private $doushabao;
    private $xiaomantou;
    private $shouzhuabing;
    private $jiaozi;
    private $miantiao;
    private $dami;
    private $xiaomi;
    private $hongdou;
    private $lvdou;
    private $pingguo;
    private $xiangjiao;
    private $chengzi;
    private $guoli;
    private $juzi;
    private $xihongshi;
    private $bocai;
    private $digua;
    private $huanggua;
    private $tudou;
    private $you;
    private $yan;
    private $jiang;
    private $cu;
    private $tang;


	public function __construct() {
        $this->origin_address = isset($_POST['origin_address']) ? $_POST['origin_address'] : null;
        $this->serviceToken = isset($_POST['serviceToken']) ? $_POST['serviceToken'] : null;
        $this->serviceType = isset($_POST['serviceType']) ? $_POST['serviceType'] : null;
        $this->property = isset($_POST['property']) ? $_POST['property'] : null;
		$this->doujiang = isset($_POST['doujiang']) ? $_POST['doujiang'] : null;
		$this->tiandoujiang = isset($_POST['tiandoujiang']) ? $_POST['tiandoujiang'] : null;
        $this->niunai = isset($_POST['niunai']) ? $_POST['niunai'] : null;
        $this->guozhi = isset($_POST['guozhi']) ? $_POST['guozhi'] : null;
        $this->furu = isset($_POST['furu']) ? $_POST['furu'] : null;
        $this->zhacai = isset($_POST['zhacai']) ? $_POST['zhacai'] : null;
        $this->laoganma = isset($_POST['laoganma']) ? $_POST['laoganma'] : null;
        $this->ganlancai = isset($_POST['ganlancai']) ? $_POST['ganlancai'] : null;
        $this->xianyadan = isset($_POST['xianyadan']) ? $_POST['xianyadan'] : null;
        $this->huashengjiang = isset($_POST['huashengjiang']) ? $_POST['huashengjiang'] : null;
        $this->caomeijiang = isset($_POST['caomeijiang']) ? $_POST['caomeijiang'] : null;
        $this->shengjidan = isset($_POST['shengjidan']) ? $_POST['shengjidan'] : null;
        $this->maipian = isset($_POST['maipian']) ? $_POST['maipian'] : null;
        $this->culiangmianbao = isset($_POST['culiangmianbao']) ? $_POST['culiangmianbao'] : null;
        $this->doushabao = isset($_POST['doushabao']) ? $_POST['doushabao'] : null;
        $this->xiaomantou = isset($_POST['xiaomantou']) ? $_POST['xiaomantou'] : null;
        $this->shouzhuabing = isset($_POST['shouzhuabing']) ? $_POST['shouzhuabing'] : null;
        $this->jiaozi = isset($_POST['jiaozi']) ? $_POST['jiaozi'] : null;
        $this->miantiao = isset($_POST['miantiao']) ? $_POST['miantiao'] : null;
        $this->dami = isset($_POST['dami']) ? $_POST['dami'] : null;
        $this->xiaomi = isset($_POST['xiaomi']) ? $_POST['xiaomi'] : null;
        $this->hongdou = isset($_POST['hongdou']) ? $_POST['hongdou'] : null;
        $this->lvdou = isset($_POST['lvdou']) ? $_POST['lvdou'] : null;
        $this->pingguo = isset($_POST['pingguo']) ? $_POST['pingguo'] : null;
        $this->xiangjiao = isset($_POST['xiangjiao']) ? $_POST['xiangjiao'] : null;
        $this->chengzi = isset($_POST['chengzi']) ? $_POST['chengzi'] : null;
        $this->guoli = isset($_POST['guoli']) ? $_POST['guoli'] : null;
        $this->juzi = isset($_POST['juzi']) ? $_POST['juzi'] : null;
        $this->xihongshi = isset($_POST['xihongshi']) ? $_POST['xihongshi'] : null;
        $this->bocai = isset($_POST['bocai']) ? $_POST['bocai'] : null;
        $this->digua = isset($_POST['digua']) ? $_POST['digua'] : null;
        $this->huanggua = isset($_POST['huanggua']) ? $_POST['huanggua'] : null;
        $this->tudou = isset($_POST['tudou']) ? $_POST['tudou'] : null;
        $this->you = isset($_POST['you']) ? $_POST['you'] : null;
        $this->yan = isset($_POST['yan']) ? $_POST['yan'] : null;
        $this->jiang = isset($_POST['jiang']) ? $_POST['jiang'] : null;
        $this->cu = isset($_POST['cu']) ? $_POST['cu'] : null;
        $this->tang = isset($_POST['tang']) ? $_POST['tang'] : null;
	}

	public function Purchase_Service(){
		global $mysqli;

        /* Check if the address is empty */
        if(empty($this->origin_address) || empty($this->property)){
            echo "<script type=\"text/javascript\">alert('缺少地址或者房屋类别!');window.history.back();</script>";
        }

        $user_id = $_COOKIE['uid'];
        $format_time = date("Y-m-d H:i:s");
        $serviceToken = rand(10, 100000);
        if(true){
            $purchase_query="INSERT INTO purchase_service (user, serviceToken, date, property, origin_address, doujiang, tiandoujiang, niunai, guozhi, furu, zhacai, laoganma, ganlancai, xianyadan, huashengjiang, caomeijiang, shengjidan, maipian, culiangmianbao, doushabao, xiaomantou, shouzhuabing, jiaozi, miantiao, dami, xiaomi, hongdou, lvdou, pingguo,
                xiangjiao, chengzi, guoli, juzi, xihongshi, bocai, digua, huanggua, tudou, you, yan, jiang, cu, tang, locker) VALUES ('$user_id', '$serviceToken', '$format_time', '$this->property', '$this->origin_address', '$this->doujiang', '$this->tiandoujiang', '$this->niunai', '$this->guozhi', '$this->furu', '$this->zhacai', '$this->laoganma', '$this->ganlancai',
                '$this->xianyadan', '$this->huashengjiang', '$this->caomeijiang', '$this->shengjidan', '$this->maipian', '$this->culiangmianbao', '$this->doushabao', '$this->xiaomantou', '$this->shouzhuabing', '$this->jiaozi', '$this->miantiao', '$this->dami', '$this->xiaomi', '$this->hongdou', '$this->lvdou', '$this->pingguo', '$this->xiangjiao', '$this->chengzi', 
                '$this->guoli', '$this->juzi', '$this->xihongshi', '$this->bocai', '$this->digua', '$this->huanggua', '$this->tudou', '$this->you', '$this->yan', '$this->jiang', '$this->cu', '$this->tang', 1)";
            if($mysqli->query($purchase_query)){
                echo "<script type=\"text/javascript\">alert('恭喜，您的订单已经下单，查看订单请去历史记录!');window.location.href = 'panel.php' ;</script>";
            }else{
                printf("Registration failure: %s\n", $mysqli->error);
                exit();
            }
    
            $history_query="INSERT INTO history (token, serviceType, user_id, time) VALUES ('$serviceToken', '$this->serviceType', '$user_id', '$format_time')";
            if($mysqli->query($history_query)){
            }else{
                printf("Registration failure: %s\n", $mysqli->error);
                exit();
            }
        }else{
            echo "<script type=\"text/javascript\">alert('您已超出预定时间!请在星期6-下星期4申请. ');window.history.back();</script>";
        }
    }

    public function check_date(){
        $deadLine = strtotime("this Friday");
        $sat_time = strtotime("this Saturday");
        $deadLine_format = date('Y-m-d H:i:s', $deadLine);
        $sat_format = date('Y-m-d H:i:s', $sat_time);

        $d = new DateTime();
        $current = $d->format('Y-m-d H:i:s');
        if ($deadLine_format > $current){
            return true;
        }else{
            if ($sat_format < $current){
                return true;
            }
            return false;
        }
        return false;
    }

    public function purchase_delete(){
        global $mysqli;

        $delete_query = "DELETE FROM purchase_service WHERE serviceToken = '$this->serviceToken'";
        if($mysqli->query($delete_query)){
            echo "<script type=\"text/javascript\">alert('订单已经成功清除!');window.location.href = 'panel.php' ;</script>";
        }else{
            printf("Registration failure: %s\n", $mysqli->error);
            exit();
        }

        $delete_query = "DELETE FROM history WHERE token = '$this->serviceToken'";
        if($mysqli->query($delete_query)){
        
        }else{
            printf("Registration failure: %s\n", $mysqli->error);
            exit();
        }
    }
    
}
?>
