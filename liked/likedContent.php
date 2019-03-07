<?php
$host = "localhost";
$database = "DBlog";
$user = "mysql";
$password = "mysql";
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
$user_id = $_SESSION['id'];

$query_name = "SELECT post.`name`, post.`content`, post.`post_id` FROM `post` INNER JOIN `post_likes` ON post.`post_id` = post_likes.`post_id` WHERE post_likes.`user_id` = '$user_id' ORDER BY post_likes.`like_id` DESC";
$result_name = mysqli_query($link, $query_name) or die("Ошибка " . mysqli_error($link));

if($result_name)
        {
            $rows = mysqli_num_rows($result_name);
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                $row = mysqli_fetch_row($result_name);
                echo "<div class='post'>";
                echo "<a href=/DBlog/lessonsPage/lessonPage.php?".$row[2].">";
                echo "<div class='post_headline'>";
                echo $row[0];
                echo "</div>";
                echo "<div class='post_content'>";
                echo $row[1];
                echo "</div>";
                echo "</a>";
		        echo "</div>";
            }
        }
?>