<?php 
    session_start(); // rozpoczęcie sesji
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
    <link rel="stylesheet" type="text/css" href="style/inwestor.css"/>


    <script src="JS/Start.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Page-Enter" content="blendTrans(Duration=1,Transition=7)" />

    <script type="text/javascript" src="JS/formularz.js"></script>
    <script type="text/javascript" src="JS/inwestor.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

</head>
<body>

<?php
// MENU 
    include 'menu/header.php';
?>

<div class="image_M">
    <img src="img/Menu.jpg"/>
</div>

<div class="div-mieszkania">
<?php

$dostep = FALSE;

if(!isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] == 0) {// sprawdzenie czy uzytkownik sie juz logował
	
    // Sprawdzanie username i hasłą podanego w formularzu


    $username = $_POST["username"];
    $password = $_POST["password"];

    echo 'Username: '.$username.'  Hasło: '.$password.'';

    DEFINE ('DB_HOST','sql.vdl.pl');
    DEFINE ('DB_USER','anathiel_dbim');
    DEFINE ('DB_PASSWORD','hFYJM23U');
    DEFINE ('DB_NAME','anathiel_dbim');


    $dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($dbc->connect_error) {
        die("Connection failed: " . $dbc->connect_error);
    } else {


        //Ustawienie odpowiedniego kodowania znaków (polskie znaki)
        $dbc->query('SET NAMES utf8');
        $dbc->query('SET CHARACTER_SET utf8_unicode_ci');

        $sq1 = 'SELECT * FROM users WHERE username=\''.$username.'\'';

        $result = $dbc->query($sq1);

        $user = $result->fetch_assoc();

        if($result->num_rows == 1 &&
        0 == strcmp($password, $user['password']) &&
        0 == strcmp('TAK',$user['admin'])){
            $dostep = TRUE;
            $_SESSION['zalogowany'] = 1;
        }
        $dbc->close();
    }
} elseif ($_SESSION['zalogowany'] == 1){
    $dostep = TRUE;
}





if ($dostep == TRUE){


    // CZĘŚĆ GŁÓWNA Z MIESZKANIAMI
    // ----------------------------------------------------
    // ŁĄCZENIE Z BAZĄ DANYCH I WYŚWIETLANIE TABELI Z MIESZKANIAMI
    DEFINE ('DB_HOST','sql.vdl.pl');
    DEFINE ('DB_USER','anathiel_dbim');
    DEFINE ('DB_PASSWORD','hFYJM23U');
    DEFINE ('DB_NAME','anathiel_dbim');


    // TYMCZASOWE ŁĄCZENIE Z LOKALNA BAZA DANYCH
    //DEFINE ('DB_HOST','localhost');
    //DEFINE ('DB_USER','root');
    //DEFINE ('DB_PASSWORD','haslo');
    //DEFINE ('DB_NAME','mieszkania');

    // połączenie z bazą.
    $dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($dbc->connect_error) {
        die("Connection failed: " . $dbc->connect_error);
    } else {


        //Ustawienie odpowiedniego kodowania znaków (polskie znaki)
        $dbc->query('SET NAMES utf8');
        $dbc->query('SET CHARACTER_SET utf8_unicode_ci');

        $sq1 = "SELECT id, Numer_mieszkania, Numer_klatki, Lokalizacja, Powierzchnia, Pietro, Liczba_pokoi, Aneks, Balkon, Stan FROM blok";

        $result = $dbc->query($sq1);

        if($result->num_rows > 0){

            echo '<table class="tabela_mieszkan" cellspacing="5" cellpadding="8">
            <tr>
            <th></th>
            <th>Numer mieszkania</th>
            <th>Numer klatki</th>
            <th>Powierzchnia</th>
            <th>Pietro</th>    
            <th>Stan</th>
            <th colspan="3"></th>
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
                echo '<tr>
                <td> <div class="dropdown_o"> <img class="obrazek" src="rzuty/'.$row['id'].'.jpg"/><div class="dropdown_o-content"><img src="rzuty/'.$row['id'].'.jpg"/></div></div></td>
                <td id>' .$row['Numer_mieszkania'] .   '</td>
                <td>' .$row['Numer_klatki'] .       '</td>
                <td>' .$row['Powierzchnia'] .       '</td>
                <td>' .$row['Pietro'] .             '</td>
                <td '.$color.'>' .$row['Stan'] .    '</td>
                <td class="wrapper_button"> <button class="guzik_sprzedaj" onclick="sprzedaj(' . $row['id'].')"> S </button> </td>
                <td class="wrapper_button"> <button class="guzik_rezerwuj" onclick="rezerwacja(' . $row['id'].')"> Z </button> </td>
                <td class="wrapper_button"> <button class="guzik_dostepne" onclick="dostepne(' . $row['id'].')"> D </button> </td>
                </tr>';
            }
        echo "</table>";

        } else {
            echo 'Nie ma dostępnych mieszkan';
        }


        // WYŚWIETLANIE LISTY UŻYTKOWNIKÓW
        $sq1 = "SELECT * FROM users";
        $result = $dbc->query($sq1);

        if($result->num_rows > 0){

            echo '<div class=\'div_users\'><table class="tabela_mieszkan" cellspacing="5" cellpadding="8">
            <tr>
            <th style="width:20%;">Nazwa użytkownika</th>
            <th>email</th>
            <th>Imie i Nazwisko</th>    
            </tr>';


            while ($row = $result->fetch_assoc()){
                // drukowanie wierszy tabeli
                echo '<tr>
                <td>' .$row['username'] .                           '</td>
                <td>' .$row['email'] .                              '</td>
                <td>' .$row['firstname'] . ' ' . $row['lastname'] . '</td>
                <td class="wrapper_button">';
                 if ($row['id'] != 1) {
                     echo '<button class="guzik_usun" onclick="usun_uzytkownika('.$row['id'].')"> S </button>';
                 } else {
                     echo 'SuperUser';
                 }
                 echo '</td>
                </tr>';
            }
            echo '</table></div>';


            echo '<div class="f_form" style="width:20%; margin-top:50px;">
                <form>
                    <span class="f_n_pola">Nazwa użytkownika:</span></br> <input class="f_pole" type="text" name="username"/><br>
                    <span class="f_n_pola">Hasło:</span></br> <input class="f_pole" type="text" name="password"/><br>
                    <span class="f_n_pola">Imie:</span></br> <input class="f_pole" type="text" name="firstname"/><br>
                    <span class="f_n_pola">Nazwisko:</span></br> <input class="f_pole" type="text" name="lastname"/><br>
                    <span class="f_n_pola">e-mail:</span></br> <input class="f_pole" type="text" name="email"/><br>
                    <input type="checkbox" name="admin" value="TAK"> Admin<br>
                    <input id="przycisk_f" class="button" type="submit" onclick="addUser();">
                </form>
                <p id="komunikat"></p>
            </div>';

            echo '<div class="logout">
                <button id="logout_b" onclick="logout();">WYLOGUJ</button>
            </div>';

        } else {
            echo 'Nie ma żadnych użytkowników';
        }        
    }
    $dbc->close();
} else {
    echo "Brak Dostępu";
}
?>
</div>




<?php
    // FOOTER
    include 'menu/footer.php';
?>



<script type="text/javascript">

</script>



</body>
</html>
