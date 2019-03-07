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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/index.css">
</head>
<body>
    <div class="container">
        <?php
            if($_SESSION['login'] == ''){
                include('../header_footer/header.html');
            }
            else{
                include('../header_footer/header_not_auth.php');
            }
        ?>
        <div class="account_content">
            <div class='account_name'>
                <div class='account_line'></div>
                <h1>
                    <?php
                    echo '<h1>'.$_SESSION['login'].'</h1>'
                    ?>
                </h1>
            </div>
            <div class="account_information">
                <?php
                    echo '<p>'.$_SESSION['email'].'</p>'
                ?>
            </div>
            <div class="account_exit">
                <form action="" method='POST'>
                    <input type="submit" name='signOut'class='sign_out' value='Выйти из аккаунта'>
                </form>
            </div>
        </div>
        <?php
            include('../header_footer/footer.html')
        ?>
    </div>
</body>
</html>