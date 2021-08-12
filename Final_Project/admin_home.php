<center>
<h1>Admin Page</h1>

<h3>
<?php
require_once('login.php');
session_start();

if(!isset($_SESSION['admin_login']))
{
    header("location: /index.php");
}
if(isset($_SESSION['employee_login']))
{
    header("location: /employee_home.php");
}
if(isset($_SESSION['admin_login']))
{
?>
Welcome,
<?php
echo $_SESSION['admin_login'];
}
?>
</h3>

</center>