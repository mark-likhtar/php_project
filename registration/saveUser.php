<?php
    $host = "localhost";
    $database = "DBlog";
    $user = "mysql";
    $password = "mysql";
    $link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));

    if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if (isset($_POST['repeatPassword'])) { $repeatPassword = $_POST['repeatPassword']; if ($repeatPassword == '') { unset($repeatPassword);} }
    if (isset($_POST['email'])) { $email = $_POST['email']; if ($email == '') { unset($email);} }
    
    if (empty($login) || empty($password) || empty($email)) {
        echo "<script>alert('Вы ввели не всю информацию. Все поля должны быть заполнены'); location.pathname='/DBlog/registration/registration.php'</script>";
        mysqli_close($link);
    }
    elseif(!preg_match("~[a-zA-Z\d]{5,}~", $login)) {
        echo "<script>alert('Некорректный логин.'); location.pathname='/DBlog/registration/registration.php'</script>";
        mysqli_close($link);
    }
    elseif(!preg_match("~[a-zA-Z\d]{6,}~", $password)) {
        echo "<script>alert('Некорректный пароль.'); location.pathname='/DBlog/registration/registration.php'</script>";
        mysqli_close($link);
    }
    elseif(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $email)) {
        echo "<script>alert('Некорректный E-mail.'); location.pathname='/DBlog/registration/registration.php'</script>";
        mysqli_close($link);
    }
    elseif ($password!==$repeatPassword) {
        echo "<script>alert('Пароли не совпадают.'); location.pathname='/DBlog/registration/registration.php'</script>";
        mysqli_close($link);
    }

    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $repeatPassword = stripslashes($repeatPassword);
    $repeatPassword = htmlspecialchars($repeatPassword);
    $email = stripslashes($email);
    $email = htmlspecialchars($email);
    $login = trim($login);
    $password = trim($password);
    $repeatPassword = trim($repeatPassword);
    $email = trim($email);

    $query_login ="SELECT user_id FROM `user` WHERE `name`='$login'";
    $query_email ="SELECT user_id FROM `user` WHERE `email`='$email'";
    $result_login = mysqli_query($link, $query_login) or die("Ошибка " . mysqli_error($link));
    $result_email = mysqli_query($link, $query_email) or die("Ошибка " . mysqli_error($link));
    $row_login = mysqli_fetch_row($result_login);
    $row_email = mysqli_fetch_row($result_email);
    if (!empty($row_login[0]))
    {
        echo "<script>alert('Введённый вами логин уже зарегистрирован. Введите другой.'); location.pathname='/DBlog/registration/registration.php'</script>";
        mysqli_close($link);
    }
    elseif (!empty($row_email[0]))
    {
        echo "<script>alert('Введённый вами E-mail уже зарегистрирован. Введите другой.'); location.pathname='/DBlog/registration/registration.php'</script>";
        mysqli_close($link);
    }
    else
    {
        $query ="INSERT INTO user (name, password, email) VALUES('$login','$password','$email')";
        $result2 = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    }

    mysqli_close($link);

    if ($result2=='TRUE')
    {
        echo "<script>alert('Вы успешно зарегистрированы! Теперь вы можете зайти на сайт.'); location.pathname='/DBlog/registration/registration.php'</script>";
    }
    else {
        echo "<script>alert('Ошибка! Вы не зарегистрированы.'); location.pathname='/DBlog/registration/registration.php'</script>";
        mysqli_close($link);
    }
?>