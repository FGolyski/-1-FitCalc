<?php
include("PHP/db_connect.php");

$polaczenie = new mysqli($serwer, $user, $haslo, $baza) or die('Nie udało się połączyć z bazą danych');
$pytanie = $polaczenie->query("SELECT * FROM `products` ORDER BY `nazwa` ASC;");

while ($row = mysqli_fetch_array($pytanie)) {
    $id = $row["id"];
    $nazwa = $row["nazwa"];
    $kcal = $row["kcal"];
    $bialka = $row["bialka"];
    $tluszcze = $row["tluszcze"];
    $weglowodany = $row["weglowodany"];
    $autor = $row["autor"];

    echo "<div class=\"row justify-content-center mt-3\">
              <div class=\"col-sm-4\">
                  <h3>$nazwa</h3>
                  <p>Kcal: $kcal [$bialka g, $tluszcze g, $weglowodany g]</p>
              </div>
              <div class=\"col-sm-4\">
                  <p class=\"text-center\">$autor</p>
              </div>";


    $is_admin = $_SESSION['username'] === 'Site_Admin';
    if ($is_admin) {
        echo "<div class=\"col-sm-1\">
                  <form method=\"post\" action=\"php/delete_record.php\">
                
                    <input type=\"number\" class=\"form-control d-none\" name=\"id_key\" value=\"$id\" readonly>
                  </div>
                  
                  <div class=\"col-sm-2\">
                      <button type=\"submit\" value=\"delete\" class=\"btn btn-danger mt-4 mb-2\">Delete record</button>
                  </div>
                  </form>
              </div>";
    } else {
        echo "</div>";
    }
}