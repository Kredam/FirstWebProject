<?php
    include "File.php";
    $fiokok = loadUsers(__DIR__ . '/../Admin/users.txt');

    $send = $_POST["send"];
    $email = $_POST["email"];
    $valid = false;
    $username;
    $password;

    if(isset($send)){
        foreach ($fiokok as $fiok) {
            if($fiok["email"] === $email){
                global $valid,  $username, $password;
                $username = $fiok["username"];
                $password = $fiok["password"];
                $valid = true;
            }
        }
    }
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
            include '../Styles/Forget.css';
            include '../Styles/Template.css';
        ?>
    </style>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:ital,wght@1,300&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/3de6b5ab59.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="navbar">
        <ul>
            <li><a href="../HTML/MainPage.html">Welcome</a></li>
            <li><div class="dropdown">
                <Button class="dropbtn">Music Theory
                    <i class="fas fa-chevron-down"></i>
                </Button>
                <div class="dropdown-content">
                    <a href="../HTML/Basics.html">Basics</a>
                    <a href="../HTML/Tabs.html">Tab</a>
                </div>
            </div></li>
            <li><div class="dropdown">
                <button class="dropbtn">Profile
                    <i class="fas fa-chevron-down"></i>
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
    <div>
        <form action="Forget.php" method="POST">
            <label>Your account email adress</label>
            <br>
            <input type="email" name="email">
            <br>
            <button type="submit" name="send">Send</button>
        </form>
        <?php
            if($valid === true){
                mail($email, "Your username and password", $username . "<br>" . $password);
                echo "<p> Adatok sikeresen elkuldve";
                header("Location: Sign.php");
            } else {

            }
        ?>
    </div>
</body>
</html>