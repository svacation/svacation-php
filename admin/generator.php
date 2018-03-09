<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>领婴后台管理</title>
  <!-- Bootstrap core CSS-->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Password Token Generator</div>
        <div class="card-body">
            <form method="POST">
            <div class="form-group">
                <label for="token">Token</label>
                <input type="text" class="form-control" name="token" placeholder="Token">
            </div>
            <button type="submit" class="btn btn-info"> generate </button>
            </form>
        </div>
    </div>
  </div>

    <?php 
        if(isset($_POST['token'])){
            $receive = $_POST['token'];
            $adminToken = hash('sha256', $receive); 
            echo "
            <br/>
            <div style=\"color:white;text-align:center;\">
                $adminToken
            </div>";
        }
    ?>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
