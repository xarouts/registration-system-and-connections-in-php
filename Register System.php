<html>

<head>
    <title>
       Register
    </title>

    <?php

    $host = "localhost";
    $dbname = "egrfiphp";
    $username = "root";
    $password = "";


    $sindesi_db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    if (isset($_POST["su"])) {
        $lathi = [];
        if (isset($_POST['on']) && strlen($_POST['on']) < 3) {
            $lathi["ono"] = "το ονομα χρηστη ειναι πολυ μικρο";
        }

        if (isset($_POST['on']) && empty($_POST['on'])) {
            $lathi["ono"] = "το ονομα χρηστη δεν μπορη να ειναι κενο";
        }


        if (isset($_POST['kod']) && strlen($_POST['kod']) < 8) {
            $lathi["kodi"] = "ο κοδικος δεν μπορη να ειναι μικροτερος απο 8 χαρακρηρες";
        }

        if (isset($_POST['kod']) && empty($_POST['kod'])) {
            $lathi["kodi"] = "ο κοδικος δεν μπορη να ειναι κενο";
        }
    }


    ?>
    
</head>

<body>
    <div style="text-align: left;" class="form-group">
        <form action="" method="post">
            Username<br>
            <input type="text" name="on"><br>
            <br>
            <?php if (isset($lathi["ono"])) {
                print($lathi["ono"]);
            } ?><br>
            <br>
            Password<br>
            <input type="password" name="kod"><br>
            <?php if (isset($lathi["kodi"])) {
                print($lathi["kodi"]);
            } ?><br>
            <br>
            <button type="submit" name="su" class="btn btn-primary">Submit </button> <a href="login.php">Login</a> <br>
            <?php


            if (!isset($onoma) && !isset($kodikos)) {
                $onoma = "";
                $kodikos = "";
            }
            if (isset($_POST["su"])) {
                if (!isset($lathi["ono"]) && !isset($lathi["kodi"])) {

                    $onoma = $_POST['on'];
                    $kodikos = $_POST['kod'];


                    $inserts = "INSERT INTO egrafes (onomaxristi,kodikoprosbasis) VALUES (:onom,:kodik)";

                    $pinadtistix = $sindesi_db->prepare($inserts);
                    $pinadtistix->execute(["onom" => $onoma, "kodik" => $kodikos]);

                    if (isset($pinadtistix)) {
                        print("i egrafi kataxorithike me epitixia");
                    }
                }
            }



            ?>
        </form>
    </div>

</body>

</html>
