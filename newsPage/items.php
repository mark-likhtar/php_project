<?php
    $host = "localhost";
    $database = "DBlog";
    $user = "mysql";
    $password = "mysql";
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    
    //All
    $query_name = "SELECT `name` FROM `post` WHERE `type`='news'";
    $result_name = mysqli_query($link, $query_name) or die("Ошибка " . mysqli_error($link));

    $query_content = "SELECT `content` FROM `post` WHERE `type`='news'";
    $result_content = mysqli_query($link, $query_content) or die("Ошибка " . mysqli_error($link));

    //JavaScript
    $query_name_javascript = "SELECT `name` FROM `post` WHERE `type`='news' AND `language`='javascript'";
    $result_name_javascript = mysqli_query($link, $query_name_javascript) or die("Ошибка " . mysqli_error($link));

    $query_content_javascript = "SELECT `content` FROM `post` WHERE `type`='news' AND `language`='javascript'";
    $result_content_javascript = mysqli_query($link, $query_content_javascript) or die("Ошибка " . mysqli_error($link));
    
    //PHP
    $query_name_php = "SELECT `name` FROM `post` WHERE `type`='news' AND `language`='php'";
    $result_name_php = mysqli_query($link, $query_name_php) or die("Ошибка " . mysqli_error($link));

    $query_content_php = "SELECT `content` FROM `post` WHERE `type`='news' AND `language`='php'";
    $result_content_php = mysqli_query($link, $query_content_php) or die("Ошибка " . mysqli_error($link));
    
    //C#
    $query_name_c_sharp = "SELECT `name` FROM `post` WHERE `type`='news' AND `language`='c_sharp'";
    $result_name_c_sharp = mysqli_query($link, $query_name_c_sharp) or die("Ошибка " . mysqli_error($link));

    $query_content_c_sharp = "SELECT `content` FROM `post` WHERE `type`='news' AND `language`='c_sharp'";
    $result_content_c_sharp = mysqli_query($link, $query_content_c_sharp) or die("Ошибка " . mysqli_error($link));
    
    //C++
    $query_name_c_plus = "SELECT `name` FROM `post` WHERE `type`='news' AND `language`='c_plus'";
    $result_name_c_plus = mysqli_query($link, $query_name_c_plus) or die("Ошибка " . mysqli_error($link));

    $query_content_c_plus = "SELECT `content` FROM `post` WHERE `type`='news' AND `language`='c_plus'";
    $result_content_c_plus = mysqli_query($link, $query_content_c_plus) or die("Ошибка " . mysqli_error($link));
    
    //Pyton
    $query_name_pyton = "SELECT `name` FROM `post` WHERE `type`='news' AND `language`='pyton'";
    $result_name_pyton = mysqli_query($link, $query_name_pyton) or die("Ошибка " . mysqli_error($link));

    $query_content_pyton = "SELECT `content` FROM `post` WHERE `type`='news' AND `language`='pyton'";
    $result_content_pyton = mysqli_query($link, $query_content_pyton) or die("Ошибка " . mysqli_error($link));
    
    //Ruby
    $query_name_ruby = "SELECT `name` FROM `post` WHERE `type`='news' AND `language`='ruby'";
    $result_name_ruby = mysqli_query($link, $query_name_ruby) or die("Ошибка " . mysqli_error($link));

    $query_content_ruby = "SELECT `content` FROM `post` WHERE `type`='news' AND `language`='ruby'";
    $result_content_ruby = mysqli_query($link, $query_content_ruby) or die("Ошибка " . mysqli_error($link));

    if ($_SERVER['REQUEST_URI'] === '/DBlog/newsPage/news.php'){
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
                
                $row = mysqli_fetch_row($result_content);
                echo "<div class='post_content'>";
                echo $row[0];
                echo "</div>";

		echo "</div>";
            }
        }
    }
    else if (isset($_GET['javascript'])){
        if($result_name_javascript)
        {
            $rows = mysqli_num_rows($result_name_javascript);
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                echo "<div class='post'>";
                $row = mysqli_fetch_row($result_name_javascript);
                echo "<div class='post_headline'>";
                echo $row[0];
                echo "</div>";

                $row = mysqli_fetch_row($result_content_javascript);
                echo "<div class='post_content'>";
                echo $row[0];
                echo "</div>";

		echo "</div>";
            }
        }
    }
    else if(isset($_GET['php'])){
        if($result_name_php)
        {
            $rows = mysqli_num_rows($result_name_php);
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                echo "<div class='post'>";
                $row = mysqli_fetch_row($result_name_php);
                echo "<div class='post_headline'>";
                echo $row[0];
                echo "</div>";

                $row = mysqli_fetch_row($result_content_php);
                echo "<div class='post_content'>";
                echo $row[0];
                echo "</div>";

		echo "</div>";
            }
        }
    }
    else if(isset($_GET['c_sharp'])){
        if($result_name_c_sharp)
        {
            $rows = mysqli_num_rows($result_name_c_sharp);
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                echo "<div class='post'>";
                $row = mysqli_fetch_row($result_name_c_sharp);
                echo "<div class='post_headline'>";
                echo $row[0];
                echo "</div>";

                $row = mysqli_fetch_row($result_content_c_sharp);
                echo "<div class='post_content'>";
                echo $row[0];
                echo "</div>";

		echo "</div>";
            }
        }
    }
    else if(isset($_GET['c_plus'])){
        if($result_name_c_plus)
        {
            $rows = mysqli_num_rows($result_name_c_plus);
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                echo "<div class='post'>";
                $row = mysqli_fetch_row($result_name_c_plus);
                echo "<div class='post_headline'>";
                echo $row[0];
                echo "</div>";

                $row = mysqli_fetch_row($result_content_c_plus);
                echo "<div class='post_content'>";
                echo $row[0];
                echo "</div>";

		echo "</div>";
            }
        }
    }
    else if(isset($_GET['pyton'])){
        if($result_name_pyton)
        {
            $rows = mysqli_num_rows($result_name_pyton);
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                echo "<div class='post'>";
                $row = mysqli_fetch_row($result_name_pyton);
                echo "<div class='post_headline'>";
                echo $row[0];
                echo "</div>";

                $row = mysqli_fetch_row($result_content_pyton);
                echo "<div class='post_content'>";
                echo $row[0];
                echo "</div>";

		echo "</div>";
            }
        }
    }
    else if(isset($_GET['ruby'])){
        if($result_name_ruby)
        {
            $rows = mysqli_num_rows($result_name_ruby);
            for ($i = 0 ; $i < $rows ; ++$i)
            {
                echo "<div class='post'>";
                $row = mysqli_fetch_row($result_name_ruby);
                echo "<div class='post_headline'>";
                echo $row[0];
                echo "</div>";

                $row = mysqli_fetch_row($result_content_ruby);
                echo "<div class='post_content'>";
                echo $row[0];
                echo "</div>";

		echo "</div>";
            }
        }
    }
    mysqli_close($link);
?>