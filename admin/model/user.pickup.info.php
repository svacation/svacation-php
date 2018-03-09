<?php if(!defined('In_System')) exit("Access Denied");

class UserPickupInfo{
    private $salt;

    private $username;
    private $phone;
    private $address;


    public function __construct() {
        $this->salt = isset($_POST['salt']) ? $_POST['salt'] : null;
        $this->username = isset($_POST['username']) ? $_POST['username'] : null;
		$this->phone = isset($_POST['phone']) ? $_POST['phone'] : null;
        $this->address = isset($_POST['address']) ? $_POST['address'] : null;
    }
    
    public function generateTable(){
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
                                <td><a href=\"./map/lookupAddr.php?address=%s\">%s</td> 
                            </tr> 
                            </form>
                ", $result['salt'], $result['uid'], $result['username'], $result['phone'], $result['phone'], $result['address'], $result['address']);
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
}   
?>