<?php
session_start();
//player move
$stage = $_SESSION["stage"];
$shipsNumber = $_SESSION['shipsNumber'];
$xcord = $_GET['xcord'];
$ycord = $_GET['ycord'];
$stage = $_SESSION['stage'];
$playerPoints = $_SESSION['playerPoints'];
$computerPoints = $_SESSION['computerPoints'];
$gameFinished = $_SESSION['gameFinished'];
$movesDone = $_SESSION['movesDone'];

//check if game is finished
$computerMoveDone = False;
if ($playerPoints + $computerPoints >= $shipsNumber)
{
    $gameFinished = True;
    $computerMoveDone = True;
}

//player move
if ($gameFinished == False) {
    if ($stage[$xcord][$ycord] == 0) {
        $stage[$xcord][$ycord]=2;
		$movesDone++;
	}
    if ($stage[$xcord][$ycord] == 1) {
        $stage[$xcord][$ycord] = 3;
        $playerPoints++;
		$movesDone++;
    }
}

//computer move
while (!$computerMoveDone && $movesDone != count($stage)*count($stage)) {
    $a = rand(0,(count($stage)-1));
    $b = rand(0,(count($stage)-1));
    if ($stage[$a][$b]==0) {
        $stage[$a][$b] = 4;
        $computerMoveDone=True;
		$movesDone++;
    }
    if ($stage[$a][$b]==1) {
        $stage[$a][$b] = 5;
        $computerMoveDone=True;
        $computerPoints++;
		$movesDone++;
    }
}

//check if game is finished
$computerMoveDone = False;
if ($playerPoints + $computerPoints >= $shipsNumber)
{
    $gameFinished = True;
    if ($shipsNumber % 2 == 1)
        $computerMoveDone = True;
}

//adding to session
$_SESSION['stage'] = $stage;
$_SESSION['playerPoints'] = $playerPoints;
$_SESSION['computerPoints'] = $computerPoints;
$_SESSION['shipsNumber'] = $shipsNumber;
$_SESSION['gameFinished'] = $gameFinished;
$_SESSION['movesDone'] = $movesDone;
?>

<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <title>Gra w statki</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="container justify-content-center text-white pt-5">
            <div class="row">
                <div class="col">
                    <div>
                        <h1 class="display-4">
                        <?php
                        echo "CELE: ".($playerPoints + $computerPoints)."/".$shipsNumber;
                        ?>
                        </h1>
                    </div>
                    <div>
                        <h1 class="display-4">
                            <?php
                            echo "<br>PUNKTACJA:<br>";
                            echo "<h1 class=\"display-3\"><font color=\"#5cb85c\">".$playerPoints."</font> : <font color=\"#d9534f\">".$computerPoints."</font></h1><br><br>";
                            if ($gameFinished) {
                                if ($playerPoints>$computerPoints) {
                                    echo "<br><br><h1 class=\"display-2 text-success\">ZWYCIĘSTWO</h1>";
                                    echo "<a href=\"finish.php\"><h1 class=\"display-5 text-success\">ZAPISZ SWÓJ WYNIK</h1></a>";
                                }
                                else if ($playerPoints<$computerPoints) {
                                    echo "<h1 class=\"display-2 text-danger\">PRZEGRANA</h1><br>";
                                    echo "<a href=\"index.php\"><h1 class=\"display-5 text-danger\">ZAGRAJ PONOWNIE</h1></a>";
                                }
                                else {
                                    echo "<h1 class=\"display-2 text-white\">REMIS</h1><br>";
                                    echo "<a href=\"index.php\"><h1 class=\"display-5 text-white\">ZAGRAJ PONOWNIE</h1></a>";
                                }
                            }
                            ?>
                        </h1>
                    </div>
                </div>
                <div class="col">
                    <?php
                    echo "<table>";
                    for ($i = 0; $i < count($stage); $i++) {
                        echo "<tr>";
                        for ($j = 0; $j < count($stage); $j++) {
                            echo "<td>";
                            if (($stage[$i][$j] == 0 || $stage[$i][$j] == 1) && $gameFinished==False)
                                echo "<a href=\"continue.php?xcord=".$i."&ycord="."$j"."\"><i class=\"fa fa-question fa-2x\" aria-hidden=\"true\"></i><a/>";
                            if (($stage[$i][$j] == 0 || $stage[$i][$j] == 1) && $gameFinished==True)
                                echo "<i class=\"fa fa-times fa-2x text-white\" aria-hidden=\"true\"></i>";
                            if ($stage[$i][$j] == 2)
                                echo "<i class=\"fa fa-times fa-2x text-success\" aria-hidden=\"true\"></i>";
                            if ($stage[$i][$j] == 3)
                                echo "<i class=\"fa fa-ship fa-2x text-success\" aria-hidden=\"true\"></i>";
                            if ($stage[$i][$j] == 4)
                                echo "<i class=\"fa fa-times fa-2x text-danger\" aria-hidden=\"true\"></i>";
                            if ($stage[$i][$j] == 5)
                                echo "<i class=\"fa fa-ship fa-2x text-danger\" aria-hidden=\"true\"></i>";
                            echo "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>