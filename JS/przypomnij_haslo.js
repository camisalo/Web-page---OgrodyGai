function przypomnij() {

    var username = $('input[name=username]').val();

    console.log(username);

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            alert(this.responseText);
            alert('elo');
            location.reload;
        }
    };
    xmlhttp.open("GET", "PHP/skryptHaslo.php?username=" + username , true);
    xmlhttp.send();
}