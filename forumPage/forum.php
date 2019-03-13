<?php
    session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forum</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
        <div class='row'>
            <div class="col-md-3 language">
                    <?php
                        include('languages.php');
                    ?>
                    <?php
                        if($_SESSION['admin'] == '1'){
                            include('addButton.html');
                        }
                    ?>
            </div>
            <div class="col-md-9">
                <?php
                    include('search.html')
                ?>
                <?php
                    include('items.php');
                ?>
            </div>
        </div>
        <?php
            include('../header_footer/footer.html');
        ?>
    </div>
    <script src='../js/index.js'></script>
</body>
</html>