<?php
    $host = "localhost";
    $database = "DBlog";
    $user = "mysql";
    $password = "mysql";
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));

    $url = $_SERVER['REQUEST_URI'];
    $url = explode('?', $url)[1];

    $query_name = "SELECT `name`, `content`, `likes` FROM `post` WHERE `post_id`='$url'";
    $result_name = mysqli_query($link, $query_name) or die("Ошибка " . mysqli_error($link));

    if($result_name)
    {
        $rows = mysqli_num_rows($result_name);
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result_name);
            echo "<div class='page_headline'>";
            echo "<div class='page_headline_head'>";
            echo "<div class='line'></div>";
            echo $row[0];
            echo "</div>";
            echo "<div class='page_likes'>";
            echo "<div><form method='POST'><input type='submit' name='likeBut' value=''/></form></div>"."<div>".$row[2]."</div>";
            echo "</div>";
            echo "</div>";
            echo "<div class='page_content'>";
            echo $row[1];
            echo "</div>";
        }
    }
    if (isset($_POST['likeBut']))
    {
        $likeCount=++$row[2];
        $query_like = "UPDATE `post` SET `likes`='$likeCount' WHERE `post_id` = '$url'";
        mysqli_query($link, $query_like) or die("Ошибка ". mysqli_error($link));
    }
    mysqli_close($link);
?>