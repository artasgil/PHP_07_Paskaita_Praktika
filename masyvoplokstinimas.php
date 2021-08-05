<?php 




//Kintamaji $tekstas = "1,2,3,4,5,6". Paversti i masyva



$tekstas = "1,2,3,4,5,6";

$masyvas = explode(",", $tekstas);

var_dump($masyvas);


//Masyva $masyvas paversti i teksta, kuriame kiekvienas elementas yra atskiriamas tasku

$naujas_tekstas=implode(".", $masyvas);


$naujas_tekstas = $naujas_tekstas.".7.8.9.101|44";
echo $naujas_tekstas;

$naujas_masyvas = explode(".", $naujas_tekstas);
var_dump($naujas_masyvas);
echo "<br>";
echo "<br>";




//Sita dvimati pasyva paversti teksta
$dvimatismasyvas = array(
    array("vardas", "pavarde", "telefonas"),  // => "vardas, pavarde, telefonas
    array("vardas1", "pavarde1", "telefonas1"), // => "vardas1, pavarde1, telefonas1
    array("vardas2", "pavarde2", "telefonas2"), // => "vardas2, pavarde2, telefonas2

);

var_dump ($dvimatismasyvas);
echo "<br>";
echo "<br>";

for($i=0; $i < count($dvimatismasyvas) ; $i++) {
    $dvimatismasyvas[$i] = implode(",", $dvimatismasyvas[$i]);
};

var_dump($dvimatismasyvas);
echo "<br>";
echo "<br>";


$dvimacio_tekstas = implode("|", $dvimatismasyvas);

echo $dvimacio_tekstas;
echo "<br>";
echo "<br>";

$dvimacio_tekstas = $dvimacio_tekstas . "|vardas3,pavarde3,telefonas3";

echo $dvimacio_tekstas;
echo "<br>";
echo "<br>";


//  $dvimacio_tekstas paversti atgal i dvimati masyva
// 2 kartus naudoti explode
//turima teksta paverciam i vienmati masyva, o to vienmacio masyvo visus elementus paverciam i dvimati

$atkurtas_masyvas = explode("|", $dvimacio_tekstas);
//vienmatis masyvas
var_dump($atkurtas_masyvas);
echo "<br>";
echo "<br>";
//dvimatis masyvas

for($i=0; $i < count($atkurtas_masyvas) ; $i++) {
    $atkurtas_masyvas[$i] = explode(",", $atkurtas_masyvas[$i]);
};

var_dump($atkurtas_masyvas);


?>