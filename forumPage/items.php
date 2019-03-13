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

$query_name = "SELECT forum.`name`, forum.`forum_id`, user.`name`, CAST(forum.`date` as date) FROM `forum` INNER JOIN `user` ON forum.`user_id` = user.`user_id` ORDER BY forum.`date` DESC";
$result_name = mysqli_query($link, $query_name) or die("Ошибка " . mysqli_error($link));

$query_name_language = "SELECT forum.`name`, forum.`forum_id`, user.`name`, CAST(forum.`date` as date) FROM `forum` INNER JOIN `user` ON forum.`user_id` = user.`user_id` WHERE `language`= '$url' order by forum.`date` DESC";
$result_name_language = mysqli_query($link, $query_name_language) or die("Ошибка " . mysqli_error($link));

$query_search = "SELECT forum.`name`, forum.`forum_id`, user.`name`, CAST(forum.`date` as date) FROM `forum` inner JOIN `user` ON forum.`user_id` = user.`user_id` WHERE forum.`name` LIKE '%$search%'  ORDER BY forum.`date` DESC";
$result_search = mysqli_query($link, $query_search) or die("Ошибка " . mysqli_error($link));

$query_language_search = "SELECT forum.`name`, forum.`forum_id`, user.`name`, CAST(forum.`date` as date) FROM `forum` inner JOIN `user` ON forum.`user_id` = user.`user_id` WHERE forum.`name` LIKE '%$search%'AND `language` = '$url' ORDER BY forum.`date` DESC";
$result_language_search = mysqli_query($link, $query_language_search) or die("Ошибка " . mysqli_error($link));

if (isset($_GET[$url])) {
    if (!empty($_POST['search'])) {
        if ($result_language_search) {
            $rows = mysqli_num_rows($result_language_search);
            echo "<div class='forum_items'>";
            for ($i = 0; $i < $rows; ++$i) {
                    $row = mysqli_fetch_row($result_language_search);
                    echo "<div class='question'>";
                    echo "<a href=/DBlog/forumPage/forumPage.php?" . $row[1] . ">";
                    echo "<div class='question_headline'>";
                    echo "<div class='question_name'>" . $row[0] . "</div>";
                    echo "</div>";
                    echo "<div class='question_info'>";
                    echo "<div class='question_author'>" . $row[2] . "</div>";
                    echo "<div class='question_date'>" . $row[3] . "</div>";
                    echo "</div>";
                    echo "</a>";
                    echo "</div>";
                }
            echo "</div>";
        }
    } elseif (empty($_POST['search'])) {
        $rows = mysqli_num_rows($result_name_language);
        echo "<div class='forum_items'>";
            for ($i = 0; $i < $rows; ++$i) {
                    $row = mysqli_fetch_row($result_name_language);
                    echo "<div class='question'>";
                    echo "<a href=/DBlog/forumPage/forumPage.php?" . $row[1] . ">";
                    echo "<div class='question_headline'>";
                    echo "<div class='question_name'>" . $row[0] . "</div>";
                    echo "</div>";
                    echo "<div class='question_info'>";
                    echo "<div class='question_author'>" . $row[2] . "</div>";
                    echo "<div class='question_date'>" . $row[3] . "</div>";
                    echo "</div>";
                    echo "</a>";
                    echo "</div>";
                }
            echo "</div>";
    }
} elseif (!empty($_POST['search'])) {
    if ($result_search) {
        $rows = mysqli_num_rows($result_search);
        echo "<div class='forum_items'>";
            for ($i = 0; $i < $rows; ++$i) {
                    $row = mysqli_fetch_row($result_search);
                    echo "<div class='question'>";
                    echo "<a href=/DBlog/forumPage/forumPage.php?" . $row[1] . ">";
                    echo "<div class='question_headline'>";
                    echo "<div class='question_name'>" . $row[0] . "</div>";
                    echo "</div>";
                    echo "<div class='question_info'>";
                    echo "<div class='question_author'>" . $row[2] . "</div>";
                    echo "<div class='question_date'>" . $row[3] . "</div>";
                    echo "</div>";
                    echo "</a>";
                    echo "</div>";
                }
            echo "</div>";
    }
} elseif (empty($_POST['search']) && !isset($_GET[$url])) {
    if ($result_name) {
        $rows = mysqli_num_rows($result_name);
        echo "<div class='forum_items'>";
            for ($i = 0; $i < $rows; ++$i) {
                    $row = mysqli_fetch_row($result_name);
                    echo "<div class='question'>";
                    echo "<a href=/DBlog/forumPage/forumPage.php?" . $row[1] . ">";
                    echo "<div class='question_headline'>";
                    echo "<div class='question_name'>" . $row[0] . "</div>";
                    echo "</div>";
                    echo "<div class='question_info'>";
                    echo "<div class='question_author'>" . $row[2] . "</div>";
                    echo "<div class='question_date'>" . $row[3] . "</div>";
                    echo "</div>";
                    echo "</a>";
                    echo "</div>";
                }
            echo "</div>";
    }
}

mysqli_close($link);
?>
 