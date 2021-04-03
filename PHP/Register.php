<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign in | Bejelentkezés</title>
    <meta name="author" content="Kreidli Ádám">
    <link rel="icon" type="image/png" href="https://i.pinimg.com/originals/0f/8b/28/0f8b2870896edcde8f6149fe2733faaf.jpg">
    <link rel="stylesheet" href="../Styles/Contact.css">
    <link rel="stylesheet" href="../Styles/Template.css">
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
                    <a href="Register.php" class="active">Register</a>
                    <a href="SignIn.php">Sign In</a>
                    <a href="Profile.php" >Profile</a>
                </div>
            </div></li>
            <li> <a href="../HTML/Bands.html">Bands</a></li>
        </ul>
    </div>

<div class="LogIn">
    <img src="../Pictures/ProfileDefault.png" alt="Login" id="ProfilePic" width="132" height="132">
    <h1>Sign in</h1>
    <form action="Contact.html" method="GET">
        <p><i class="far fa-user"></i></p>
        <input type="text" name="Username" placeholder="Username">
        <br>
        <p><i class="fas fa-key"></i></p>
        <input type="password" name="Password" placeholder="Password" required>
        <br>
        <input type="checkbox" name="accept" id="Policy"><label for="Policy">Skankhunt43</label>
        <br>
        <input type="button" id="Buttons" name="Log In" value="Sign in">
    </form>
</div>
<div class="urlap">
    <form action="Contact.php" method="POST" enctype="multipart/form-data">
        <fieldset>
          <legend>Regisztrációs adatok</legend>
          <label>Teljes név: <input type="text" name="full-name" size="25"/></label> <br/>
          <label>Felhasználónév: <input type="text" name="username" required/></label> <br/>
          <label>Jelszó: <input type="password" name="passwd" required/></label> <br/>
          <label>Jelszó ismét: <input type="password" name="passwd-check" required/></label> <br/>
          <label>Születési dátum: <input type="date" name="date-of-birth" min="1997-01-01"/></label> <br/>
          <label>E-mail: <input type="email" name="email" required/></label> <br/>
          <label>Felhasználói azonosító: <input type="number" name="user-id" value="1111" disabled/></label> <br/>
        </fieldset>

        <label for="education">Milyen szinten vagy?</label>
        <select id="education">
          <option>Beginner</option>
          <option>Intermediate(campfire guitarist)</option>
          <option>Pro</option>
          <option selected>Egyéb</option>
        </select> <br/>
        <input type="reset" name="reset-btn" value="Adatok törlése"/>
        <input type="submit" name="submit-btn" value="Adatok elküldése"/>
    </form>
</div>

</body>
</html>