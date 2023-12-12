<?php
$name= $_POST['name']
$email= $_POST['email']
$password= $_POST['password']
$pwd= $_POST['pwd']

if(!empty($name) || !empty($email) || !empty($password) || !empty(pwd))
{
   $host ="localhost";
   $dbusername="root";
   $dbpassword="";
   $dbname ="demo";


   // create connection
   $con = new mysqli ($host , $dbusername,$dbpassword,$dbname);

   if(mysqli_connect_error())
   {
      die('connect error ('.
      mysqli_connect_error().')'
      .mysql_connect_error());
   }
   else
   {
      $select = "Select email from signin where email=? limit 1";
      $select = "insert into signin ( name, email, password,pwd) values (?,?,?,?)";
     // prepare statement

     $stmt =$conn ->prepare($select);
     $stmt -> bind_param("s",$email);
     $stmt -> execute();
     $stmt -> bind_result($email);
     $stmt-> store_result();
     $rum = $stmt ->num_rows;

     // checking username
     if($rnum==0){
      $stmt -> close();
      $stmt = $conn ->prepare($insert);
      $stmt -> bind_param("ssss",$name,$email,$password,$pwd);
      $stmt ->execute();
      echo"new record inserted successfully";

     }
     else{
      echo"someone already register using this email";
     }
     $stmt-> close();
     $stmt -> close();

   }

}
else{
   echo "all field required";
   die();
}
?>