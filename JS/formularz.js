
function B_wczytaj(B){
    var arrayTR = document.getElementsByTagName("tr");
    var i;
    for (i=0; i<arrayTR.length; i++) {
        arrayTR[i].style.backgroundColor = 'initial';
    }

    var id = B.id;
    document.getElementById(id).style.backgroundColor = 'rgb(178, 178, 178)';


    document.getElementById('rzut').src = "rzuty/" + id + ".jpg";
    var lok = document.getElementById('lok');



    // dodawanie danych do formularza
    var child = B.children;

    console.log("start");
    document.getElementsByName("id")[0].value = id;
    document.getElementsByName('nrMieszkania')[0].value = child[1].innerHTML;
    document.getElementsByName("nrKlatki")[0].value = child[2].innerHTML;
    document.getElementsByName("adresMieszkania")[0].value = "ul. K. Hoffmanowej 6A,<br/> 30-419 Kraków";
    document.getElementsByName("powierzchnia")[0].value = child[3].innerHTML;
    
    if (child[10].innerHTML == "SPRZEDANE"){
        document.getElementById("przycisk_f").disabled = true;
        document.getElementById("komunikat").innerHTML = "Niestety mieszkanie zostało już sprzedane";
    } else if (child[10].innerHTML == "REZERWACJA"){
        document.getElementById("przycisk_f").disabled = false;
        document.getElementById("komunikat").innerHTML = "Mieszkanie zostało zarezerwowane. W przypadku rezygnacji poprzedniego kupującego skontaktujemy się z Państwem.";
    } else {
        document.getElementById("przycisk_f").disabled = false;
        document.getElementById("komunikat").innerHTML = "";
    }


}
