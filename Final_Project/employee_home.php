<center>
<h1>Employee Page</h1>
<h3>
<?php
session_start();
if(!isset($_SESSION['employee_login']))
{
    header("location:/index.php");
}
if(isset($_SESSION['admin_login']))
{
    header("location:/admin_home.php");
}
if(isset($_SESSION['employee_login']))
{
?>
Welcome,
<?php
echo $_SESSION['employee_login'];
}
?>
</h3>

</center>