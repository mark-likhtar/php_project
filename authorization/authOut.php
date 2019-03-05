<?php
    if (session_id()=='');
        session_start();

     $_SESSION['login']="";
     $_SESSION['surname']="";
     $_SESSION['first_name']="";
     $_SESSION['second_name']="";
     $_SESSION['id']="";
    echo "<p align=\"center\"><img src=\"php.gif\" width=\"100%\" height=\"70%\"</p>";
    echo "<hr>";
    if ($_SESSION['login']=="")
    {
        echo "<center><a href=\"auth.html\" target=\"REG-AUTH\">Войти</a>&emsp;<a href=\"reg.html\" target=\"CONTENT\">Регистрация</a></center>";
    }
    else
    {
        echo "<center><a href=\"auth_out.php\" target=\"REG-AUTH\">Выйти</a>&emsp;<a href=\"reg.html\" target=\"CONTENT\">Регистрация</a></center>";
    }
?>
