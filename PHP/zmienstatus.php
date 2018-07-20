<?php

$id = $_GET['id'];
$stan = $_GET['stan'];





DEFINE ('DB_HOST','sql.vdl.pl');
DEFINE ('DB_USER','anathiel_dbim');
DEFINE ('DB_PASSWORD','hFYJM23U');
DEFINE ('DB_NAME','anathiel_dbim');

$dbc = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($dbc->connect_error) {
    die("Connection failed: " . $dbc->connect_error);

    echo 'błąd';
} else {
    //Ustawienie odpowiedniego kodowania znaków (polskie znaki)
    $dbc->query('SET NAMES utf8');
    $dbc->query('SET CHARACTER_SET utf8_unicode_ci');

    $sq1 = "UPDATE blok SET Stan='$stan' WHERE id = '$id'";

    $result = $dbc->query($sq1);
    
    $dbc->close();
    echo 'Dane zostały zaktualizowane.';
}

echo " ";

?>