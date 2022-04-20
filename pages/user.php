<?php
    class USER{
        private $db;

        function __construct($db_conn){
            $this->db = $db_conn;
        }
         public function register($name,$email,$password){
            try{
               $stmt = $this->db->prepare("INSERT INTO `user`(`name`, `email`, `password`) VALUES ('$name','$email','$password')");
               $stmt->execute();
               return true;
            }
            catch(PDOException $e){
               die ($e->getMessage());
               return false;
            }
         }
            public function login($uname,$umail,$upass)
    {
       try
       {
          $stmt = $this->db->prepare("SELECT * FROM user WHERE name=:uname OR email=:umail LIMIT 1");
          $stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
          $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
          if($stmt->rowCount() > 0)
          {
             if(password_verify($upass, $userRow['password']))
             {
                $_SESSION['user_session'] = $userRow['id'];
                return true;
             }
             else
             {
                return false;
             }
          }
       }
       catch(PDOException $e)
       {
           echo $e->getMessage();
       }
   }
}
          