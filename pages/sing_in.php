<?php   
require_once 'DbConnection.php';
if(isset($_POST['login']))
{
 $uname = $_POST['email'];
 $umail = $_POST['email'];
 $upass = $_POST['password'];
  
 if($user->login($uname,$umail,$upass))
 {
  
 header('location:contacte.php');
 }
 else
 {
  $error = "Wrong Details !";
 } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/my-bootstrap.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <title>login</title>
</head>
<body>
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg navbar-light px-2 fs-5" id="bgnav">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html">
            <img src="../Assets/images/images-removebg-preview.png" alt="logo" width="70px" height="70px"/>
          </a>
          <a class="nav-link active fw-bold d-flex justify-content-end" href="#">Login</a>   
        </div>
      </nav>

    <!-- content -->
    <div class="content container-fluid row d-flex">
        <div class="col-6 d-none d-lg-flex">
          <img src="../Assets/images/Reset password-pana.svg" alt="login">
        </div>
        <div class="col-12 col-md-6 login">

          <form class="bg-white p-3 h-100 h-sm-70 " method="post" >
             <h6 class="text-center fs-3 fw-bold" style="color: #12CE81">SIGN IN</h6>
             <p class="text-center mb-5">Enter your credentials to access your account</p>
             <?php
            if(isset($error))
            {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                  </div>
                  <?php
            }
            ?>
             <div class="mb-2">
              <label for="user" class="form-label text-secondary">Email</label>
              <input type="text" class="form-control" name="email"  placeholder="Enter your E-mail">
            </div>
            <div class="mb-4 mb-sm-2">
              <label for="Password" class="form-label text-secondary"  >Password</label>
              <input type="password" class="form-control" id="Password" name="password"   placeholder="Enter your password">
            </div>  
            <div class="form-check form-switch mb-4 mb-sm-2">
                 <input  name="check" class="form-check-input" type="checkbox" id="ckeck">
                 <label class="form-check-label" for="ckeck">Remember me</label>
            </div>       
            <button type="submit" class="btn text-white w-100" name="login" style="background-color: #12CE81">SIGN IN</button>
            
            <p class="text-center mt-2">No account? <a href="sign-up.php" style="color: #12CE81" >sign up</a> here</p>  
          </form>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <script src="../Assets/js/my-bootstrap.js"></script>
</body>
</html>