<?php
    if($_SESSION['admin'] == 1){
        echo "<a class='nav-link account_item' id='registration' href='/DBlog/account/account.php'><img src='https://img.icons8.com/ios/50/000000/businessman-filled.png'/>".$_SESSION['login']."</a>";
    }
    else{
        echo "<a class='nav-link account_item' id='registration' href='/DBlog/account/account.php'><img src='https://img.icons8.com/ios/50/000000/guest-male-filled.png'/>".$_SESSION['login']."</a>";
    }
?>