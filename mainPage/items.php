<?php
    $host = "localhost";
    $database = "DBlog";
    $user = "mysql";
    $password = "mysql";
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));

    $query ="SELECT * FROM user";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));

    if($result)
        {
            $rows = mysqli_num_rows($result);
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                echo "<div class='items'>";
                $row = mysqli_fetch_row($result);
                for ($j = 0 ; $j < 3 ; ++$j)
 		    {
			echo $row[$j].' ';
           }
		echo "</div>";
            }
        }
    mysqli_close($link);
?>