<?php if(!defined('In_System')) exit("Access Denied");

class User_Permission{
    private $salt;

    private $username;
    private $phone;
    private $email;
    private $password;
    private $weChat;
    private $timeDeliver;
    private $address;
    private $special_medical;
    private $pickup;
    private $pickupTotal;
    private $medicals;
    private $medicalsTotal;
    private $flight;
    private $isActive;

    public function __construct() {
        $this->salt = isset($_POST['salt']) ? $_POST['salt'] : null;
        $this->username = isset($_POST['username']) ? $_POST['username'] : null;
		$this->phone = isset($_POST['phone']) ? $_POST['phone'] : null;
		$this->email = isset($_POST['email']) ? $_POST['email'] : null;
		$this->password = isset($_POST['password']) ? $_POST['password'] : null;
		$this->weChat = isset($_POST['weChat']) ? $_POST['weChat'] : null;
		$this->timeDeliver = isset($_POST['timeDeliver']) ? $_POST['timeDeliver'] : null;
        $this->address = isset($_POST['address']) ? $_POST['address'] : null;
        $this->special_medical = isset($_POST['special_medical']) ? $_POST['special_medical'] : null;
        $this->pickup = isset($_POST['pickup']) ? $_POST['pickup'] : null;
        $this->pickupTotal = isset($_POST['pickupTotal']) ? $_POST['pickupTotal'] : null;
        $this->medicals = isset($_POST['medicals']) ? $_POST['medicals'] : null;
        $this->medicalsTotal = isset($_POST['medicalsTotal']) ? $_POST['medicalsTotal'] : null;
        $this->flight = isset($_POST['flight']) ? $_POST['flight'] : null;
        $this->isActive = isset($_POST['isActive']) ? $_POST['isActive'] : null;
    }
    
    public function generatePermission(){
        GLOBAL $mysqli;

        $profile_query = "SELECT * FROM users";
        $results = mysqli_fetch_all($mysqli->query($profile_query), MYSQLI_ASSOC);
		if(sizeof($results) > 0){
            echo sprintf(" 
            <div class=\"table-responsive\">
                <table class=\"table table-bordered\">
                <thead> 
                    <tr> 
                        <th>#</th> 
                        <th>姓名</th> 
                        <th>电话</th> 
                        <th>地址</th>
                        <th>预产期</th> 
                        <th>Email</th> 
                        <th>微信</th> 
                        <th>专科医生</th>
                        <th>专科医生总数</th>
                        <th>接送机数</th>
                        <th>接送机总数</th>
                        <th>剩余出行</th> 
                        <th>出行总数</th>
                        <th>剩余医疗</th> 
                        <th>医疗总数</th>
                        <th>激活</th>
                        <th>修改</th>
                    </tr> 
                </thead> 
                <tbody> 
            ");
            foreach( $results as $result){
                echo sprintf(" 
                            <form action=\"./user_permission_detail.php\" method=\"post\">
                            <tr>
                                <th scope=row><input type=\"hidden\" name= \"salt\" value= %s>%d</th> 
                                <td>%s</td> 
                                <td><a href=\"tel:%d\">%d</a></td> 
                                <td>%s</td> 
                                <td>%s</td> 
                                <td>%s</td> 
                                <td>%s</td> 
                                <td>%s</td> 
                                <td>%s</td>
                                <td>%d</td> 
                                <td>%d</td>
                                <td>%d</td> 
                                <td>%d</td> 
                                <td>%d</td> 
                                <td>%d</td> 
                                <td>%d</td> 
                                <td><button tyle=\"submit\" class=\"btn btn-info\" name=\"user_modify\">修改</button></td> 
                            </tr> 
                            </form>
                ", $result['salt'], $result['uid'], $result['username'], $result['phone'], $result['phone'], $result['address'], $result['timeDeliver'], $result['email'], $result['weChat'], $result['special_medical'], $result['special_medicalTotal'], $result['flight'], $result['flightTotal'], $result['pickup'], $result['pickupTotal'], $result['medicals'], $result['medicalsTotal'], $result['isActive']);
            }
            echo sprintf(" 
                    </tbody> 
                    </table>
                </div>");
			return 1;
		}else{
			return 0;
		}
        $results->free();
    }

    public function user_modify(){
        GLOBAL $mysqli;

        $profile_query = "SELECT * FROM users WHERE salt = '$this->salt'";
		$profile_exist = $mysqli->query($profile_query);
		if($profile_exist->num_rows > 0){
            $profile_retrieve = $profile_exist->fetch_assoc();
            echo sprintf("<form action=\"./admin_function.php\" method=\"post\">
                        <input type=\"hidden\" name=\"salt\" value=%s>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">用户名: </label>
                        <label>%s</label>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">电话: </label>
                        <input tyle=\"text\" name=\"phone\" value=%d>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">email: </label>
                        <input tyle=\"text\" name=\"email\" value=%s>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">微信: </label>
                        <input tyle=\"text\" name=\"weChat\" value=%s>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">预产期: </label>
                        <input tyle=\"text\" name=\"timeDeliver\" value=%s>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\" for=\"exampleInputEmail\">地址: </label>
                        <select name=\"address\">
                            <option value=\"%s\">%s(selected)</option>
                            <option value=\"RIVA 517-7008 River Rd\">RIVA 517-7008 River Rd</option>
                            <option value=\"Mandarin 767-6288 No.3 Rd\">Mandarin 767-6288 No.3 Rd</option>
                            <option value=\"Ora 1003-6200 River Rd\">Ora 1003-6200 River Rd</option>
                            <option value=\"Ora 602-6200 River Rd\">Ora 602-6200 River Rd</option>
                            <option value=\"Ora 910-6200 River Rd\">Ora 910-6200 River Rd</option>
                            <option value=\"Ora 603-6971 River Rd\">Ora 603-6971 River Rd</option>
                            <option value=\"Ora 305-6971 Hollybridge Way\">Ora 305-6971 Hollybridge Way</option>
                            <option value=\"Ora 603-6971 Hollybridge Way\">Ora 603-6971 Hollybridge Way</option>
                            <option value=\"Ora 1502-6971 Hollybridge Way\">Ora 1502-6971 Hollybridge Way</option>
                            <option value=\"Ora 1503-6971 Hollybridge Way\">Ora 1503-6971 Hollybridge Way</option>
                            <option value=\"Ora 703-6971 Hollybridge Way\">Ora 703-6971 Hollybridge Way</option>
                            <option value=\"Ora 702-6951 Hollybridge Way\">Ora 702-6951 Hollybridge Way</option>
                            <option value=\"Ora 703-6951 Hollybridge Way\">Ora 703-6951 Hollybridge Way</option>
                            <option value=\"Ora 506-6951 Hollybridge Way\">Ora 506-6951 Hollybridge Way</option>
                            <option value=\"Ora 1103-6951 Hollybridge Way\">Ora 1103-6951 Hollybridge Way</option>
                            <option value=\"Ora 507-6951 Hollybridge Way\">Ora 507-6951 Hollybridge Way</option>
                            <option value=\"Ora 1202-6951 Hollybridge Way\">Ora 1202-6951 Hollybridge Way</option>
                            <option value=\"Ora 5007-5511 Hollybridge Way\">Ora 5007-5511 Hollybridge Way</option>
                            <option value=\"River Pard 1310-5233 Gilbert Rd\">River Pard 1310-5233 Gilbert Rd</option>
                            <option value=\"Quintet 1003-7788 Ackroyd Rd\">Quintet 1003-7788 Ackroyd Rd</option>
                            <option value=\"Quintet 1201-7788 Ackroyd Rd\">Quintet 1201-7788 Ackroyd Rd</option>
                            <option value=\"Quintet 1501-7788 Ackroyd Rd\">Quintet 1501-7788 Ackroyd Rd</option>
                            <option value=\"Quintet 311-7988 Ackroyd Rd\">Quintet 311-7988 Ackroyd Rd</option>
                            <option value=\"Quintet 712-7988 Ackroyd Rd\">Quintet 712-7988 Ackroyd Rd</option>
                            <option value=\"Quintet 719-7988 Ackroyd Rd\">Quintet 719-7988 Ackroyd Rd</option>
                            <option value=\"Quintet 1215-7988 Ackroyd Rd\">Quintet 1215-7988 Ackroyd Rd</option>
                            <option value=\"Cadence 810-7468 Lansdowne Rd\">Cadence 810-7468 Lansdowne Rd</option>
                            <option value=\"Cadence 1002-7488 Lansdowne Rd\">Cadence 1002-7488 Lansdowne Rd</option>
                            <option value=\"9320 Gormond Rd Richmond V7E1N5\">9320 Gormond Rd Richmond V7E1N5</option>
                            <option value=\"3400 Raymond Ave Richmond V7E1A9\">3400 Raymond Ave Richmond V7E1A9</option>
                            <option value=\"3331 Bourmond Ave Richmond V7E1A1\">3331 Bourmond Ave Richmond V7E1A1</option>
                            <option value=\"5620 Lancing Rd Richmond V7C3A6\">5620 Lancing Rd Richmond V7C3A6</option>
                        </select>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\">专科医生: </label>
                        <input tyle=\"text\" name=\"special_medical\" value=%d>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\">专科总数: </label>
                        <label>%d</label>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\">接送机数: </label>
                        <input tyle=\"text\" name=\"flight\" value=%d>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:100px;\">接送机总数: </label>
                        <label>%d</label>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\">剩余出行: </label>
                        <input tyle=\"text\" name=\"pickup\" value=%d>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\">出行总数: </label>
                        <label>%d</label>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\">剩余医疗: </label>
                        <input tyle=\"text\" name=\"medicals\" value=%d>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\">医疗总数: </label>
                        <label>%d</label>
                        </div>
                        <div class=\"form-group\">
                        <label style=\"width:80px;\">激活: </label>
                        <select name=\"isActive\">
                        <option value = 1>是</option>
                        <option value = 0>否</option>
                        </select>
                        </div>
                        <br/>
                        <button type=\"submit\" class=\"btn btn-primary\" name=\"update_user\">确认修改</button>
                        <button type=\"submit\" class=\"btn btn-danger\" name=\"delete_user\">删除用户</button>
                </form><br/>", $profile_retrieve['salt'], $profile_retrieve['username'], $profile_retrieve['phone'], $profile_retrieve['email'], $profile_retrieve['weChat'], $profile_retrieve['timeDeliver'], $profile_retrieve['address'], $profile_retrieve['address'], $profile_retrieve['special_medical'], $profile_retrieve['special_medicalTotal'], $profile_retrieve['flight'], $profile_retrieve['flightTotal'], $profile_retrieve['pickup'], $profile_retrieve['pickupTotal'], $profile_retrieve['medicals'], $profile_retrieve['medicalsTotal'], $profile_retrieve['isActive']);
            /*cookies expire in 7 days*/
			return 1;
		}else{
			return 0;
		}
        $profile_exist->free();
    }

    public function update_user(){
        GLOBAL $mysqli;

        $origin_query = "SELECT * FROM users WHERE salt = '$this->salt' ";
        $origin_query_exist = $mysqli->query($origin_query);
		if($origin_query_exist->num_rows > 0){
            $origin_value = $origin_query_exist->fetch_assoc();
            $specialMedicalDiff = $this->special_medical - $origin_value['special_medical'];
            $FlightDiff = $this->flight - $origin_value['flight'];
            $PickupDiff = $this->pickup - $origin_value['pickup'];
            $MedicalDiff = $this->medicals - $origin_value['medicals'];

            // Pre calculated value before insert into the database. 
            $total_special_medical = $origin_value['special_medicalTotal'] + $specialMedicalDiff;
            $total_flight = $origin_value['flightTotal'] + $FlightDiff;
            $total_pickup = $origin_value['pickupTotal'] + $PickupDiff;
            $total_medical = $origin_value['medicalsTotal'] + $MedicalDiff;
        }else{
            printf("Registration failure: %s\n", $mysqli->error);
            exit();
        }

        /* UPdate DB if the user change the user info data */
        $update_query = "UPDATE users SET phone='$this->phone', email='$this->email', weChat='$this->weChat', timeDeliver='$this->timeDeliver', address='$this->address', special_medical='$this->special_medical', special_medicalTotal='$total_special_medical', flight ='$this->flight', flightTotal='$total_flight', pickup ='$this->pickup', pickupTotal ='$total_pickup', medicals='$this->medicals', medicalsTotal ='$total_medical', isActive='$this->isActive' WHERE salt = '$this->salt' ";
        if($mysqli->query($update_query)){
            echo "<script type=\"text/javascript\">alert('您已成功修改信息！');window.location.replace('/admin/user_permission.php');</script>";
        }else{
            printf("Registration failure: %s\n", $mysqli->error);
            exit();
        }

    }

    public function delete_user(){
        GLOBAL $mysqli;
        
        /* Delete DB if the user change or junk*/
        $Delete_query = "DELETE FROM users WHERE salt = '$this->salt' ";
        if($mysqli->query($Delete_query)){
            echo "<script type=\"text/javascript\">alert('您已成功修改信息！');window.location.replace('/admin/user_permission.php');</script>";
        }else{
            printf("Registration failure: %s\n", $mysqli->error);
            exit();
        }

    }
}   
?>