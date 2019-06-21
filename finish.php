<?php
session_start();
$stage = $_SESSION["stage"];
$shipsNumber = $_SESSION['shipsNumber'];
$playerPoints = $_SESSION['playerPoints'];
$computerPoints = $_SESSION['computerPoints'];
$result = count($stage)*count($stage)*2+$playerPoints*10;
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
        <div class="d-flex justify-content-center text-white pr-5">
            <h1 class="display-4">Twój wynik:</h1>
        </div>
        <div class="d-flex justify-content-center">
            <div class="flex-column text-white pr-5">
                <p>Liczba pól na planszy: <?php echo count($stage)*count($stage) ?></p>
                <p>Zatopione statki: <?php echo $playerPoints ?></p>
                <p>Razem: <?php echo count($stage)*count($stage)." x 2 + ".$playerPoints." x 10 = ".$result ?></p>
            </div>
        </div>
        <div class="d-flex justify-content-center text-white pr-5">
            <h1 class="display-4">Podaj swoje imię:</h1>
        </div>
        <div class="d-flex justify-content-center text-white pr-5">
            <form action="rank.php" method="post">
                <div class="justify-content-center p-1"><input type="text" name="name" size=15 maxsize=15 /></div>
				<input type="hidden" name="result" value="<?php echo $result; ?>" />
                <div class="d-flex p-2 justify-content-center"><input type="submit" class="btn btn-dark btn-lg" value="Zapisz" /></div>
            </form>
        </div>
    </body>
</html>