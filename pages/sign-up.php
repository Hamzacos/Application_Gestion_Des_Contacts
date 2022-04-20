<?php
   include 'DbConnection.php';
   if(isset($_POST['btn-signup'])){
      $name     = $_POST['name'];
      $email    = $_POST['email'];
      $pass     = $_POST['password'];
      $password = password_hash($pass,PASSWORD_BCRYPT);

      if($name=="") {
        $error[] = "provide username !"; 
     }
     else if($email=="") {
        $error[] = "provide email  !"; 
     }
     else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'Please enter a valid email address !';
     }
     else if($pass=="") {
        $error[] = "provide password !";
     }
     else if(strlen($pass) < 6){
        $error[] = "Password must be atleast 6 characters"; 
     }
     else if($user->register($name,$email,$password)){
         header("location:sign-up.php?msz");
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
          <a class="navbar-brand" href="sing_in.php">
            <img src="../Assets/images/images-removebg-preview.png" alt="logo" width="70px" height="70px"/>
          </a>
          <a class="nav-link active fw-bold d-flex justify-content-end" href="#">Login</a>   
        </div>
      </nav>

    <!-- content -->
    <div class="content container-fluid row d-flex">
        <div class="col-6 d-none d-lg-flex">
          <img src="../Assets/images/Mobile login-pana.svg" alt="login">
        </div>
        <div class="col-12 col-md-6 login">
          <form class="bg-white p-3 h-100 h-sm-70" action=""  method="post" >
             <h6 class="text-center fs-3 fw-bold" style="color: #12CE81">SIGN UP</h6>
             <?php
            if(isset($error))
            {
               foreach($error as $error)
               {
                  ?>
                  <div class="alert alert-danger">
                      <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                  </div>
                  <?php } } ?>

             <div class="mb-2">
              <label for="user" class="form-label text-secondary">Username</label>
              <input type="text" class="form-control" name="name" placeholder="Enter Username" value="<?php if(isset($error)){echo $name;}?>">
            </div>
            <div class="mb-4 mb-sm-2">
            <label for="Password" class="form-label text-secondary"  >Enter E-Mail</label>
            <input type="text" class="form-control" name="email" placeholder="Enter E-Mail ID" value="<?php if(isset($error)){echo $email;}?>" />
            </div>
            <div class="mb-4 mb-sm-2">
              <label for="Password" class="form-label text-secondary"  >Password</label>
              <input type="password" class="form-control" id="Password" name="password" placeholder="Enter Password">
            </div>    
            <button type="submit" class="btn text-white w-100" name="btn-signup" style="background-color: #12CE81">SIGN UP</button>
            
            <p class="text-center mt-2">Already have an account? <a href="sing_in.php" style="color: #12CE81">sign in</a> here.</p>  
          </form>

        </div>
    </div>
    







    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
      <script src="Assets/js/my-bootstrap.js"></script>
</body>
</html>