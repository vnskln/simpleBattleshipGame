<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <title>Statki</title>
        <meta charset="UTF-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="p-3 text-white">
            <h1 class="display-4">Oto zadziwiająco prosta, acz wciągająca</h1>
			<h1 class="display-1">GRA W STATKI</h1>
        </div>
		<div class="d-flex justify-content-center text-white pr-5">
			<h1 class="display-4">Zasady gry:</h1>
		</div>
		<div class="d-flex justify-content-center">
			<div class="flex-column text-white pr-5">

				<p>1. Określ na jak dużej planszy chcesz zagrać</p>
				<p>2. Wskaż liczbę okrętów</p>
				<p>3. Zatop okręty zanim zrobi to komputer</p>
				<p>4. Za każde pole na planszy otrzymasz 2 punkty</p>
				<p>5. Za każdy zatopiony statek otrzymasz 10 punktów</p>
			</div>
		</div>
		<div class="d-flex justify-content-center text-white pr-5">
			<h1 class="display-4">Ustawienia:</h1>
		</div>
        <div class="d-flex justify-content-center pr-1">
            <?php
            if ($_GET['err']=="numberWrong")
                echo "<p class=\"small text-danger\">rozmiar i liczba statków muszą być liczbami w przedziale <2,10></p>";
            if ($_GET['err']=="tooManyShips")
                echo "<p class=\"small text-danger\">zbyt dużo statków</p>";
            ?>
        </div>
		<div class="d-flex justify-content-center text-white pr-5">
			<form action="start.php" method="post">
				<div class="justify-content-center p-1"><input type="number" name="size" min="2" max="10" /> - rozmiar planszy</div>
				<div class="justify-content-center p-1"><input type="number" name="shipsNumber" min="2" max="10" /> - liczba statków</div>
				<div class="d-flex p-2 justify-content-center"><input type="submit" class="btn btn-dark btn-lg" value="Start" /></div>
			</form>
		</div>
    </body>
</html>