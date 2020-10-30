<?php
session_start();
include '../include/QueryDataBase.php';
$database = new QueryDataBase();
if (isset($_POST['exit'])) {
    session_destroy();
    header("Refresh:0; url=../index.php");
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
                    <a href="../index.php#subscription" class="header-menu__list-link">Абонементы</a>
                </li>
                <li class="header-menu__list-item">
                    <a href="trainer.php" class="header-menu__list-link">Тренеры</a>
                </li>
                <li class="header-menu__list-item">
                    <a href="sale.php" class="header-menu__list-link">Акции</a>
                </li>
                <li class="header-menu__list-item">
                    <? include '../include/auth_btn.php'; ?>
                </li>
            </ul>
        </nav>
    </div>
</header>

<section class="profile">
    <div class="container">
        <div class="profile-content">
            <div class="profile-row">
                <h4 class="profile-row__title">Имя: </h4>
                <p class="profile-row__disc"><? echo $_SESSION["user_name"]; ?></p>
            </div>
            <div class="profile-row">
                <h4 class="profile-row__title">Фамилия: </h4>
                <p class="profile-row__disc"><? echo $_SESSION["user_last_name"]; ?></p>
            </div>
            <div class="profile-row">
                <h4 class="profile-row__title">Отчество: </h4>
                <p class="profile-row__disc"><? echo $_SESSION["user_mid_name"]; ?></p>
            </div>
            <div class="profile-row">
                <h4 class="profile-row__title">Email:</h4>
                <p class="profile-row__disc"><? echo $_SESSION["user_email"]; ?></p>
            </div>
            <div class="profile-row">
                <h4 class="profile-row__title">Дата рождения:</h4>
                <p class="profile-row__disc"><? echo $_SESSION["user_born_data"]; ?></p>
            </div>
            <form method="post" name="exit">
                <input type="submit" name="exit" value="Выйти" class = "profile-exit__btn">
            </form>
            <div class="subscription-grid">
                <? $subs = $database->getData("SELECT * FROM `sport_order` WHERE `user_id`=" . $_SESSION["user_id"]); ?>
                <? foreach ($subs as $sub): ?>
                    <? $items = $database->getData("SELECT * FROM `sport_sub` WHERE `id`=" . $sub['item_id']); ?>
                    <? foreach ($items as $item): ?>
                        <div class="subscription-grid__item">
                            <h2 class="subscription-grid__item-title"><? echo $item['title']; ?></h2>
                            <p class="subscription-grid__item-time"><? echo $item['time']; ?></p>
                            <p class="subscription-grid__item-disc">
                                <? echo $item['disc']; ?>
                            </p>

                            <a href="" class="subscription-grid__item-btn"> <? echo $item['price']; ?> Рублей</a>
                        </div>
                    <? endforeach; ?>
                <? endforeach; ?>
            </div>
        </div>
    </div>
</section>

<footer class="footer">
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
                        <a href="../index.php#subscription" class="footer-menu__list-link">Абонементы</a>
                    </li>
                    <li class="footer-menu__list-item">
                        <a href="trainer.php" class="footer-menu__list-link"
                        >Тренеры</a
                        >
                    </li>
                    <li class="footer-menu__list-item">
                        <a href="#" class="footer-menu__list-link">Акции</a>
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
</body>
</html>
