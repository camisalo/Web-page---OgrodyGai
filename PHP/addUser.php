<?php

$username = $_GET['username'];
$password = md5($_GET['password']);
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$email = $_GET['email'];

if (isset($username, $password, $firstname, $lastname, $email) &&
    strlen($username) > 0 &&
    strlen($password) > 0 &&
    strlen($firstname) > 0 &&
    strlen($lastname) > 0 &&
    strlen($email) > 0){

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
        
        if (isset($_GET['admin'])){
            $sq1 = "INSERT INTO users (admin, username, password, firstname, lastname, email)
                    VALUES ('TAK', '$username', '$password', '$firstname', '$lastname', '$email')";
             echo "dodanu urzytkownika z adminem\n";
        } else {
            $sq1 = "INSERT INTO users (username, password, firstname, lastname, email)
                    VALUES ('$username', '$password', '$firstname', '$lastname', '$email')";
            echo "dodanu urzytkownika bez admina\n";
        }

        if ($dbc->query($sq1)){
            echo "SUKCES";
        } else {
            echo "BŁĄD: ".$sq1 . "<br>" . $dbc->error;
        }

        echo "koniec\n";
    }

} else {
    echo "Uzupełnij dane";
}

echo "jestema za";

?>