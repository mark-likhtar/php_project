<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DBlog</title>
    <link rel="stylesheet" href='mainPage/index.css'>   
</head>
<body>
<?php
include('mainPage/header.html');
?>
<div class='mainContent'>
<?php
include('mainPage/categories.html');
?>
<?php
    include('mainPage/items.php')
?>
</div>
<?php
include('mainPage/footer.html');
?>
</body>
</html>