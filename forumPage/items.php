<?php
    $host = "localhost";
    $database = "DBlog";
    $user = "mysql";
    $password = "mysql";
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    $url = $_SERVER['REQUEST_URI'];
    $url = explode('?', $url)[1];

    $query_name = "SELECT forum.`name`, forum.`forum_id`, user.`name` FROM `forum` INNER JOIN `user` ON forum.`user_id` = user.`user_id`";
    $result_name = mysqli_query($link, $query_name) or die("Ошибка " . mysqli_error($link));
    
    $query_name_language = "SELECT forum.`name`, forum.`forum_id`, user.`name` FROM `forum` INNER JOIN `user` ON forum.`user_id` = user.`user_id` WHERE `language`= '$url'";
    $result_name_language = mysqli_query($link, $query_name_language) or die("Ошибка " . mysqli_error($link));

    if (isset($_GET[$url])){
        if($result_name_language)
        {
            $rows = mysqli_num_rows($result_name_language);
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                $row = mysqli_fetch_row($result_name_language);
                echo "<div class='question'>";
                echo "<a href=/DBlog/forumPage/forumPage.php?".$row[1].">";
                echo "<div class='question_headline'>";
                echo "<div class='question_circle'></div>";
                echo "<div class='question_name'>".$row[0]."</div>";
		        echo "</div>";
                echo "<div class='question_author'>".$row[2]."</div>";
                echo "</a>";
		        echo "</div>";
            }
        }
    }
    else {
        if($result_name)
        {
            $rows = mysqli_num_rows($result_name);
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                $row = mysqli_fetch_row($result_name);
                echo "<div class='question'>";
                echo "<a href=/DBlog/forumPage/forumPage.php?".$row[1].">";
                echo "<div class='question_headline'>";
                echo "<div class='question_circle'></div>";
                echo "<div class='question_name'>".$row[0]."</div>";
		        echo "</div>";
                echo "<div class='question_author'>".$row[2]."</div>";
                echo "</a>";
		        echo "</div>";
            }
        }
    }
    
    mysqli_close($link);
?>