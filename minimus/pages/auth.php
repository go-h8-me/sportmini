<?php
session_start();
include '../include/QueryDataBase.php';
$database = new QueryDataBase();
if (isset($_POST['reg'])) {
    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $midname = $_POST['mid_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    if ($password == $repassword) {
        $password = md5($password);
        $database->query("INSERT INTO `sport_user`(`email`, `first_name`, `last_name`, `mid_name`, `password`) VALUES ('$email','$firstname','$lastname','$midname','$password')");
        $reg = 'Вы успешно прошли регистарцию';
    } else {
        $reg = 'Пароли не совпадают';
    }
}
$_SESSION["user_log"] = false;
if (isset($_POST['enter'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    $loginResult = $database->getData("SELECT * FROM `sport_user` WHERE email = '$email' AND password = '$password'");
    if ($loginResult != []) {

        $_SESSION["user_name"] = $loginResult[0]['first_name'];
        $_SESSION["user_id"] = $loginResult[0]['id'];
        $_SESSION["user_last_name"] = $loginResult[0]['last_name'];
        $_SESSION["user_mid_name"] = $loginResult[0]['mid_name'];
        $_SESSION["user_email"] = $loginResult[0]['email'];
        $_SESSION["user_born_data"] = $loginResult[0]['born_data'];
        $_SESSION["user_log"] = true;
        header("Location: lk.php");


    } else {
        $enter = "Ошибка авторизации!";
        $_SESSION["user_log"] = false;


    }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/style.css"/>
    <link
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
            rel="stylesheet"
    />
    <script
            src="https://kit.fontawesome.com/6086c0d842.js"
            crossorigin="anonymous"
    ></script>
    <title>Тренеры Minimus</title>
</head>
<body>
<header class="header trainer">
    <div class="container">
        <nav class="header-menu">
            <ul class="header-menu__list">
                <li class="header-menu__list-item">
                    <a href="../index.php" class="header-menu__list-link"
                    ><img
                                src="../img/logo.png"
                                alt=""
                                class="header-menu__list img"
                        /></a>
                </li>
                <li class="header-menu__list-item">
                    <a href="../index.php" class="header-menu__list-link">Главная</a>
                </li>
                <li class="header-menu__list-item">
                    <a
                            href="../index.php#subscription"
                            class="header-menu__list-link"
                    >Абонементы</a
                    >
                </li>
                <li class="header-menu__list-item">
                    <a href="trainer.php" class="header-menu__list-link">Тренеры</a>
                </li>
                <li class="header-menu__list-item">
                    <a href="sale.php" class="header-menu__list-link">Акции</a>
                </li>
                <li class="header-menu__list-item">
                    <? include '../include/auth_btn.php';?>
                </li>
            </ul>
        </nav>
    </div>
</header>

<section class="auth">
    <div class="container">
        <div class="auth-forms">
            <form method="POST" name="enter" class="auth-forms__box enter">
                <h2 class="auth-title">Вход</h2>
                <input
                        type="email"
                        name="email"
                        class="auth-input"
                        placeholder="Почта"
                />
                <input
                        type="password"
                        name="password"
                        class="auth-input"
                        placeholder="Пароль"
                />
                <input type="checkbox"/> Запомнить меня
                <p><? echo $enter; ?></p>
                <input type="submit" name="enter" class="auth-btn" value="Войти"/>
            </form>
            <form method="POST" name="reg" class="auth-forms__box reg">
                <h2 class="auth-title">Регистрация</h2>
                <input
                        type="text"
                        name="first_name"
                        class="auth-input"
                        placeholder="Имя"
                />
                <input
                        type="text"
                        name="last_name"
                        class="auth-input"
                        placeholder="Фамилия"
                />
                <input
                        type="text"
                        name="mid_name"
                        class="auth-input"
                        placeholder="Отчество"
                />
                <input
                        type="email"
                        name="email"
                        class="auth-input"
                        placeholder="Почта"
                />
                <input
                        type="password"
                        name="password"
                        class="auth-input"
                        placeholder="Пароль"
                />
                <input
                        type="password"
                        name="repassword"
                        class="auth-input"
                        placeholder="Повторите пароль"
                />
                <input type="checkbox" class="checkbox" id="regCheckbox"/> Я согласен на обработку личных данных
                <p><? echo $reg; ?></p>
                <input
                        type="submit"
                        name="reg"
                        class="auth-btn"
                        id="regButton"
                        value="Зарегестрироваться"
                />
            </form>
        </div>
    </div>
</section>

<footer class="footer login">
    <div class="container">
        <div class="footer-content">
            <nav class="footer-menu">
                <ul class="footer-menu__list">
                    <li class="footer-menu__list-item">
                        <a href="../index.php" class="footer-menu__list-link"
                        >Главная</a
                        >
                    </li>
                    <li class="footer-menu__list-item">
                        <a
                                href="../index.php#subscription"
                                class="footer-menu__list-link"
                        >Абонементы</a
                        >
                    </li>
                    <li class="footer-menu__list-item">
                        <a href="trainer.php" class="footer-menu__list-link"
                        >Тренеры</a
                        >
                    </li>
                    <li class="footer-menu__list-item">
                        <a href="sale.php" class="footer-menu__list-link">Акции</a>
                    </li>
                </ul>
            </nav>
            <div class="footer-info">
                <ul class="footer-info__list">
                    <li class="footer-info__list-item">
                        Режим работы: с 9:00 до 21:00 без обедов и выходных
                    </li>
                    <li class="footer-info__list-item">
                        Адрес: Казань, Респ. Татарстан, 420014
                    </li>
                    <li class="footer-info__list-item">Всегда рады видеть вас!</li>
                </ul>
            </div>
            <div class="footer-social">
                <a href="#" class="footer-social__link"
                ><i class="fab fa-vk"></i
                    ></a>
                <a href="#" class="footer-social__link"
                ><i class="fab fa-instagram"></i
                    ></a>
                <a href="#" class="footer-social__link"
                ><i class="fab fa-telegram-plane"></i
                    ></a>
            </div>
        </div>
    </div>
</footer>
<script src="../js/app.js"></script>
</body>
</html>
