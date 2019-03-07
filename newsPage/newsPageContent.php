<?php
    $host = "localhost";
    $database = "DBlog";
    $user = "mysql";
    $password = "mysql";
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));

    $url = $_SERVER['REQUEST_URI'];
    $url = explode('?', $url)[1];
    $user_id = $_SESSION['id'];

    $query_name = "SELECT post.`name`, post.`content`, COUNT(`like_id`) FROM `post` INNER JOIN `post_likes` ON post.`post_id` = post_likes.`post_id` WHERE post.`post_id`='$url'";
    $result_name = mysqli_query($link, $query_name) or die("Ошибка " . mysqli_error($link));
    $query_like = "INSERT INTO `post_likes`(`post_id`, `user_id`) VALUES ('$url', '$user_id')";

    if($result_name)
    {
        $rows = mysqli_num_rows($result_name);
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result_name);
        }
        if (isset($_POST['likeBut']))
        {
            mysqli_query($link, $query_like) or die("Ошибка ". mysqli_error($link));
        }
        echo "<div class='page_headline'>";
        echo "<div class='page_headline_head'>";
        echo "<div class='line'></div>";
        echo $row[0];
        echo "</div>";
        echo "<div class='page_likes' >";
        echo "<div><form method='POST' onsubmit='show()'><input type='submit' name='likeBut' value='' id='sub'/></form></div>"."<div id='likesCount'>".$row[2]."</div>";
        echo "</div>";
        echo "</div>";
        echo "<div class='page_content'>";
        echo $row[1];
        echo "</div>";
    }
    
?>
<script> 
    $('#likesCount').load(document.URL +  ' #likesCount');
</script>