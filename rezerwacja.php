<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Osiedle</title>
      <meta http-equiv="Content-Type" content="application/xhtml+xml;
charset=UTF-8"/>
      
   <link href="https://fonts.googleapis.com/css?family=Montserrat:900" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="style/style.css"/>
    <link rel="stylesheet" type="text/css" href="style/footer.css"/>

    <script src="JS/Start.js"></script>

    <meta http-equiv="Page-Enter" content="blendTrans(Duration=1,Transition=7)" />


    

</head>
<body>
   
<?php
    include 'menu/header.php';
?>

   <div class="image_M">
      <img src="img/perspektywa-strona.jpg">
   </div>


<?php

   // Naglowki mozna sformatowac tez w ten sposob.
   $naglowki = "Reply-to: dyplombim@onwave.eu <dyplombim@onwave.eu>".PHP_EOL;
   $naglowki .= "From: dyplombim@onwave.eu <dyplombim@onwave.eu>".PHP_EOL;
   $naglowki .= "MIME-Version: 1.0".PHP_EOL;
   $naglowki .= "Content-type: text/html; charset=utf-8".PHP_EOL; 

   //Wiadomość najczęściej jest generowana przed wywołaniem funkcji
   //  $wiadomosc = file_get_contents('mail.html');

   // przygotowanie zmiennych do wiadomości

   // dane klienta
   $imie = $_POST["imie"];
   $nazwisko = $_POST["nazwisko"];
   $adresKlienta = $_POST["adresKlienta"];
   $telefon = $_POST["telefon"];
   $email = $_POST["mail"];

   // dane mieszkania
   $id = $_POST["id"];
   $nrMieszkania = $_POST["nrMieszkania"];
   $nrKlatki = $_POST["nrKlatki"];
   $adresMieszkania = $_POST["adresMieszkania"];
   $powierzchnia = $_POST["powierzchnia"];



   // treść wiadomości
   $wiadomosc = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
       <title>Demystifying Email Design</title>
       <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body style="margin: 0; padding: 0;">
   
       <table style="border-collapse: collapse; border: 1px solid black;" align="center" border="0" cellpadding="0" cellspacing="0" width="800">
           <tr>
               <td width="65%" style="padding: 20px 0 30px 20px; font-family: Cookie; font-size: 50px; text-align: left; font-weight: bold;">
               <font style="font-size: 70px; color: #000000;">Ogrody</font><font style="font-size: 70px; color: #1f8112;">Gai</font>
               </td>
               <td style="color: #000000; font-family: Arial, sans-sefir; font-size: 15px; text-align: center;">
                   apartamenty OgrodyGai<br/>
                   ul.Klementyny Hoffmanowej 6A,<br/>
                   30-419 Kraków<br/>
                   Tel. +24 555 123 456<br/>
               </td>
           </tr>
           <tr>
               <td colspan="2" style="color: #000000; font-family: Arial, sans-sefir; font-size: 24px; text-align: center; font-weight: bold;">
                   DRUK POTWIERDZENIA REZERWACJI
               </td>
           </tr>
           <tr>
               <td colspan="2" style="padding: 20px 30px 20px 30px">
                   <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                       <tr>
                           <td width="50%" style="padding: 10px 10px 10px 10px; color: #000000; font-family: Arial, sans-sefir; font-size: 20px; text-align: left; font-weight: bold;">
                               Dane kupującego
                           </td>
                           <td style="padding: 10px 10px 10px 10px; color: #000000; font-family: Arial, sans-sefir; font-size: 20px; text-align: left; font-weight: bold;">
                               Rezerwowane mieszkanie
                           </td>
                       </tr>
   
                       <tr>
                           <td style="padding: 10px 10px 10px 10px; color: #000000; font-family: Arial, sans-sefir; font-size: 15px; text-align: right;">
                               <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                                   <tr>
                                        <td width="35%" style="padding: 0px 20px 0 0;">
                                            Imię:
                                        </td>    
                                        <td style="text-align: left;">
                                            '. $imie.'
                                        </td>
                                   </tr>
                                   <tr>
                                        <td style="padding: 5px 20px 0 0;">
                                            Nazwisko:
                                        </td>    
                                        <td style="text-align: left;">
                                            '. $nazwisko.'
                                        </td>
                                   </tr>
                                   <tr>
                                        <td style="padding: 5px 20px 0 0;">
                                            Adres:
                                        </td>    
                                        <td style="text-align: left;">
                                            '. $adresKlienta.'
                                        </td>
                                   </tr>
                                   <tr>
                                        <td style="padding: 5px 20px 0 0;">
                                            Telefon:
                                        </td>    
                                        <td style="text-align: left;">
                                            '. $telefon.'
                                        </td>
                                   </tr>
                                   <tr>
                                        <td style="padding: 5px 20px 0 0;">
                                            E-mail:
                                        </td>    
                                        <td style="text-align: left;">
                                            '. $email.'
                                        </td>
                                   </tr>
                                </table>
                           </td>
                           <td  style="padding: 10px 10px 10px 10px; color: #000000; font-family: Arial, sans-sefir; font-size: 15px; text-align: right;">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td width="40%" style="padding: 0px 20px 0 0;">
                                            Nr. mieszkania:
                                        </td>    
                                        <td style="text-align: left;">
                                            '. $nrMieszkania.'
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px 20px 0 0;">
                                            Nr. klatki:
                                        </td>    
                                        <td style="text-align: left;">
                                            '. $nrKlatki.'
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px 20px 0 0;">
                                            Adres:
                                        </td>    
                                        <td style="text-align: left;">
                                            '. $adresMieszkania.'
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding: 5px 20px 0 0;">
                                            Powierzchnia:
                                        </td>    
                                        <td style="text-align: left;">
                                            '. $powierzchnia.'
                                        </td>
                                    </tr>
                                </table>
                           </td>
                       </tr>
                   </table>
               </td>
           </tr>
   
           <tr>
               <td colspan="2" style="padding: 10px 30px 10px 30px; color: #000000; font-family: Arial, sans-sefir; font-size: 20px; text-align: left; font-weight: bold;">
                   RACHUNEK BANKOWY
               </td>
           </tr>
           <tr>
               <td colspan="2" style="padding: 0 30px 50px 30px; color: #000000; font-family: Arial, sans-sefir; font-size: 15px; text-align: left;">
                   <p><b>Przelewy prosimy wpłacać na rachunek:</b></p>
                   mBank: 74 1140 2017 0000 4402 1300 1391<br/>
                   Rezerwacja mieszkań na ul. K. Hoffmanowej, 30-419 Kraków                    
               </td>
           </tr>
       </table>
   
   
    </body>
   </html>';


   // Wysyłanie maila
   if(mail($_POST["mail"], 'Potwierdzenie rezerwacji mieszkania', $wiadomosc, $naglowki))
   {
      echo '<div class="mail-potwierdzenie"><p>Potwierdzenie wysłano na e-mail.</p></div>';

         // Modyfikacja Bazy danych

   // ŁĄCZENIE Z BAZĄ DANYCH I WYŚWIETLANIE TABELI Z MIESZKANIAMI
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

        $sq1 = "UPDATE blok SET Stan='REZERWACJA' WHERE id = '$id'";

        $result = $dbc->query($sq1);
        //echo 'Dane zostały zaktualizowane';
        $dbc->close();
    }

   } else {
       echo "<div class='mail-potwierdzenie'><p>Błąd :( \n</p></div>";
   }

?>


<?php
    include 'menu/footer.php';
?>


</body>
</html>
