<?php
    session_start();

    if (isset($_SESSION['zalogowany']) && $_SESSION['zalogowany'] == 1){
        header("Location: inwestor.php"); 
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Osiedle</title>
      <meta http-equiv="Content-Type" content="application/xhtml+xml;
charset=UTF-8"/>
      
   <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="style/sprzedaz.css"/>
    <link rel="stylesheet" type="text/css" href="style/style.css"/>
    <link rel="stylesheet" type="text/css" href="style/login.css"/>
    <link rel="stylesheet" type="text/css" href="style/footer.css"/>

    <script src="JS/Start.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Page-Enter" content="blendTrans(Duration=1,Transition=7)" />

    <script type="text/javascript" src="JS/formularz.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


</head>
<body onload="var Obj = document.getElementById('1'); B_wczytaj(Obj)">

<?php
// MENU 
    include 'menu/header.php';
?>

<div class="image_M">
    <img src="img/perspektywa-strona.jpg"/>
</div>

<div class="login-kontener">
    <div id="panel">
        <form action="inwestor.php" method="post">
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" id="username" name="username">
            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password">
            <div id="lower">
                <p><a href="przypomnij_haslo.php">Zapomniałeś hasła?</a></p>
                <input type="submit" value="Login"/>
            </div>
        </form>
    </div>

    <div class="komunikat-login">
        <div>
        <p>
            Na potrzeby pracy magisterskiej stworzono fikcyjne konto do logowania w panelu
            administracyjnym w celu pokazania, jak działa wspomniana zakładka. <br/></br>
            <b>Dane do logowania:</b> </br>
            Login: admin </br>
            Hasło: admin
        </p>
        </div>
    </div>
</div>

<?php
    // FOOTER
    include 'menu/footer.php';
?>

<script>
    
</script>

</body>
</html>
