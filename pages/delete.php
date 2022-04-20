<?php
include_once 'DbConnection.php';
if(isset($_POST['btn-del'])){
  $id_contact = $_GET['id_contact'];
 $user_id=$_SESSION['user_session'];
 $crud->delete($id_contact,$user_id);
 header("Location: delete.php?deleted"); 
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Delete</title>
</head>
<body>
     <!-- Navbar -->
          <?php include 'navbar.php'; ?>
      <div class="container mt-3">
      <div class="contact">
            <h2>Delete Contacts lists :</h2>
        </div>
        <?php
                    if(isset($_GET['deleted']))
                    {
                    ?>
                            <div class="alert alert-success">
                        <strong>Success!</strong> record was deleted... 
                    </div>
                            <?php
                    }
                    else
                    {
                    ?>
                            <div class="alert alert-danger">
                        <strong>Sure !</strong> to remove the following record ? 
                    </div>
                            <?php
                    }
        ?> 
        <?php if (isset($_GET['id_contact']))
        {
          ?>
        <table class="table table-hover mt-4">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">E-mail</th>
              <th scope="col">Num-Tele</th>
              <th scope="col">Adress</th>
           </tr>
        </thead>
             <?php
            $sql = 'SELECT * FROM `contacte` WHERE id_contact= :id_contact';
            $query = $db_conn->prepare($sql);
            $query->execute(array(":id_contact"=>$_GET['id_contact']));
            $user = $query->fetchAll(PDO::FETCH_ASSOC);
            ?>
          <tbody>
          <?php 
                  foreach($user as $key => $val):?>
                   <tr>
                  <td><?php  echo $val['username'] ?></td>
                  <td><?php  echo $val['Email'] ?></td>
                  <td><?php  echo $val['numero'] ?></td>
                  <td><?php  echo $val['adress'] ?></td>
                  </tr>
                      
                      <?php endforeach;; ?>
                    </tbody>
                    <?php } ?>
                  </table>
                </div>
                <div class="container">
                            <p>
                            <?php
                            if(isset($_GET['id_contact']))
                            {
                            ?>
                            <form method="post">
                                <input type="hidden" name="id" value="<?= isset( $id_conatct) ?  $id_conatct : "" ?>" />
                                <button class="btn btn-large btn-primary" type="submit" name="btn-del"><i class="glyphicon glyphicon-trash"></i> &nbsp; YES</button>
                                <a href="contacte.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; NO</a>
                                </form>  
                            <?php
                            }else
                            {
                            ?>
                                <a href="contacte.php" class="btn btn-large btn-success"><i class="glyphicon glyphicon-backward"></i> &nbsp; Back to index</a>
                                <?php
                            }
                            ?>
                            </p>
                </div> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>
<script src="../Assets/js/my-bootstrap.js"></script>
</body>
</html>