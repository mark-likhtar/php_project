<?php
    $host = "localhost";
    $database = "DBlog";
    $user = "mysql";
    $password = "mysql";
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));

    $url = $_SERVER['REQUEST_URI'];
    $url = explode('?', $url)[1];

    $query_name = "SELECT `name`, `content` FROM `post` WHERE `type`='lesson'";
    $result_name = mysqli_query($link, $query_name) or die("Ошибка " . mysqli_error($link));

    $query_name_language = "SELECT `name`, `content` FROM `post` WHERE `type`='lesson' AND `language`= '$url'";
    $result_name_language = mysqli_query($link, $query_name_language) or die("Ошибка " . mysqli_error($link));
    // экранирование вывод спецсимволов php

    if ($_SERVER['REQUEST_URI'] === '/DBlog/lessonsPage/lessons.php'){
        if($result_name)
        {
            $rows = mysqli_num_rows($result_name);
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                echo "<div class='post'>";
                $row = mysqli_fetch_row($result_name);
                echo "<div class='post_headline'>";
                echo $row[0];
                echo "</div>";
                echo "<div class='post_content'>";
                echo $row[1];
                echo "</div>";

		echo "</div>";
            }
        }
    }
    else if (isset($_GET[$url])){
        if($result_name_language)
        {
            $rows = mysqli_num_rows($result_name_language);
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                echo "<div class='post'>";
                $row = mysqli_fetch_row($result_name_language);
                echo "<div class='post_headline'>";
                echo $row[0];
                echo "</div>";
                echo "<div class='post_content'>";
                echo $row[1];
                echo "</div>";

		echo "</div>";
            }
        }
    }
    mysqli_close($link);
?>