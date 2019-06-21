<?php
$name = $_POST['name'];
$result = $_POST['result'];

$mydb_connection = mysqli_connect(/*connection data*/);
if (!$mydb_connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "INSERT INTO ranking (name, points) VALUES ('$name', '$result')";

mysqli_query($mydb_connection, $query);

?>

<!DOCTYPE html>
<html lang="pl-PL">
    <head>
        <title>Gra w statki</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body style="background-color:rgb(76, 111, 168)">
        <div class="d-flex justify-content-center text-white pr-5">
            <h1 class="display-4">Ranking</h1>
        </div>
        <div class="d-flex justify-content-center text-white pr-5">
            <?php
            $result = mysqli_query($mydb_connection,"SELECT ranking.name, ranking.points FROM ranking ORDER BY points DESC");
            echo "<table class=\"table table-dark\" style=\"width:60%\">
                <thead class=\"thead-dark\">
                <tr>
                    <th scope=\"col\">#</th>
                    <th scope=\"col\">Imię</th>
                    <th scope=\"col\">Punkty</th>
                </tr>
                </thead>
                <tbody>";
                $counter = 1;
                while($row = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td>" . $counter . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['points'] . "</td>";
                    echo "</tr>";
                    $counter++;
                }
                echo "</tbody></table>";
                mysqli_close($mydb_connection);
            ?>
        </div>
        <div class="d-flex justify-content-center pr-5">
            <a href="index.php"><h1 class="display-5 text-white">Zagraj ponownie</h1></a>
        </div>
    </body>
</html>