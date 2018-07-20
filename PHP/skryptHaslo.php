

<?php 

function sendMail($mail, $wiadomosc) {
    
    // Naglowki mozna sformatowac tez w ten sposob.
    $naglowki = "Reply-to: dyplombim@onwave.eu <dyplombim@onwave.eu>".PHP_EOL;
    $naglowki .= "From: dyplombim@onwave.eu <dyplombim@onwave.eu>".PHP_EOL;
    $naglowki .= "MIME-Version: 1.0".PHP_EOL;
    $naglowki .= "Content-type: text/html; charset=utf-8".PHP_EOL; 

    // Wysyłanie maila
    if(mail($mail, 'Przypomnienie hasła', $wiadomosc, $naglowki))
    {
        echo 'Wiadomość została wysłana';
        return true;
    } else {
        echo "Błąd :( \n";
        return false;
    }
}

function generatePassword(){

    $dlugosc_hasla = 10;

    $dozwolone_znaki = "abcdefghijklmnoprstuwxyz";
    $dozwolone_znaki .= "ABCDEFGHIJKLMNOPRSTUWXYZ";
    $dozwolone_znaki .= "1234567890";
    $haslo = "";
    for($i = 0; $i < $dlugosc_hasla; $i++){
            $rand = rand(0, strlen($dozwolone_znaki) - 1);
            $haslo .= $dozwolone_znaki[$rand];
    }
    return $haslo;
}


    if (isset($_GET['username']) && strlen($_GET['username']) > 0)
    $username = $_GET["username"];

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

        $sq1 = "SELECT * FROM users WHERE username='$username'";

        echo $sq1;

        $result = $dbc->query($sq1);

        $user = $result->fetch_assoc();

        if( $result->num_rows == 1 ){
            $haslo = generatePassword();

            $sq1 = "UPDATE users SET password='md5($haslo)' WHERE username='$username'";

            echo $sq1;

            $result = $dbc->query($sq1);

            if (strlen($haslo) > 0 && sendMail($user['email'],$haslo)){
                echo 'Hasło zostało wysłane na maila podanego podczas rejestracji';
                
            }
        } elseif ($result->num_rows == 0){
            echo 'nie ma takiego użytkownika';
        } else {
            echo 'jest kilku takich samych uzytkowników';
        }
        $dbc->close();
    }


?>