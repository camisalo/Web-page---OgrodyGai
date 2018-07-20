<?php

if (isset($_GET['id']) && strlen($_GET['id']) > 0 && $_GET['id'] > 1){
    $id = $_GET["id"];

    DEFINE ('DB_HOST','sql.vdl.pl');
    DEFINE ('DB_USER','anathiel_dbim');
    DEFINE ('DB_PASSWORD','hFYJM23U');
    DEFINE ('DB_NAME','anathiel_dbim');

    $dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if ($dbc->connect_error) {
        die("Connection failed: " . $dbc->connect_error);
    } else {

        //Ustawienie odpowiedniego kodowania znaków (polskie znaki i nie tylko)
        $dbc->query('SET NAMES utf8');
        $dbc->query('SET CHARACTER_SET utf8_unicode_ci');

        $sq1 = "DELETE FROM users WHERE id='$id'";

        if ($dbc->query($sq1)){
            echo 'Poprawne usunięcie użytkownika';
        } else {
            echo 'Coś poszło nie tak';
        }

    }
} elseif ($_GET['id'] == 1) {
    echo 'chcesz usunąć superusera';
} elseif ($_GET['id'] < 1) {
    echo 'BŁĄD';
} else {
    echo 'coś jest nie tak z danymi';
}

?>