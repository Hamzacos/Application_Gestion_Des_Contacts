<?php
 class CRUD{
     private $db;

     public function __construct($db_conn){
         $this->db=$db_conn;
     }

     public function ADD($username,$email,$numero,$adress,$user_id){
        try{
            $stmt = $this->db->prepare("INSERT INTO contacte(username,email,numero,adress,id) 
            VALUES(:username, :email, :numero, :adress,:user_id)");
            $stmt->bindParam(":username",$username);
            $stmt->bindParam(":email",$email);
            $stmt->bindParam(":numero",$numero);
            $stmt->bindParam(":adress",$adress);
            $stmt->bindParam(":user_id",$user_id);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e){
            echo $e->getMessage(); 
            return false;
        }
     }
     public function getID($id_conatct)
    {
            $stmt = $this->db->prepare("SELECT * FROM contacte WHERE id_contact=:id_contact");
            $stmt->execute(array(":id_contact"=>$id_conatct));
            $editRow=$stmt->fetch(PDO::FETCH_ASSOC);
            return $editRow;
    }

    public function update($id_contact,$id,$username,$Email,$numero,$adress)
 {
  try
  {
   $stmt=$this->db->prepare("UPDATE contacte SET username=:username,Email=:email,numero=:numero,adress=:adress
                             WHERE id_contact= :id_contact AND id = :id");
   $stmt->bindParam(":username",$username);
   $stmt->bindParam(":email",$Email);
   $stmt->bindParam(":numero",$numero);
   $stmt->bindParam(":adress",$adress);
   $stmt->bindParam(":id_contact",$id_contact);
   $stmt->bindParam(":id",$id);
   $stmt->execute();
   return true; 
  }
  catch(PDOException $e)
  {
   echo $e->getMessage(); 
   return false;
  }
 }

 public function delete($id_contact,$id)
 {
  $stmt = $this->db->prepare("DELETE FROM contacte WHERE id_contact= :id_contact AND id = :id");
  $stmt->bindParam(":id_contact",$id_contact);
  $stmt->bindParam(":id",$id);
  $stmt->execute();
  return true;
 }
 
}
?>