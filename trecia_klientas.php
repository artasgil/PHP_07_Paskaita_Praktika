<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trecia uzduotis - klientas</title>
</head>

<body>
    <form action="trecia_klientas.php" method="get">
    <input type="text" value="id" name="id" />
    <input type="text" value="naujas_vardas" name="vardas" />
    <input type="text" value="nauja_pavarde" name="pavarde" />
    <input type="text" value="naujas_asmenskodas" name="asmens_kodas" />
    <input type="text" value="prisijungimo_data" name="prisijungimo_data" />
    <input type="text" value="naujas_adresas" name="adresas" />
    <input type="text" value="naujas_elpastas" name="elpastas" />
    <button type = "submit" name = "patvirtinti">Patvritinti</button>
    </form>
    <?php

    //3. Susikurti asociatyvų masyvą "Klientai".
    // Kintamieji:
    // vardas
    // pavarde
    // asmens kodas
    // prisijungimo data
    // adresas
    // elpastas.

    // Masyve turi būti 200 klientų. Duomenis užpildyti savo nuožiūrą.
    // Visą "Klientai" objektų masyvą atvaizduoti lentelėje <table>.
    // Visas klientų masyvas saugomas COOKIE.


    // Papildomai: Sukurti galimybę pridėti klientą į masyvą bei ištrinti.


    if(isset($_GET["patvirtinti"])) {
        $id = $_GET["id"];
        $vardas = $_GET["vardas"];
        $pavarde = $_GET["pavarde"];
        $asmens_kodas = $_GET["asmens_kodas"];
        $prisijungimo_data = $_GET["prisijungimo_data"];
        $adresas = $_GET["adresas"];
        $elpastas = $_GET["elpastas"];


        $klientai_tekstas = $_COOKIE["klientai"]."|$id,$vardas,$pavarde,$asmens_kodas,$prisijungimo_data,$adresas,$elpastas";


        setcookie("klientai",$klientai_tekstas, time() + 3600, "/");



    }

    if(!isset ($_COOKIE["klientai"])){
    $klientai = array();
    for ($i = 0; $i < 11; $i++) {
        //klientai masyva turi pildyti visa lentyna
        //turi prideti nauja masyva i 
        $klientas = array(
            "id " => $i + 1,
            "vardas" => "vardas" . ($i + 1),
            "pavarde" => "pavarde" . ($i + 1),
            "asmens_kodas" => rand(3, 4) . rand(0, 99) . rand(1, 12) . rand(1, 31) . rand(0, 9999),
            "prisijungimo_data" => rand(1950, 2021) . "-" . rand(1, 12) . "-" . rand(1, 31),
            "adresas" => "adresas" . ($i + 1),
            "elpastas" => "vardas" . ($i + 1) . "pavarde" . ($i + 1) . "@pastas.lt",
        );

        array_push($klientai, $klientas);
    }
}else {
    $klientai = $_COOKIE["klientai"];
    $klientai = explode("|", $klientai);

    for($i=0; $i < count($klientai); $i++) {
        $klientai[$i] = explode("|",$klientai[$i]);
    }
    
    
}


    echo "<table>";
    //$klientai - dvimatis masyvas;
    //$eilute - vienmatis masyvas
    //$stulpelis - masyvo elementas/arba kazkoks kintamasis
    foreach ($klientai as $eilute) {
        // Isvedineja eilutes
        echo "<tr>";
        foreach ($eilute as $stulpelis) {
            echo "<td>";
            echo $stulpelis;
            echo "</td>";
        }
        echo "</tr>";
    }



    echo "</table>";

    //kiekviena krta perkraunant puslapi kintamieji issivalo/igauna savo pradines reiksmes

    //sukuriam forma
    //ivedame duomenis
    //spaudziame mygtuka patvirtinti, musu puslapis persikrauna
    //patvirtinimo metu paimami duomenys is formos ir array_push sukeliame i klintai masyva

    //Cookies
    //Kai kuriamas musu klientai masyvas, jis issaugomas i Cookies
    //Kai masyvas yra cookies, jis yra issaugomas, mes ji galime atvaizduoti is cookies
    //mes turime issaugoje reiksmes, prie cookies galime prideti kazka naujo

    //cookie mes galime saugoti tik teksta

    
    // setcookie("klientai",$klientai, time() + 3600, "/");

//klientai dvimati pasyva pasivrsime i teksta




for($i=0; $i < count($klientai) ; $i++) {
    $klientai[$i] = implode(",", $klientai[$i]);
};

$klientai_tekstas = implode("|", $klientai);

// $klientai_tekstas = $klientai_tekstas . "|505, destytojas, destyojaspavarde, 358113934, 1976-2-23,	adresas6, vardas6pavarde6@pastas.lt";


    setcookie("klientai",$klientai_tekstas, time() + 3600, "/");




    ?>
</body>

</html>