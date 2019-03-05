<?php
    echo "Здравствуйте,";
    echo "<br>";
    echo "<strong>";
    echo $_SESSION['login']."!";
    echo "</strong>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<hr>";

    if ($_SESSION['login']=="")
    {
        echo "<center><a href=\"auth_in.html\" target=\"REG-AUTH\">Войти</a>&emsp;<a href=\"reg.html\" target=\"CONTENT\">Регистрация</a></center>";
    }
    else
    {
        echo "<center><a href=\"authOut.php\" target=\"REG-AUTH\">Выйти</a>&emsp;<a href=\"reg.html\" target=\"CONTENT\">Регистрация</a></center>";
    }
?>
