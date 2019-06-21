<?php
session_start();
$size=$_POST['size'];
$shipsNumber=$_POST['shipsNumber'];
if ($size<2 || $size>10 || $shipsNumber<2 || $shipsNumber>10) {
    header('location: index.php?err=numberWrong');
    exit;
}
if ($shipsNumber>$size*$size) {
    header('location: index.php?err=tooManyShips');
    exit;
}
$stage = array_fill(0, $size, array_fill(0, $size, 0));
$playerPoints = 0;
$computerPoints = 0;
$counter = 0;
$gameFinished = False;
$movesDone = 0;
while($counter<$shipsNumber):
	$a = rand(0,($size-1));
	$b = rand(0,($size-1));
	if ($stage[$a][$b]==0) {
		$stage[$a][$b] = 1;
		$counter++;
	}
endwhile;
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
                            echo "<h1 class=\"display-3\"><font color=\"#5cb85c\">".$playerPoints."</font> : <font color=\"#d9534f\">".$computerPoints."</font></h1><br>";
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
                            echo "<a href=\"continue.php?xcord=".$i."&ycord="."$j"."\"><i class=\"fa fa-question fa-2x\" aria-hidden=\"true\"></i></a>";
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