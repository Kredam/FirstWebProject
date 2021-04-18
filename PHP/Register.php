<?php
    session_start();
    include "File.php";
    $fiokok = loadUsers(__DIR__ . '/../Admin/users.txt');

    if(isset($_SESSION["user"])){
        header("Location: Profile.php");
    }
    
    $siker;
    $hibak = [];
    $name = $_POST["full-name"];
    $username = $_POST["username"];
    $sent = $_POST["submit-btn"];
    $pswd = $_POST["passwd"];
    $email = $_POST["email"];
    $pswd2 = $_POST["passwd2"];
    $eletkor = $_POST["age"];
    $knowledge = $_POST["knowledge"];
    $gender = $_POST["gender"];

    /* Felhasznaló név ellenőrzése hogy üres-e */
    if (isset($sent)) {
        if (empty($name) && trim($name) === "") {
            $hibak[] = "<strong>HIÁNYZIK:</strong> Teljes név!";
        } 
        if(empty($pswd) && trim($pswd) === "" || empty($pswd2) && trim($pswd2) === "" ){
            $hibak[] = "<strong>HIÁNYZIK:</strong> Jelszó!";
        }
        if(empty($eletkor) && trim($eletkor) === ""){
            $hibak[] = "<strong>HIÁNYZIK:</strong> Életkor!";
        }
        if(empty($gender)){
            $hibak[] = "<strong>HIÁNYZIK:</strong> Neme!";
        }
        foreach($fiokok as $fiok){
            if($fiok["username"] === $username){
                $hibak[] = "Foglalt felhasználónév";
            }
        }
        if(!preg_match('/[A-Za-z]/', $pswd) || !preg_match('/[0-9]/', $pswd)){
            $hibak[] = "<strong>HIÁNYZIK</strong> betű vagy szám";
        }
        if (strlen($pswd) < 5) {
            $hibak[] = "Rövid a jelszó(legalább 5 karakter)";
        }
        if ($pswd !== $pswd2) {
            $hibak[] = "Jelszó nem egyezik";
        }
        if ($eletkor < 18) {
            $hibak[] = "Túl fiatal";
        }
        if(count($hibak) === 0){
            $fiokok[] = ["username" => $username, 
                         "password" => $pswd, 
                         "email" => $email , 
                         "gender" => $gender, 
                         "age" => $eletkor,
                         "knowledge" => $knowledge];
            saveUsers(__DIR__ . '/../Admin/users.txt', $fiokok);
            header("Location: Sign.php");
            global $siker;
            $siker = true;
        } else {
            global $siker;
            $siker = false;
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
            include '../Styles/Register.css';
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

<div class="urlap">
    <form action="Register.php" method="POST" enctype="multipart/form-data">
        <fieldset>
          <legend>Regisztrációs adatok</legend>
          <label>Teljes név: <input type="text" name="full-name" size="25"/></label> <br/>
          <label>Felhasználónév: <input type="text" name="username" /></label> <br/>
          <label>Jelszó(5 karakter(betű és szám) minimum): <input type="password" name="passwd" /></label> <br/>
          <label>Jelszó ismét: <input type="password" name="passwd2" /></label> <br/>
          <label>Eletkor<input type="number" name="age" value=""> </label><br>
          <label>E-mail: <input type="email" name="email" /></label> <br/>
          <input type="radio" name="gender" value="férfi">Férfi <br>
          <input type="radio" name="gender" value="nő">Nő <br>
          <input type="radio" name="gender" value="egyeb">Egyéb<br>
          <label>Felhasználói azonosító: <input type="number" name="user-id" value="1111" disabled/></label> <br/>
        </fieldset>

        <label for="education">Milyen szinten vagy?</label>
        <select id="education" name="knowledge">
          <option>Beginner</option>
          <option>Intermediate(campfire guitarist)</option>
          <option>Pro</option>
          <option selected>Egyéb</option>
        </select> <br/>
        <input type="reset" name="reset-btn" value="Adatok törlése"/>
        <input type="submit" name="submit-btn" value="Adatok elküldése"/>
    </form>
</div>
    <?php
        if(isset($siker) && $siker===true){
            echo "<p> sikeres </p>";
           
        } else {
            foreach ($hibak as $hiba) {
                echo "<p>" . $hiba . "</p>";
            }
        }
    ?>

</body>
</html>