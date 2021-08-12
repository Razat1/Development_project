
session_start();
require_once 'user.php';
$user = new USER();

if($user->is_logged_in()!="")
{
 $user->redirect('home.php');
}

if(isset($_POST['submit']))
{
 $email = $_POST['email'];
 $stmt = $user->query("SELECT userID FROM users WHERE userEmail=:email LIMIT 1");
 $stmt->execute(array(":email"=>$email));
 $row = $stmt->fetch(PDO::FETCH_ASSOC); 
 if($stmt->rowCount() == 1)
 {
  $id = base64_encode($row['userID']);
  $code = md5(uniqid(rand()));
  
  $stmt = $user->query("UPDATE tbl_users SET mdCode=:code WHERE userEmail=:email");
  $stmt->execute(array(":code"=>$code,"email"=>$email));
  
  $message= "
       Hello , $email
       <br /><br />
       Click Following Link To Reset Your Password 
       <br /><br />
       <a href='http://localhost/testsignup1.php/resetpassword.php?userid=$id&mdcode=$code'>
click here to reset your password</a>
       <br /><br />
       thank you :)
       ";
  $subject = "password reset";
   $user->send_mail($email,$message,$subject);
   $msg = " We have sent an email to $email.Please click on the password reset link in the email to generate new password.";
 }
 else
 {
  $msg = "<strong>Sorry!</strong>  this email not found. ";
 }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Forgot Password</title>
  </head>
  <body id="login">
    <div class="container">
          <form  method="post">
        <h2>Forgot Password</h2><hr />
         <?php
   if(isset($msg)) {echo $msg;}
   else
   {
    ?>
               <div>
    Please enter your email address. You will receive a link to create a new password via email.!
    </div>  
                <?php
   }
   ?>
        <input type="email" placeholder="Email address" name="email" required />
      <hr />
        <button  type="submit" name="submit">Generate new Password</button>
      </form>

  </body>
</html>

