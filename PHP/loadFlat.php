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

    $sq1 = 'SELECT * FROM blok WHERE id=\''.$_GET['mieszkanie'].'\'';

    $result = $dbc->query($sq1);

    if($result->num_rows > 0){
        $flat = $result->fetch_assoc();


        echo '
            <div class="sep_x">
            <h3>Twoje nowe mieszkanie</h3>
            </div>

            <div id="wstecz_i_podpis">
            <a href="oferta_M_G.php?tryb=1&rzut='.$_GET['rzut'].'" class="button"><< Wstecz</a>

            <div class="opis_rzutu">
                <h3>Zainteresowała Cię nasza oferta?<br/>Wypełnij formularz, aby zasięgnąć więcej informacji.</h3>
            </div>
            </div>
        ';




        echo '<div class="formularz">

        <div class="f_rzut">
            <img id="rzut" src="rzuty/'.$flat['id'].'.jpg"/>
        </div>
        
        
        <div class="f_form">
            <form action="rezerwacja.php" method="post">
                <input type="hidden" name="id" value="'.$flat['Numer_mieszkania'].'" />
                <input type="hidden" name="nrMieszkania" value="'.$flat['Numer_mieszkania'].'" />
                <input type="hidden" name="nrKlatki" value="'.$flat['Numer_klatki'].'" />
                <input type="hidden" name="adresMieszkania" value="'.$flat['Lokalizacja'].'" />
                <input type="hidden" name="powierzchnia" value="'.$flat['Powierzchnia'].'" />
                
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

        </div>';

    }
}
$dbc->close();
?>