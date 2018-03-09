<?php DEFINE('Template_Call', TRUE); 

    include_once "./component/header.php";
    include_once "./model/common.php";
    include_once "./model/member.func.php";
    include_once "./model/check.activate.php";
    
    //Check if the user is login
    if (!isset($_COOKIE['islogin'])) {
        echo "<script type=\"text/javascript\">alert('您需要登录才能查看！');window.location.replace(\"./\");</script>";
    }

    $checked_activate = new Check_Activate;
    $checked_activate -> check_activate();
?>
<style>
/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    
    <?php 
        include_once "./component/sideNav.php"; 
        include_once "./model/user.info.php";

        $profiles = new Profile();
        $profiles->checkLocker(); 
    ?>

    <div class="content-wrapper">
        <div class="container">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="panel.php">申请其他服务</a>
            </li>
            <li class="breadcrumb-item active">服务页面</li>
        </ol>
        <br/>
        <div style="padding-left:20px;padding-right:20px;">
            <h2><b>采购服务申请</b></h2>
            <br/>
            <p><b>备注： 公司每周5将进行一次采购，会将您这周申请的购买的食材在送餐的同时送至您的府上。</b></p>
            <br/>
            <p>请选择您的住宿类型：</p>
                <button class="tablinks btn btn-info" onclick="openType(event, 'house')">别墅</button>
                <button class="tablinks btn btn-info" onclick="openType(event, 'apt')">公寓</button>
            

            <div id="house" class="tabcontent" style="width:100%;border-top:1px solid #ccc;">
                <form action="./service_function.php" method="post">
                    <input type="hidden" name="property" value="house">
                    <input type="hidden" name="serviceType" value="采购服务">
                    <?php 
                        include_once "./model/common.php";
                        include_once "./model/user.info.php";

                        $profiles = new Profile(); 
                        $profiles->generateAddress();
                    ?>
                    <div class="container">
                        <br/>
                        <h4>饮品：</h4>
                        <!-- Row One -->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">豆浆(甜)</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="doujiang" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">豆浆(原味)</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="tiandoujiang" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">牛奶</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="niunai" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <!-- Row Two -->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">果汁</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="guozhi" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1 桶</option>
                                                <option value= 2 >2 桶</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4">
                               
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                        </div>
                        <br/>
                        <h4>小菜：</h4>
                        <!-- Row Three-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">腐乳</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="furu" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">榨菜</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="zhacai" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">老干妈</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="laoganma" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>

                        <!-- Row Four-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">橄榄菜</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="ganlancai" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">咸鸭蛋</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="xianyadan" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 6 >6</option>
                                                <option value= 12 >12</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">花生酱</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="huashengjiang" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>

                        <!-- Row Five-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">草莓酱</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="caomeijiang" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">生鸡蛋</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="shengjidan" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 12 >12</option>
                                                <option value= 24 >24</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                
                            </div>
                        </div>
                        <br/>
                        <h4>主食(袋)：</h4>
                        <!-- Row Six-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">麦片</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="maipian" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">粗粮面包</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="culiangmianbao" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">豆沙包</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="doushabao" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>

                        <!-- Row Seven-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">小馒头</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="xiaomantou" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">手抓饼</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="shouzhuabing" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">饺子</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="jiaozi" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>

                        <!-- Row eight-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">面条</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="miantiao" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">大米</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="dami" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">小米</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="xiaomi" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>


                        <!-- Row nine-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">红豆</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="hongdou" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">绿豆</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="lvdou" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                        </div>
                        <br/>
                        <h4>水果：</h4>
                        <!-- Row Ten-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">苹果</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="pingguo" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">香蕉</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="xiangjiao" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">橙子</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="chengzi" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        
                        <!-- Row 11-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">果梨</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="guoli" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">橘子</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="juzi" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                        </div>
                        <br/>
                        <h4>蔬菜：</h4>
                        <!-- Row 12-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">西红柿</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="xihongshi" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">菠菜</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="bocai" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">地瓜</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="digua" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>

                        <!-- Row 13-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">黄瓜</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="huanggua" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">土豆</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="tudou" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4">
                        
                            </div>
                        </div>
                        <br/>
                        <h4>配料：</h4>
                        <!-- Row 14-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">油</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="you" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">盐</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="yan" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">酱</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="jiang" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>

                        <!-- Row 15-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">醋</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="cu" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">糖</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="tang" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                        </div>

                        <br/>
                        <button type="submit" class="btn btn-primary" style="margin-bottom:20px;" name="purchase_service">提交申请</button>
                    </div>
                    
                </form>
            </div>

            <div id="apt" class="tabcontent" style="width:100%;border-top:1px solid #ccc;">
                <form action="./service_function.php" method="post">
                    <input type="hidden" name="property" value="apartment">
                    <input type="hidden" name="serviceType" value="采购服务">
                    <?php 
                        include_once "./model/common.php";
                        include_once "./model/user.info.php";

                        $profiles = new Profile(); 
                        $profiles->generateAddress();
                    ?>
                    <div class="container">
                        <br/>
                        <h4>饮品：</h4>
                        <!-- Row One -->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">豆浆(甜)</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="tiandoujiang" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">豆浆(原味)</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="doujiang" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">牛奶</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="niunai" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        <!-- Row Two -->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">果汁</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="guozhi" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1 桶</option>
                                                <option value= 2 >2 桶</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4">
                            
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                        </div>
                        <br/>
                        <h4>小菜：</h4>
                        <!-- Row Three-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">腐乳</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="furu" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">榨菜</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="zhacai" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">老干妈</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="laoganma" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>

                        <!-- Row Four-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">橄榄菜</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="ganlancai" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">咸鸭蛋</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="xianyadan" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 6 >6</option>
                                                <option value= 12 >12</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">花生酱</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="huashengjiang" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>

                        <!-- Row Five-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">草莓酱</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="caomeijiang" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">生鸡蛋</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="shengjidan" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 12 >12</option>
                                                <option value= 24 >24</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                
                            </div>
                        </div>
                        <br/>
                        <h4>主食(袋)：</h4>
                        <!-- Row Six-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">麦片</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="maipian" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">粗粮面包</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="culiangmianbao" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">豆沙包</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="doushabao" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>

                        <!-- Row Seven-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">小馒头</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="xiaomantou" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">手抓饼</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="shouzhuabing" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">饺子</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="jiaozi" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>

                        <!-- Row eight-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">面条</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="miantiao" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">大米</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="dami" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">小米</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="xiaomi" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>


                        <!-- Row nine-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">红豆</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="hongdou" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">绿豆</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="lvdou" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                                <option value= 2 >2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                        </div>
                        <br/>
                        <h4>水果：</h4>
                        <!-- Row Ten-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">苹果</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="pingguo" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">香蕉</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="xiangjiao" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">橙子</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="chengzi" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                        
                        <!-- Row 11-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">果梨</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="guoli" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">橘子</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="juzi" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                        </div>
                        <br/>
                        <h4>蔬菜：</h4>
                        <!-- Row 12-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">西红柿</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="xihongshi" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">菠菜</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="bocai" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">地瓜</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="digua" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>

                        <!-- Row 13-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">黄瓜</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="huanggua" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">土豆</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="tudou" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 5 >5</option>
                                                <option value= 10 >10</option>
                                                <option value= 15 >15</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4">
                        
                            </div>
                        </div>
                        <br/>
                        <h4>配料：</h4>
                        <!-- Row 14-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">油</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="you" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">盐</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="yan" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">酱</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control"  name="jiang" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>

                        <!-- Row 15-->
                        <div class="row">
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">醋</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="cu" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4" style="padding-top:20px;">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">糖</h5>
                                        <div style="display:inline">
                                            <p style="display:inline">数量：</p>
                                            <select class="form-control" name="tang" style="display:inline;width:60%;">
                                                <option value= 0 >0</option>
                                                <option value= 1 >1</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                        </div>
                        <br/>
                        <button type="submit" class="btn btn-primary" style="margin-bottom:20px;" name="purchase_service">提交申请</button>
                    </div>  
                </form>
            </div>
            <br/>
        </div>
        </div>

        <script>
        function openType(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        </script>
        <!-- /.container-fluid-->
        <?php include_once "./component/footer.php"; ?>
        
    </div>
</body>
</html>
