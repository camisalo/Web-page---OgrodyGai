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
    <link rel="stylesheet" type="text/css" href="style/footer.css"/>

    <script src="JS/Start.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Page-Enter" content="blendTrans(Duration=1,Transition=7)" />

    <script type="text/javascript" src="JS/formularz.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>


<script>
    function checkMinPrice(min) {
    if (min.value > document.getElementById['max'].value && min.value < 1000){
        min.value = 1000;
    }
}
</script>

</head>
<body onload="var Obj = document.getElementById('1'); B_wczytaj(Obj)">



<?php
// MENU 
    include 'menu/header.php';
?>

<div class="image_M" style="margin-top:0px;">
    <img src="img/perspektywa-strona.jpg"/>
</div>




<!-- FILTRY DO WYSZUKIWANIA MIESZKAN -->

<div class="sep_x">
    <h3>Tablica mieszkań</h3>
</div>


<?php
if (isset($_GET['pow_min'])){
    $min_pow = $_GET['pow_min'];
} else {
    $min_pow = 30;
}

if (isset($_GET['pow_max'])){
    $max_pow = $_GET['pow_max'];
} else {
    $max_pow = 100;
}

if (isset($_GET['price_min'])){
    $min_price = $_GET['price_min'];
} else {
    $min_price = 1000;
}

if (isset($_GET['price_max'])){
    $max_price = $_GET['price_max'];
} else {
    $max_price = 1000000;
}

?>


<div class="filtry-div">
    <form action="oferta_M_L.php" method="GET">
        <div class="filtr-title"><span>Wyszukaj mieszkanie</span></div>
        <div class="filtr-L">
            <span class="filtr-s">Filtruj mieszkania po powierzchni:<br/> Minimalna:</span>
            <input class="filtr" type="text" name="pow_min" value="<?php echo $min_pow; ?>">
            <span class="filtr-s">Maksymalna:</span>
            <input class="filtr" type="text" name="pow_max" value="<?php echo $max_pow; ?>">
        </div>
        <div class="filtr-C">
            <span class="filtr-s">Filtruj mieszkania po cenie:<br/> Minimalna:</span>
            <input class="filtr" onchange="checkMinPrice(this);" type="text" name="price_min" value="<?php echo $min_price; ?>">
            <span class="filtr-s">Maksymalna:</span>
            <input class="filtr" type="text" name="price_max" value="<?php echo $max_price; ?>">
        </div>
        <div class="filtr-R">
            <div style="height:50px;"></div>
            <input class="filtr-button" type="submit" value="Filtruj >>">
        </div>
    </form>
</div>


<div class="div-mieszkania">

<?php
// ŁĄCZENIE Z BAZĄ DANYCH I WYŚWIETLANIE TABELI Z MIESZKANIAMI
DEFINE ('DB_HOST','sql.vdl.pl');
DEFINE ('DB_USER','anathiel_dbim');
DEFINE ('DB_PASSWORD','hFYJM23U');
DEFINE ('DB_NAME','anathiel_dbim');

// połączenie z bazą.
$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);
} else {


    //Ustawienie odpowiedniego kodowania znaków (polskie znakii nie tylko)
    $dbc->query('SET NAMES utf8');
    $dbc->query('SET CHARACTER_SET utf8_unicode_ci');

    $sq1 = "SELECT * FROM blok 
            WHERE Powierzchnia BETWEEN $min_pow AND $max_pow
            AND Cena_calosc BETWEEN $min_price AND $max_price";

    $result = $dbc->query($sq1);

    if($result->num_rows > 0){

        echo '<table class="tabela_mieszkan" cellspacing="5" cellpadding="8">
        <tr>
        <th></th>
        <th>Numer mieszkania</th>
        <th>Numer klatki</th>
        <th>Powierzchnia</th>
        <th>Cena za m<sup>2</sup></th>
        <th> Cena całkowita </th>
        <th>Pietro</th>    
        <th>Liczba pokoi</th>   
        <th>Aneks</th>
        <th>Balkon</th>      
        <th>Stan</th>  
        </tr>';


        while ($row = $result->fetch_assoc()){

            // określenie stanu mieszkania
            $color;
            if ($row['Stan'] == "SPRZEDANE"){
                $color = 'class="sprzedane"';
            } elseif ($row['Stan'] == "REZERWACJA"){
                $color = 'class="rezerwacja"';
            } else {
                $color = 'class="dostepne"';
            }

            // drukowanie wierszy tabeli
            echo '<tr style="background-color:none;" id="' . $row['id'].'" onclick="B_wczytaj(this);">
            <td> <div class="dropdown_o"> <img class="obrazek" src="rzuty/'.$row['id'].'.jpg"/><div class="dropdown_o-content"><img src="rzuty/'.$row['id'].'.jpg"/></div></div></td>
            <td>' .$row['Numer_mieszkania'] .   '</td>
            <td>' .$row['Numer_klatki'] .       '</td>
            <td>' .$row['Powierzchnia'] .       ' m<sup>2</sup></td>
            <td>' .$row['Cena'] .       ' zł</td>
            <td>' .$row['Cena']*$row['Powierzchnia'] .       ' zł</td>

            <td>' .$row['Pietro'] .             '</td>
            <td>' .$row['Liczba_pokoi'] .       '</td>
            <td>' .$row['Aneks'] .              '</td>
            <td>' .$row['Balkon'] .             '</td>
            <td '.$color.'>' .$row['Stan'] . '</td>
            </tr>';
            }
    echo '</table>';
    } else {
        echo 'Nie ma dostępnych mieszkan';
    }
}
$dbc->close();
?>
</div>


<div class="sep_x">
    <h3>Podgląd mieszkania</h3>
</div>

<div class="kafelek">
    <div class="pole_tekstowe">
        <p>
            Spodobało Ci się nasze mieszkanie? <br/>
            wypełnij poniższy formularz i zarezerwój mieszkanie,
             zanim ktoś sprzątnie Ci je sprzed nosa!
        </p>
    </div>
</div>

<div class="formularz">

    <div class="f_rzut">
        <img id="rzut" src=""/>
    </div>
    
    
    <div class="f_form">
        <form action="rezerwacja.php" method="post">
            <input type="hidden" name="id" value="1" />
            <input type="hidden" name="nrMieszkania" value="eloszka" />
            <input type="hidden" name="nrKlatki" value="111" />
            <input type="hidden" name="adresMieszkania" value="222" />
            <input type="hidden" name="powierzchnia" value="333" />
            
            <span class="f_n_pola">Imie:</span></br> <input type="text" name="imie"/><span><?php echo $nameErr?></span><br>
            <span class="f_n_pola">Nazwisko:</span></br> <input type="text" name="nazwisko"/><br>
            <span class="f_n_pola">Adres:</span></br> <input type="text" name="adresKlienta"/><br>
            <span class="f_n_pola">Telefon:</span></br> <input type="text" name="telefon"/><br>
            <span class="f_n_pola">e-mail:</span></br> <input type="text" name="mail"/><br>
            <input id="przycisk_f" class="button" type="submit">
            <div class="komunikat_div"><p id="komunikat"></p></div>
        </form>
    </div>
    <div class="f_lok">
        <img id="lok" src=""/>
    </div>

</div>

<!-- Narazie nie ogarniete ale fajnie wiec mozna ogarnac -->

<script>
    function zarezerwoj_mieszkanie(){
        var xmlhttp;
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); // internet Explorer
        }
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "getcustomer.asp?q="+str, true);
        xhttp.send();
    }
</script>

<?php
    // FOOTER
    include 'menu/footer.php';
?>

<script>

</script>

</body>
</html>
