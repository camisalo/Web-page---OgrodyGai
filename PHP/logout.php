<?php
    session_start();
    if (isset($_SESSION['zalogowany']) || $_SESSION['zalogowany'] == 1){
        $_SESSION['zalogowany'] = 0;
        echo "Wylogowano poprawnie.";
    } else {
        echo "Coś poszło nie tak.";
    }

?>