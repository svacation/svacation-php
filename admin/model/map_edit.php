<?php if(!defined('In_System')) exit("Access Denied");

class MapEdit{
    private $aid;
    private $address;
    private $type;
    private $lat;
    private $lng;
    private $update_at;

    public function __construct() {
        $this->aid = isset($_POST['aid']) ? $_POST['aid'] : null;
        $this->address = isset($_POST['address']) ? $_POST['address'] : null;
        $this->type = isset($_POST['type']) ? $_POST['type'] : null;
        $this->lat = isset($_POST['lat']) ? $_POST['lat'] : null;
        $this->lng = isset($_POST['lng']) ? $_POST['lng'] : null;
        $this->update_at = isset($_POST['update_at']) ? $_POST['update_at'] : null;
    }
    
    public function mapEdit(){
        GLOBAL $mysqli;

        $map_query = "SELECT * FROM address";
        $results = mysqli_fetch_all($mysqli->query($map_query), MYSQLI_ASSOC);
		if(sizeof($results) > 0){
            echo sprintf(" 
            <div class=\"table-responsive\">
                <table class=\"table table-bordered\">
                <thead> 
                    <tr> 
                        <th>addressID</th>  
                        <th>地址</th>
                        <th>类别</th> 
                        <th>纬度</th> 
                        <th>经度</th> 
                        <th>删掉</th>
                    </tr> 
                </thead> 
                <tbody> 
            ");
            foreach( $results as $result){
                echo sprintf(" 
                            <form action=\"../map/edit.php\" method=\"post\">
                            <tr>
                            <th scope=row><input type=\"hidden\" name= \"aid\" value= %d>%d</th>
                                <td>%s</td> 
                                <td>%s</td> 
                                <td>%s</td> 
                                <td>%s</td> 
                                <td><button tyle=\"submit\" class=\"btn btn-info\" name=\"deleteAddress\">删除</button></td> 
                            </tr> 
                            </form>
                ", $result['aid'],$result['aid'], $result['address'],  $result['type'], $result['lat'], $result['lng']);
            }
            echo "<form action=\"../map/edit.php\" method=\"post\">
                  <tr>
                    <th>

                    </th> 
                    <th>
                        <div class=\"form-group\">
                            <input tyle=\"text\" name=\"address\" placeholder='地址'>
                        </div>
                    </th>
                    <th>
                        <div class=\"form-group\">
                            <select name=\"type\">
                                <option value=\"apt\">apt</option>
                                <option value=\"house\">house</option>
                            </select>
                        </div>
                    </th>
                    <th>
                        <div class=\"form-group\">
                            <input tyle=\"text\" name=\"lat\" placeholder='纬度'>
                        </div>
                    </th>
                    <th>
                        <div class=\"form-group\">
                            <input tyle=\"text\" name=\"lng\" placeholder='经度'>
                        </div>
                    </th>
                    <td><button tyle=\"submit\" class=\"btn btn-info\" name=\"addNewAddress\">添加</button></td>
                </tr> 
                </form>";
            echo sprintf(" 
                    </tbody> 
                    </table>
                </div>");
		}else{
			echo sprintf(" 
            <div class=\"table-responsive\">
                <table class=\"table table-bordered\">
                    <thead> 
                        <tr> 
                            <th>addressID</th>  
                            <th>地址</th>
                            <th>类别</th> 
                            <th>纬度</th> 
                            <th>经度</th> 
                            <th>删掉</th>
                        </tr> 
                    </thead>  
                </table>
            </div>");
		}
    }

    public function addNewAddress(){
        $current = new DateTime('today');
        $current = $current->format('Y-m-d');
        GLOBAL $mysqli;
        if ($this->address==null || $this->lat==null || $this->lng==null) {
            echo "<script type=\"text/javascript\">alert('添加地址的所有选项不能为空! ');window.history.back();</script>"; 
            return;
        }
        $map_query = "INSERT INTO address (address, type, lat, lng, update_at) VALUES ('$this->address', '$this->type', '$this->lat', '$this->lng','$current')";
        if($mysqli->query($map_query)){
            echo "<script type=\"text/javascript\">alert('添加地址成功!');window.history.back();</script>";
        }else{
            printf("添加地址失败！ %s\n", $mysqli->error);
            exit();
        }
    }

    public function deleteAddress(){
        GLOBAL $mysqli;
        /* Delete DB if the user change or junk*/
        $Delete_query = "DELETE FROM address WHERE aid = '$this->aid' ";
        if($mysqli->query($Delete_query)){
            echo "<script type=\"text/javascript\">alert('您已成功删除地址！');window.history.back();</script>";
        }else{
            printf("删除地址失败: %s\n", $mysqli->error);
            exit();
        }

    }
}   
?>