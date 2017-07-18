<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php  include "admin/functions.php"; ?>

<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){


    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $error = [
        'username' => '',
        'email' => '',
        'password' => ''
    ];

    if(strlen($username) < 4){
        $error['username'] = 'Username needs to be 4 or more characters';
    }
    if(usernameExists($username)){
        $error['username'] = 'Username already exists';
    }
    if(strlen($email) == 0){
        $error['email'] = 'Email cannot be empty';
    }
    if(emailExists($email)){
        $error['email'] = 'Email already exists, <a href="index.php">Please log in</a>';
    }
    if(strlen($password) == 0){
        $error['password'] = 'Password cannot be empty';
    }

    foreach($error as $key => $value){
        if(empty($value)){
            unset($error[$key]);
        }
    }
    if(empty($error)){
        registerUser($username, $email, $password);
        loginUser($username, $password);
    }
}
?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
<!--                        <h6 class="text-center">--><?php //echo $message ?><!--</h6>-->
                        <div class="form-group">
                            <p><?php echo isset($error['username']) ? $error['username'] : '' ?></p>
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username"
                                   autocomplete="on"
                                   value="<?php echo isset($username) ? $username : "" ?>">
                        </div>
                         <div class="form-group">
                             <p><?php echo isset($error['email']) ? $error['email'] : '' ?></p>
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com"
                                   autocomplete="on"
                                   value="<?php echo isset($email) ? $email : "" ?>">
                        </div>
                         <div class="form-group">
                             <p><?php echo isset($error['password']) ? $error['password'] : '' ?></p>
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="register" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
