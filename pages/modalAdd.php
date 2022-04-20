<?php
include_once 'DbConnection.php';
if(isset($_POST['insert']))
{  
    $username = $_POST['name'];
    $email = $_POST['email'];
    $numero = $_POST['num'];
    $adress = $_POST['adresse'];
    $user_id=$_SESSION['user_session'];

 $crud->ADD($username,$email,$numero,$adress, $user_id);
}

?>

<!-- Modal -->
<div class="modal" id="ADD">
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
   <div class="modal-body">
      <form method="POST" enctype="multipart/form-data" action="" name="myform" onsubmit="return validateform()">
            <fieldset> 
                 <div class="form-group">
                   <label for="nom">Entrez votre nom</label>
                   <input type="text" class="form-control"  placeholder="Votre Nom" name="name" id="Fname">
                   <label id="nom" style="display:none">Merci de verfier le champs du nom</label>
                 </div>
                 
                 <div class="form-group" id="erreur-email">
                   <label for="email">Entrez votre mail</label>
                   <input type="email" class="form-control"  placeholder="user@email.com" name="email" id="email">
                   <label id="mail" style="display:none">Merci de verfier le mail</label>
                 </div>
                 <div class="form-group" id="erreur-Phone">
                   <label for="num">Entrez votre phone </label>
                   <input type="text" class="form-control"  placeholder="06XXXXXX" name="num" id="phone">
                   <label id="phone" style="display:none">Merci de verfier votre Numero de Telephone</label>
                 </div>
                 <div class="form-group" id="erreur-adresse">
                   <label for="number">Entrez votre adresse </label>
                   <input type="text" class="form-control"  placeholder="votre Adresse" name="adresse" id="adresse">
                   <label id="adressse" style="display:none">Merci de verfier Votre Adresse</label>
                 </div>
                 <div class="modal-footer">
               <button type="button" class="btn btn-secondary hideModel" data-dismiss="modal">Close</button>
               <input type="submit" name="insert" class="btn btn-primary" value="Insérer">
                 </div>
             </fieldset>
       </form>
    </div>
    </div>
  </div>
</div>
<!-- END Modal -->
<!-- Modal -->
 