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
    <script type="text/javascript" src="JS/przypomnij_haslo.js"></script>

</head>
<body onload="var Obj = document.getElementById('1'); B_wczytaj(Obj)">

<?php
// MENU 
    include 'menu/header.php';
?>

<div class="image_M">
    <img src="img/perspektywa-strona.jpg"/>
</div>

<div id="panel">
    <form>
        <label for="username">Nazwa użytkownika:</label>
        <input type="text" id="username" name="username">
        <label for="username">Hasło zostanie przesłane na emaila użytkownika</label>
        <div id="lower">
            <input onclick="przypomnij();" type="submit" value="Wyślij"/>
        </div>
    </form>
</div>

<?php
    // FOOTER
    include 'menu/footer.php';
?>

<script>
    
</script>

</body>
</html>
