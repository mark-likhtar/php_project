<?php
    session_start();
    if(isset($_POST['signOut'])){
        unset($_SESSION['id']);
        unset($_SESSION['login']);
        unset($_SESSION['email']);
        unset($_SESSION['admin']);
        session_destroy();
        echo "<script>location.pathname='/DBlog/newsPage/news.php'</script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account</title>
</head>
<body>
    <h1>
        <?php
        echo '<h1>'.$_SESSION['login'].'</h1>'
        ?>
    </h1>
    <form action="" method='POST'>
        <input type="submit" name='signOut'>
    </form>
</body>
</html>