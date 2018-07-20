<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Osiedle</title>
      <meta http-equiv="Content-Type" content="application/xhtml+xml;
charset=UTF-8"/>
      
   <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet"/>

    <link rel="stylesheet" type="text/css" href="style/style.css"/>
    <link rel="stylesheet" type="text/css" href="style/footer.css"/>


    <meta http-equiv="Page-Enter" content="blendTrans(Duration=1,Transition=7)" />


    

</head>
<body>
   
<?php
    include 'menu/header.php';
?>


   <div class="image_M">
      <img src="img/Menu.jpg" alt="Menu"/>
      <div class="centered">Nowoczesna i ciekawa architektura,<br/> nacisk na innowacyjność,<br/> dobry projekt</div>
   </div>

<div class="kafelek_separator_g" style="text-size: 50px;">
    <h3 class="h3_glowne"><font>O</font>GRODY<font>G</font>AI</h3>
</div>

<div class="kafelek">
    <div class="pole_tekstowe">
        <p>OgrodyGai to blok mieszkalny położony w prestiżowej i spokojnej części Krakowa. 

        Budynek o wysokości dwóch pięter, charakteryzuje się ponadczasową architekturą. Modernistyczna bryła została uzupełniona elementami, nadającymi prestiżowy charakter, tj. duże przeszklenia.
        </p>
    </div>
</div>

<div class="kafelek_separator">
    <h3>Sprzedaż mieszkań</h3>
</div>


<div class="kafelek">
    <div class="zdjecie">
        <span class="helper"></span>
        <img src="img/G_1.jpg" alt="wizualizacja"/>
    </div>
    <div class="opis">
        <div>
            <?php
                include 'zrodla/Glowna_opis';
            ?>
        </div>
    </div>
</div>


<div class="kafelek_separator">
    <h3>Garaże pod budynkiem</h3>
</div>


<div class="kafelek">
    <div class="opis-garaz">
        <div>
            <?php
                include 'zrodla/garaz';
            ?>
        </div>
    </div>
    <div class="zdjecie-garaz">
        <span class="helper"></span>
        <img src="img/piwnica_chodnik.jpg" alt="wizualizacja"/>
    </div>
</div>


<div class="kafelek_separator">
    <h3>Otoczenie</h3>
</div>


<div class="otoczenie">
    <?php include 'zrodla/otoczenie' ?>
</div>



<div class="kafelek_separator">
    <h3>Lokalizacja</h3>
</div>


<div class="kafelek_mapa">
    <div class="opis-garaz">
        <div>
            <?php
                include 'zrodla/lokalizacja';
            ?>
        </div>
    </div>

    <div class="mapa">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1281.6641087233102!2d19.93115825825773!3d50.02394539485467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47165cbcc146dd51%3A0xa902e8f5c663bc45!2sKlementyny+Hoffmanowej+6%2C+30-419+Krak%C3%B3w!5e0!3m2!1spl!2spl!4v1526233404233" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
    <div class="zdjecie">
        <img src="img/G_2.jpg" alt="wizualizacja"/>
    </div>
</div>

<?php
    include 'menu/footer.php';
?>


</body>
</html>
