<?php
DEFINE ('DB_HOST','sql.vdl.pl');
DEFINE ('DB_USER','anathiel_dbim');
DEFINE ('DB_PASSWORD','hFYJM23U');
DEFINE ('DB_NAME','anathiel_dbim');

// połączenie z bazą.
$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) 
OR die('Nie można się połączyć z MySQL ' . mysqli_connect_error());
?>