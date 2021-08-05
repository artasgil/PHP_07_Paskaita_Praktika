<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2 uzduotis</title>
</head>
<body>

    <form action="antra_div.php" action="get">
        <button type="submit" name="patvirtinti">Patvirtinti</button>
    </form>
    <?php 

    function sukurtiElementa() {
        //javascript - kiekkviena karta paspaudus elementas prisikabina prie tevinio elemento

        //PHP sausainiukus

        //paspaudziam mygtuka, pasipildo masyvas, masyvas isiraso i Cookie,
        //kito paspaudimo metu pasiemama sena Cookie reiksme ir procesas kartojas

        //Jeigu sita mygtuka isivaizduotume kaip skaitikli
        //paspaudes mygtuka prie kazkokio kintamojo pridesiu +1
        //ir sita reiksme irasysiu i Cookie
       
        if(!isset($_COOKIE["skaitiklis"])) {
            $skaitiklis = 1;
            echo "<div class='elementas0'>";
            echo "Elementas0";
            echo "</div>"; 
        } else {
            $skaitiklis = intval($_COOKIE["skaitiklis"]);
            $skaitiklis++;

            for($i = 0; $i< $skaitiklis; $i++) {
                echo "<div class='elementas".$i."'>";
                echo "Elementas".$i;
                echo "</div>"; 
            }
        }

        setcookie("skaitiklis", $skaitiklis , time() + 3600, "/");
        // return "Labas";
    }

    if(isset($_GET["patvirtinti"])) {
        sukurtiElementa();
    }

    // 2. Sukurkite funkciją, kuri mygtuko paspaudimu, 
    // sukuria div elementą su klase "elementas-{index}". {index} = elemento numeris
    //elementas-1
    //elementas-2


    ?>
</body>
</html>