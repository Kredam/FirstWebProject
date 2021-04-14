<?php
    session_start();
    if(empty($_SESSION["user"])){
        header("Location: Sign.php");
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
            include '../Styles/Profile.css';
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
    <div class="file-upload-form">
            <form action="PicUpload.php" method="POST" enctype="multipart/form-data">
                    <input type="file" id="file-upload" name="profile-pic" accept="image/*"/>
                    <input type="hidden" name="gallery" value="<?php print $_GET["pics"] ?>">
                    <input type="submit" name="upload-button" value="upload"/>
            </form>
    </div>
    <?php
          echo "<ul>";
          echo "<li>Felhasználónév: " . $_SESSION["user"]["username"] . "</li>";
          echo "<li>Életkor: " . $_SESSION["user"]["email"] . "</li>";
          echo "<li>Nem: " . $_SESSION["user"]["gender"] . "</li>";
          echo "<li>Hobbik: " . implode(", ", $_SESSION["user"]["age"]) . "</li>";
          echo "<li>Level of Knowledge:" . $_SESSION["user"]["knowledge"] . "</li>";
          echo "</ul>";
    ?>

</body>
</html>