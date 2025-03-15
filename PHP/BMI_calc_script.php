<?php
include("php/db_connect.php");

$polaczenie = new mysqli($serwer, $user, $haslo, $baza) or die('Nie udało się połączyć z bazą danych');
$pytanie = $polaczenie->query("SELECT * FROM `content` WHERE `site`=\"bmi_calc\";");

while ($row = mysqli_fetch_array($pytanie)) {
    $title = $row["title"];
    $content = $row["article"];
    $is_admin = $_SESSION['username'] === 'Site_Admin';
        if ($is_admin) {
            echo "<h2>Edit article</h2>
            <form method=\"POST\" action=\"php/edit_bmi_article.php\">
            <input type=\"text\" name=\"title\" class=\"form-control\" value=\"$title\"> 
            <textarea  name=\"content\" rows=\"5\" cols=\"50\" class=\" mt-2 form-control\">$content</textarea> 
            <button type=\"submit\" class=\" my-2 btn btn-primary form-control\">Edit</button>
            </form>";
        } else {
            echo "<h2>$title</h2>
            <p>$content</p>";
        } 
}

$polaczenie->close();
?>
