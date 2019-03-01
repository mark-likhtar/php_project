<?php
    $host = "localhost";
    $database = "DBlog";
    $user = "mysql";
    $password = "mysql";
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));

    $query ="SELECT distinct `language` FROM `post`";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    if($result)
    {
        echo "<div class='language_list'>";
        $rows = mysqli_num_rows($result);
        for ($i = 0 ; $i < $rows ; ++$i)
        {
            $row = mysqli_fetch_row($result);
            echo "<a id=".$row[0]." href=?".$row[0].">".ucfirst($row[0])."</a>";
        }
        echo "</div>";
    }
mysqli_close($link);
?>