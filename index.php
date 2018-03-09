<?php DEFINE('Template_Call', TRUE); 

    include_once "./component/header.php"
?>

<body class="bg-dark">

    <!-- Logo and Navigation to login-->
    <div style="margin-top:50px;padding-right:5%;padding-left:5%;">
        <h2 class="color-white" style="display:inline;">领婴海外孕产</h2>
        <?php if (!isset($_COOKIE["islogin"])){?>
            <div style="float:right;">
                <a style="padding-right:10px;font-size:180%;padding-bottom:10px;color:#007bff;cursor: pointer;" data-toggle="modal" data-target="#loginModal">登录</a>
                <a style="font-size:180%;padding-bottom:10px;color:#007bff;cursor: pointer;" data-toggle="modal" data-target="#signupModal">注册</a>
            </div> 
        <?php }else{ ?>
            <div style="float:right; margin-right:20px; color:white;">
                <form action="./form_function.php" method="post">
                    <button class="btn" style="color:#007bff;cursor: pointer;" type="submit" name="logout">登出</button>
                </form>
            </div> 
        <?php }?>
    </div>    

    <div class="container" style="margin-top:50px;">   
        <!-- Columns are always 50% wide, on mobile and desktop-->
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-address-card"></i>
                    </div>
                    <div class="mr-5">个人信息</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="./profile.php">
                    <span class="float-left">点击查看</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-shopping-cart"></i>
                    </div>
                    <div class="mr-5">申请服务</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="./panel.php">
                    <span class="float-left">点击查看</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5">服务记录</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="./history.php">
                    <span class="float-left">点击查看</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-book"></i>
                    </div>
                    <div class="mr-5">注意事项</div>
                    </div>
                    <a class="card-footer text-white clearfix small z-1" href="./contact.php">
                    <span class="float-left">点击查看</span>
                    <span class="float-right">
                        <i class="fa fa-angle-right"></i>
                    </span>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper-->
    </div>
    <br/><br/>
    <!-- /.content-wrapper-->
    <footer class="footer" style="color:white;">
        <div class="container">
        <div class="text-center">
            <small>Copyright © 领婴海外孕产 2018</small>
        </div>
        </div>
    </footer>

    <!--Sign in Modal-->
    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">欢迎注册</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          <form action="./form_function.php" method="post">
            <input type="hidden" name="currentpage" value="<?php echo basename($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label for="exampleInputEmail1">用户名(真实姓名)</label>
                <input type="text" class="form-control" name="username" placeholder="用户名">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">电话(加拿大电话，可以先留国内电话再更新)</label>
                <input type="text" class="form-control" name="phone" placeholder="电话">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">密码</label>        
                <div style="display:flex">    
                    <input type="password" class="form-control" id="password_register" name="password" placeholder="密码" style="display:inline-block"> 
                    <button onclick="show_hide_pw()" class="btn btn-primary" type= "button">显示/隐藏</button> 
                </div>                   
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">微信</label>
                <input type="text" class="form-control" name="weChat" placeholder="微信">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">预产期</label>
                <input type="date" class="form-control" name="timeDeliver">
            </div>
            </div>
            <p><span style="font-size:14px;padding-left:4%;color:red;">*我们将会确保您的信息安全，并且请您耐心等管理员激活您的账户.</span></p>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">取消</button>
                <button type="submit" class="btn btn-primary" name="register">创建账号</button>
            </div>
        </form>
        </div>
      </div>
    </div>

    <!--login Modal-->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="ModalLabel">欢迎登录</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
          <form action="./form_function.php" method="post">
            <input type="hidden" name="currentpage" value="<?php echo basename($_SERVER['PHP_SELF']); ?>">
            <div class="form-group">
                <label for="exampleInputEmail">用户名</label>
                <input type="text" class="form-control" name="username" placeholder="用户名">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword">密码</label>
                <input type="password" class="form-control" name="password" placeholder="密码">
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">取消</button>
                <button type="submit" class="btn btn-primary" name="login">登录账号</button>
            </div>
        </form>
        </div>
      </div>
    </div>

    <script>
        function show_hide_pw() {
            var pw_type = document.getElementById("password_register");
            pw_type.type=="password" ? pw_type.type="text":pw_type.type="password";
        }
    </script>


    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="/vendor/datatables/jquery.dataTables.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="/js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>

