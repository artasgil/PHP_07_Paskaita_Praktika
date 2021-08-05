<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="pirma_cookies.php" method="get">
        <input type="text" placeholder="Suveskite ka norite išsaugoti" name="reiksme" />
        <button type="submit" name="issaugoti">Issaugoti</button>
    </form>
    <?php
    //Implode - funkcija, kuri masyva pavercia i teksta
    //Explode - funkcija, kuri pavercia teksta i masyva
    function pridetiElementa() {
        if (isset($_GET["reiksme"]) && !empty($_GET["reiksme"])) {

            $reiksme = $_GET["reiksme"];
            if (isset($_COOKIE["reiksme"])) {
                $reiksmeMasyvas = explode("|",  $_COOKIE["reiksme"]);
            } else {
                $reiksmeMasyvas = array();
            }
            array_push($reiksmeMasyvas, $reiksme);

            setcookie("reiksme", implode("|", $reiksmeMasyvas), time() + 3600, "/");


        }
    }

    if (isset($_GET["issaugoti"])) {
        pridetiElementa();
    }






    ?>




</body>

</html>