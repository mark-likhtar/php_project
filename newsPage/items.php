<?php
$host = "localhost";
$database = "DBlog";
$user = "mysql";
$password = "mysql";
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));

$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url)[1];
$search = $_POST['search'];
$search = trim($search);
$search = htmlspecialchars($search);


$query_name = "SELECT post.`name`, post.`content`, COUNT(post_likes.`like_id`), post.`post_id` FROM `post` LEFT OUTER JOIN `post_likes` ON post.`post_id` = post_likes.`post_id` WHERE post.`type` = 'news' GROUP BY post.`post_id` ORDER BY post.`date` DESC";
$result_name = mysqli_query($link, $query_name) or die("Ошибка " . mysqli_error($link));

$query_name_language = "SELECT post.`name`, post.`content`, COUNT(post_likes.`like_id`), post.`post_id` FROM `post` LEFT OUTER JOIN `post_likes` ON post.`post_id` = post_likes.`post_id` WHERE post.`type` = 'news' AND post.`language` = '$url' GROUP BY post.`post_id` ORDER BY post.`date` DESC";
$result_name_language = mysqli_query($link, $query_name_language) or die("Ошибка " . mysqli_error($link));

$query_search = "SELECT post.`name`, post.`content`, COUNT(post_likes.`like_id`), post.`post_id` FROM `post` LEFT OUTER JOIN `post_likes` ON post.`post_id` = post_likes.`post_id` WHERE post.`type` = 'news' AND post.`name` LIKE '%$search%' GROUP BY post.`post_id` ORDER BY post.`date` DESC";
$result_search = mysqli_query($link, $query_search) or die("Ошибка " . mysqli_error($link));

$query_language_search = "SELECT post.`name`, post.`content`, COUNT(post_likes.`like_id`), post.`post_id` FROM `post` LEFT OUTER JOIN `post_likes` ON post.`post_id` = post_likes.`post_id` WHERE post.`type` = 'news' AND post.`language` = '$url' AND post.`name` LIKE '%$search%' GROUP BY post.`post_id` ORDER BY post.`date` DESC";
$result_language_search = mysqli_query($link, $query_language_search) or die("Ошибка " . mysqli_error($link));

if (isset($_GET[$url])) {
    if (!empty($_POST['search'])) {
        if ($result_language_search) {
            $rows = mysqli_num_rows($result_language_search);
            for ($i = 0; $i < $rows; ++$i) {
                $row = mysqli_fetch_row($result_language_search);
                echo "<div class='post'>";
                echo "<a href=/DBlog/newsPage/newsPage.php?" . $row[3] . ">";
                echo "<div class='post_headline'>";
                echo $row[0];
                echo "<div class='likes'><img src='https://img.icons8.com/ios/20/000000/hearts.png'>" . $row[2] . "</div>";
                echo "</div>";
                echo "<div class='post_content'>";
                echo $row[1];
                echo "</div>";
                echo "</a>";
                echo "</div>";
            }
        }
    } elseif (empty($_POST['search'])) {
        $rows = mysqli_num_rows($result_name_language);
        for ($i = 0; $i < $rows; ++$i) {
            $row = mysqli_fetch_row($result_name_language);
            echo "<div class='post'>";
            echo "<a href=/DBlog/newsPage/newsPage.php?" . $row[3] . ">";
            echo "<div class='post_headline'>";
            echo $row[0];
            echo "<div class='likes'><img src='https://img.icons8.com/ios/20/000000/hearts.png'>" . $row[2] . "</div>";
            echo "</div>";
            echo "<div class='post_content'>";
            echo $row[1];
            echo "</div>";
            echo "</a>";
            echo "</div>";
        }
    }
} elseif (!empty($_POST['search'])) {
    if ($result_search) {
        $rows = mysqli_num_rows($result_search);
        for ($i = 0; $i < $rows; ++$i) {
            $row = mysqli_fetch_row($result_search);
            echo "<div class='post'>";
            echo "<a href=/DBlog/newsPage/newsPage.php?" . $row[3] . ">";
            echo "<div class='post_headline'>";
            echo $row[0];
            echo "<div class='likes'><img src='https://img.icons8.com/ios/20/000000/hearts.png'>" . $row[2] . "</div>";
            echo "</div>";
            echo "<div class='post_content'>";
            echo $row[1];
            echo "</div>";
            echo "</a>";
            echo "</div>";
        }
    }
} elseif (empty($_POST['search']) && !isset($_GET[$url])) {
    if ($result_name) {
        $rows = mysqli_num_rows($result_name);
        for ($i = 0; $i < $rows; ++$i) {
            $row = mysqli_fetch_row($result_name);
            echo "<div class='post'>";
            echo "<a href=/DBlog/newsPage/newsPage.php?" . $row[3] . ">";
            echo "<div class='post_headline'>";
            echo $row[0];
            echo "<div class='likes'><img src='https://img.icons8.com/ios/20/000000/hearts.png'>" . $row[2] . "</div>";
            echo "</div>";
            echo "<div class='post_content'>";
            echo $row[1];
            echo "</div>";
            echo "</a>";
            echo "</div>";
        }
    }
}
mysqli_close($link);
 ?>