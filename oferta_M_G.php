<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Osiedle</title>
      <meta http-equiv="Content-Type" content="application/xhtml+xml;
charset=UTF-8"/>
      

    <link rel="stylesheet" type="text/css" href="style/style.css"/>
    <link rel="stylesheet" type="text/css" href="style/sprzedaz.css"/>
    <link rel="stylesheet" type="text/css" href="style/G_wyb.css"/>
    <link rel="stylesheet" type="text/css" href="style/footer.css"/>

    
    <script src="JS/Start.js"></script>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="JS/jquery.maphilight.js"></script>
	<script type="text/javascript" src="JS/imageMapResizer.min.js"></script>


</head>
<body>
   
<?php
    include 'menu/header.php';
?>

<div class="image_M">
    <img src="img/perspektywa-strona.jpg"/>
</div>


<div class="kontener_na_rzuty">
    <?php
        if ($_GET['tryb']==0){
            
            echo file_get_contents('zrodla/G_mieszkania/widok',true);
        } elseif ($_GET['tryb']==1){

            if ($_GET['rzut'] == 0) {
                echo file_get_contents('zrodla/G_mieszkania/parter',true);
            } elseif ($_GET['rzut'] == 1) {
                echo file_get_contents('zrodla/G_mieszkania/pietro1',true);
            } elseif ($_GET['rzut'] == 2) {
                echo file_get_contents('zrodla/G_mieszkania/pietro2',true);
            }
        } elseif ($_GET['tryb']==2) {
            if (isset($_GET['mieszkanie'])){
                include 'PHP/loadFlat.php';
            } else {
                echo 'Nie ma takiego mieszkania';
            }
            
        } else {

            echo 'niepoprawne dane';
        }
    ?>
</div>







<?php
    include 'menu/footer.php';
?>



<script type="text/javascript">

	$(function() {
        $('.map').maphilight();
        
        $(document).ready(function() {
            $('.map').imageMapResize();
        });
	});

</script>



</body>
</html>
