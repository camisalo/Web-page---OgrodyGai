<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Osiedle</title>
      <meta http-equiv="Content-Type" content="application/xhtml+xml;
charset=UTF-8"/>
      
   <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="style/style.css"/>
    <link rel="stylesheet" type="text/css" href="style/galeria-styl.css"/>
    <link rel="stylesheet" type="text/css" href="style/lightbox.css"/>
    <link rel="stylesheet" type="text/css" href="style/footer.css"/>

    
    <script src="JS/Start.js"></script>
    <script src="JS/lightbox-plus-jquery.js"></script>


    <meta http-equiv="Page-Enter" content="blendTrans(Duration=1,Transition=7)" />


    

</head>
<body onload="Start();">
   
<?php
    include 'menu/header.php';
?>

<div class="image_M">
    <img src="img/perspektywa-strona.jpg">
</div>


<?php 
    include 'PHP/Load_gallery.php';
?>

<?php
    include 'menu/footer.php';
?>


</body>
</html>
