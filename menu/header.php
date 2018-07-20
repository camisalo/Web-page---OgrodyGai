<?php
echo '
    <header>
		<h1> <b><a href="index.php">Ogrody<span>Gai</span></a></b> </h1>
		<ul>
            <li><a class="active" href="index.php" ><b>OSIEDLE<sup></sup></b></a></li>
			<li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn"><b>DLA KLIENTA<sup></sup></b></a>
                <div class="dropdown-content">
                    <a href="oferta_M_G.php?tryb=0">GRAFICZNY WYBÓR MIESZKANIA</a>
                    <a href="oferta_M_L.php">LISTA MIESZKAŃ</a>
                </div>
            </li>
            <li><a href="galeria.php"><b>GALERIA<sup></sup></b></a></li>
            <li><a href="360.php"><b>ZDJĘCIA 360<sup>o</sup></b></a></li>
            <li><a href="login.php"><b>DLA INWESTORA<sup></sup></b></a></li>
        </ul>
    </header>';
?>