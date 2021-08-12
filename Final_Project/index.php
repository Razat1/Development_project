<?php
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <?php
    if (isset($errorMsg))
    {
        foreach($errorMsg as $error){
            echo $error;
        }
    }
    if(isset($loginMsg))
    {
        echo$loginMsg;
    }
    ?>
    <form method="post" class="form-horizontal">

        <div class="form-group">
            <label class="col-sm-3 control-label">Email</label>
            <div class="col-sm-6">
                <input type="text" name=txt_email class="form-control" placeholder="enter email">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label">Password</label>
            <div class="col-sm-6">
                <input type="text" name=txt_password class="form-control" placeholder="enter password">
            </div>
        </div>
        <div class="form-group">
            <label for="col-sm-3 control label">Select Type</label>
            <div class="col-sm-6">
                <select class="form-control" name="txt_role">
                    <option value='' selected="selected"> - select role - </option>
                    <option value="admin">Admin</option>
                    <option value="employee">Employee</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9 m-t-15"></div>
            <input type="submit" name="btn_login" class="btn btn-success" value="login">
        </div>
        <div class=form-group>
        <div class="col-sm-offset-3 col-sm-9 m-t-15">
        <p><a href="password-reset-token.php">Forgot Password</a></p>    
        </div>   
        </div>
        

    </form>
    </div>
    </div>
    </div>
</body>

</html>