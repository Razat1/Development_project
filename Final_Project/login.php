<?php
require('config.php');

session_start();
if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $us=$_POST['userType'];

    $select = $pdo->prepare("SELECT * FROM users WHERE username='$username' and password='$password' and userType='$us' ");
    $select->setFetchMode(PDO::FETCH_ASSOC);
    $select->execute();

    $data=$select->fetch();
    $admin = "admin/ham123";
    $admin = "admin";

if(isset($_SESSION["admin_login"])) //checks condition admin login
{
    header("location: /admin_home.php");
}

if(isset($_SESSION["employee_login"])) //checks condition admin login
{
    header("location: /employee_home.php");
}

if(isset($_REQUEST["btn_login"])) //login button name
{
    $email =$_REQUEST["txt_email"];
    $email= $_REQUEST["txt_password"];
    $role= $_REQUEST["txt_role"];
}

if(empty($email)){
    $errorMsg[]="Please enter email";
}

if(empty($password)){
    $errorMsg[]="Please enter password";
}

if(empty($role)){
    $errorMsg[]="Please select role";
}

else if($email AND $password AND $role)
{
    try{
        $select_stmt=$db->prepare("SELECT * FROM employee WHERE Email='$email' and Password='$password' and Role = $role");

        $select_stmt->bindParam(":uemail" ,$email);
        $select_stmt->bindParam(":upassword",$password);
        $select_stmt->bindParam(":urole",$role);
        $select_stmt->execute();

        while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
        {
            $dbemail =$row["email"];
            $dbpassword =$row["password"];
            $dbrole =$row["role"];
        }
        if($email!==null AND $password!==null AND $role!==null){
        if ($select_stmt->rowCount()>0)  
        if($email==$dbemail AND $password==$dbpassword AND $dbrole==$dbrole)
        {
            switch($dbrole)
            {
              case"admin":
                $_SESSION["admin_login"]=$email;
                $loginMsg="Successful Admin login, Welcome!";
                header("refresh:3;/admin_home.php"); //change to my directory
                break;

                case"admin":
                    $_SESSION["employee_login"]=$email;
                    $loginMsg="Successful Employee login, Welcome!";
                    header("refresh:3;/employee_home.php"); //change to my directory
                    break;
                
               default:
               $errorMsg[]="wrong email or pass or role";     
            }
        }

        else{
            $errorMsg[]="wrong email or password or role";
        }
    }

    
    else{
        $errorMsg[]="wrong email or password or role";
    }
}

        catch(PDOException $e)
          {
              $e->getMessage();
         }
       }


      else{
    $errorMsg[]="wrong email or password or role";
     }

    }