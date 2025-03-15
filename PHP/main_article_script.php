<?php
include("php/db_connect.php");

$polaczenie = new mysqli($serwer, $user, $haslo, $baza) or die('Nie udało się połączyć z bazą danych');
$pytanie = $polaczenie->query("SELECT * FROM `posts` ORDER BY `post_id` DESC;");

while ($row = mysqli_fetch_array($pytanie)) {
    $title = $row["title"];
    $content = $row["content"];
    $jpg = $row["image_path"];
    echo "<div class=\"row mb-5 \">
    <div class=\"col-sm-4 col-md-12 col-lg-3 mb-2 d-flex align-items-center justify-content-center\">
    <picture>
  <source media=\"(max-width: 991px)\" srcset=\"mainjpg/banner.jpg\">
  <source media=\"(min-width: 992px)\" srcset=\"mainjpg/banner2.jpg\">
  <img alt=\"article photo\" class=\"rounded article_img\" src=\"mainjpg/banner.jpg\">
</picture>
  </div>
              <div class=\"col-md-12 col-lg-5\">
                <div class=\"row\">
                  <div class=\"col-sm-9 page_header\">
                    <h4>$title</h4>
                  </div>
                </div>
                <div class=\"row\">
                  <div class=\"col-sm mx-2\">
                      <p>$content</p>
                  </div>
                </div>
            </div>
      <div class=\"col-sm-4 col-md-12 col-lg-4 d-flex align-items-center justify-content-center\">
        <img alt=\"article photo\" class=\"rounded article_img\" src=\"mainjpg/$jpg\">
      </div>
    </div>";
}

$polaczenie->close();
?>
