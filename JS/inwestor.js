function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function sprzedaj(id){
    console.log(id);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = async function() {
        if (this.readyState == 4 && this.status == 200) {
            await sleep(200);
            location.reload();
        }
    };
    xmlhttp.open("GET", "PHP/zmienstatus.php?id=" + id + "&stan=SPRZEDANE", true);
    xmlhttp.send();
}




function rezerwacja(id){
    console.log(id);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = async function() {
        if (this.readyState == 4 && this.status == 200) {
            await sleep(200);
            location.reload();
        }
    };
    xmlhttp.open("GET", "PHP/zmienstatus.php?id=" + id + "&stan=REZERWACJA", true);
    xmlhttp.send();
}



function dostepne(id){
    console.log(id);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = async function() {
        if (this.readyState == 4 && this.status == 200) {
            await sleep(200);
            location.reload();
        }
    };
    xmlhttp.open("GET", "PHP/zmienstatus.php?id=" + id + "&stan=DOSTEPNE", true);
    xmlhttp.send();
}



function addUser(){

    var username = $('input[name=username]').val();
    var password = $('input[name=password]').val();
    var firstname = $('input[name=firstname]').val();
    var lastname = $('input[name=lastname]').val();
    var email = $('input[name=email]').val();
    var admin = $('input[name=admin]').val();

    console.log(username);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = async function() {
        if (this.readyState == 4 && this.status == 200) {
            await sleep(1000);
            location.reload();
        }
    };
    xmlhttp.open("GET", "PHP/addUser.php?username=" + username + "&password="+password+"&firstname="+firstname+"&lastname="+lastname+"&email="+email+"&admin="+admin, true);
    xmlhttp.send();
}


function usun_uzytkownika(id) {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = async function() {
        if (this.readyState == 4 && this.status == 200) {
            await sleep(500);
            location.reload();
        }
    };
    xmlhttp.open("GET", "PHP/usun_uzytkownika.php?id=" + id, true);
    xmlhttp.send();
}



function logout(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = async function() {
        if (this.readyState == 4 && this.status == 200) {
            alert(this.responseText);
            location.href="http://onwave.eu/dyplombim/login.php";
        }
    };
    xmlhttp.open("GET", "PHP/logout.php", true);
    xmlhttp.send();
}
