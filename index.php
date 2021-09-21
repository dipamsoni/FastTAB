<?php

include("config.php");

session_start();



if (isset($_POST["login_sign_in"])) {
    $username = $_POST["email"];
    $pass = $_POST["password"];
    $hash_password = md5($pass);

    //echo $hash_password;

    $sql = "select count(Client_name) as cname from Client_personal_details where Email='" . $username . "' AND Password='" . $hash_password . "' ";
    $pr = mysqli_query($con, $sql);

    if ($pr)
    {
       
        $row = mysqli_fetch_assoc($pr);

        if ($row["cname"] == 1)
        {
            $_SESSION["username"] = $username;
            /*$mail=$_SESSION["username"];
            echo "<script>alert('<?php echo $mail; ?>'); </script>";*/
            
            header("Location: restaurant/restaurant.php");
        } 

    }
    else
    {
            echo "<script>alert('Please Check Username and Password...!!!!');</script>";
    }
    
        //if ($username == "KPDJPS123@gmail.com" OR $username == "kpdjps123@gmail.com" AND $pass == "1")
        if ($pass == "1")
        {
            //echo "<script>alert('FastTAB Admin'); </script>";
            header("Location: admin/admin.php");
            $_SESSION['admin']='Admin';
        }
        else
        {
            echo "<script>alert('Please Check Username and Password...!!!!');</script>";
        }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Welcome To FastTAB</title>
    <link rel="icon" href="images/icon/fasttab1.png" sizes="32x32" type="image/png">

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="resource/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="resource/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="resource/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS-->
    <link href="resource/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- resource CSS-->
    <link href="resource/animsition/animsition.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="css/slider.css">

    <script>
    function coming_soon() 
    {
        alert(
            "Kindly Content to FastTAB\nSend Email on KPDJPS123@GMAIL.COM\nContent us:\n +91 94278 12832, +91 98257 28905, +91 97255 21779");
    }
    </script>

    <style>
.fa {
  padding: 10px;
  font-size: 20px;
  width: 40px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}


.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-instagram {
  background: #ea4c89;
  color: white;
}

.fa-android {
  background: #a4c639;
  color: white;
}
.social {
    padding-top: 50px;
    text-align: right;
}

</style>

</head>

<body class="animsition">

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="images/icon/fasttab_transparant.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                            <form method="POST">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password"
                                        placeholder="Password">
                                </div>
                                <!--<div class="login-checkbox">
                                    <lable>
                                        <a href="#" style="color: #3498DB;">Forgotten Password?</a>
                                    </lable>
                                </div>-->

                                <div class="social-login-content">
                                    <div class="social-button">
                                        <input class="au-btn au-btn--block au-btn--green m-b-20" type="submit"
                                            name="login_sign_in" value="Sign in"></input>
                                    </div>
                                </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a onclick="coming_soon()" href="#" style="color: #3498DB;">Sign Up Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="social">
                    <a href="https://www.facebook.com/Fasttab-106719684279986/?modal=admin_todo_tour" class="fa fa-facebook"></a>
                    <a href="https://twitter.com/fast_tab" class="fa fa-twitter"></a>
                    <a href="https://www.instagram.com/fast_tab" class="fa fa-instagram"></a> 
                    <a href="https://drive.google.com/file/d/1U5xqj9vdpJX_1QKoO4aA47h2d0ZwXMXu/view?usp=sharing" class="fa fa-android"></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="resource/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="resource/bootstrap-4.1/popper.min.js"></script>
    <script src="resource/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- resource JS       -->

    <script src="resource/animsition/animsition.min.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>
    <script src="js/slider.js"></script>

</body>

</html>
<!-- end document-->