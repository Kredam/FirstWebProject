<?php
    session_start();
    include "File.php";
    $users = loadUsers(__DIR__ . '/../Admin/users.txt');
    //print_r($users);die;

    $username = $_POST["Username"];
    $password = $_POST["Password"];
    $login = $_POST["submit"];
    $uzenet = "";
    if(isset($_SESSION["user"])){
        header("Location: Profile.php");
    }

    if(isset($login)){
        if(empty($username) || trim($username) === "" || empty($password) || trim($password) === ""){
            global $uzenet;
            $uzenet= "Missing username or password";
        }else{
            global $uzenet;
            $uzenet= "Wrong username or password";

            foreach ($users as $user) {
                if($user["username"] === $username && $user["password"] === $password){
                    $_SESSION["user"] = $user;
                    header("Location: Profile.php");
                    break;
                }
            }
        }
    }
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in | Bejelentkezés</title>
    <meta name="author" content="Kreidli Ádám">
    <link rel="icon" type="image/png" href="https://i.pinimg.com/originals/0f/8b/28/0f8b2870896edcde8f6149fe2733faaf.jpg">
    <style>
        <?php
            include '../Styles/Sign.css';
            include '../Styles/Template.css';
        ?>
    </style>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@1,300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3de6b5ab59.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="header">
        <h1>Contact me for tutoring information</h1>
</div>
<div class="navbar">
        <ul>
            <li><a href="../index.html">Welcome</a></li>
            <li><div class="dropdown">
                <Button class="dropbtn">Music Theory
                </Button>
                <div class="dropdown-content">
                    <a href="../HTML/Basics.html">Basics</a>
                    <a href="../HTML/Tabs.html">Tab</a>
                </div>
            </div></li>
            <li><div class="dropdown">
                <button class="dropbtn">Profile
                </button>
                <div class="dropdown-content">
                <?php if (isset($_SESSION["user"])){?>
                    <a href="Profile.php" >Profile</a>
                    <a href="Logout.php">Log out</a>
                <?php } else { ?>
                    <a href="Register.php" >Register</a>
                    <a href="Sign.php" class="active">Sign in</a>
                <?php } ?>
                </div>
            </div></li>
            <li> <a href="../HTML/Bands.html">Bands</a></li>
        </ul>
    </div>

<div class="LogIn">
    <img src="../Pictures/ProfileDefault.png" alt="Login" id="ProfilePic" width="132" height="132">
    <h1>Sign in</h1>
    <form action="Sign.php" method="POST">
        <p class="symbol"></p>
        <input type="text" name="Username" placeholder="Username">
        <br>
        <p class="symbol"></p>
        <input type="password" name="Password" placeholder="Password">
        <br>
        <input type="checkbox" name="accept" id="Policy"><label for="Policy">Skankhunt43</label>
        <br>
        <a href="Forget.php">Forget Password or username</a>
        <br>
        <input type="submit" id="Buttons" name="submit" value="Sign in">
    </form>
</div>
<div class="warning">
    <?php
        echo "<p>" . $uzenet . "</p>";
    ?>
</div>
</body>
</html>