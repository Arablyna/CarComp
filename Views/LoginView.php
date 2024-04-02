<?php

require_once "Models\LoginModel.php";
require_once "Controllers\LoginController.php";

Class LoginView{
  
    public  function login()
    {    session_start(); // Start the session
        $cntr=new LoginController(); 
    ?>
     <div class="form-wrap">
        <div class="signup-form">
            <form action='' method="post">
                <h2>Sign In</h2>

                <div class="form-group">
                    <input id="username" type="text" class="form-control" name="username" placeholder="Username" required="required">
                </div>
                <div class="form-group">
                    <input id="pwd" type="password" class="form-control" name="password" placeholder="Password" required="required">
                </div>
                <div id="wrong" hidden>Wrong Username or Password</div>
                <div class="form-group" id="signupdiv">
                    <button type="submit" name='submit' class="signup">Sign In</button>
                </div>
            </form>
            <div class="hint-text">Don't have an account? <a href="/prj/SignUp">Sign Up here</a></div>
        </div>
    </div>
    <?php  
    
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $count = $cntr->Login($username, $password);
        if ($count > 0) {
            
           // $_SESSION["loggedIn"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["user"] = $cntr->getUserId($username);
            if ($cntr->ifAdmin($username, $password) == 1) {
                $_SESSION["role"] = "admin";
                echo "<script type='text/javascript'>location.href = '/prj/admin';</script>";
            } else {
                $_SESSION["role"] = "user";
                echo "<script type='text/javascript'>location.href = '/prj/acceuil';</script>";
            }

        } else {
            echo '<script>document.getElementById("wrong").hidden = false;</script>';
        }
    }
}
}