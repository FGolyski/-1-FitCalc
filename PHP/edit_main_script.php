<?php
include("db_connect.php");

$polaczenie = new mysqli($serwer, $user, $haslo, $baza) or die('Nie udało się połączyć z bazą danych');
$pytanie = $polaczenie->query("SELECT * FROM `posts` ORDER BY `post_id` DESC;");

while ($row = mysqli_fetch_array($pytanie)) {
    $id = $row["post_id"];
    $title = $row["title"];
    $content = $row["content"];
    echo "<form action=\"PHP/article.php\" method=\"post\">
            <div class=\"row\">
                <div>
                    <label for=\"title\">Title</label>
                    <input type=\"text\" value=\"$title\" name=\"title\" id=\"title\" class=\"form-control\">
                </div>

                <div>
                <label for=\"content\">Article</label>
                <textarea name=\"content\" rows=\"5\" cols=\"50\" id=\"content\"  class=\"form-control\">$content</textarea>
                </div>

            </div>

            <div class=\"row mb-5\">
                <div class=\"col sm-6\">
                      <button type=\"submit\" name=\"action\" value=\"change\"  class=\"btn btn-success form-control\">Edit</button>
                </div>
                      <input type=\"text\" value=$id name=\"post_id\"  class=\"form-control d-none\" readonly>

                <div class=\"col sm-6\">
                      <button type=\"submit\" value=\"delete\" name=\"action\" class=\"btn btn-danger form-control\">Delete</button>
                </div>
            </div>
</form>";
}

$polaczenie->close();
?>
