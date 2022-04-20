
<?php
require_once('DbConnection.php');
$sql = 'SELECT * FROM `contacte` WHERE id=:id';
$query = $db_conn->prepare($sql);
$query->execute( array(":id"=>$_SESSION['user_session']));
$user = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Assets/css/my-bootstrap.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Accueil</title>
    
    <!---->
   </head>
<body>
    <!-- Navbar -->
          <?php include 'navbar.php'; ?>
    <!-- content -->
    <div class="container mt-3">
        <div class="contact">
            <h2>Contacts lists :</h2>
            <button type="button" class="plus text-success" data-bs-toggle="modal"  data-bs-target="#ADD"><i class="fas fa-plus "></i></button>
        </div>
       
        <table class="table table-hover mt-4">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">E-mail</th>
              <th scope="col">Num-Tele</th>
              <th scope="col">Adress</th>
           </tr>
        </thead>
          <tbody>
          <?php 
                  foreach($user as $key => $val):?>
                   <tr>
                  <td><?php  echo $val['username'] ?></td>
                  <td><?php  echo $val['Email'] ?></td>
                  <td><?php  echo $val['numero'] ?></td>
                  <td><?php  echo $val['adress'] ?></td>
                  <td><a href="update.php?id_contact=<?php echo $val['id_contact'] ; ?>"><input type="submit" class="btn btn-success showmodal" value="Update"></a>
                      <a href="delete.php?id_contact=<?php echo $val['id_contact'] ; ?>"><input type="button" class="btn btn-danger" value="Delete"></a>
                      </td></tr>
                      
                      <?php endforeach;; ?>
                    </tbody>
                  </table>
                </div>
                <?php require_once 'modalAdd.php'; ?>
    
    
   
   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
    <script src="../Assets/js/my-bootstrap.js"></script>
    <script src="../Assets/js/modallAdd.js"></script>
</body>
</html>