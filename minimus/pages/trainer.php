<?php
session_start();
include "../include/QueryDataBase.php";
$database = new QueryDataBase();


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
                    <? include '../include/auth_btn.php';?>
                </li>
            </ul>
        </nav>
    </div>
</header>

<section class="trainers">
    <div class="container">
        <h1 class="trainers-title">Наши тренера</h1>
        <? $types = $database->getData("SELECT * FROM `sport_type`"); ?>
        <? foreach ($types as $type): ?>
            <h1 class="trainers-type">Тренеры: <? echo $type['name']; ?></h1>
            <div class="trainers-grid">
                <? $items = $database->getData("SELECT * FROM `sport_trainer` WHERE `sport`=" . $type['id']); ?>
                <? foreach ($items as $item): ?>
                    <div class="trainers-grid__item">
                        <img
                                src="<? echo $item['img_path']; ?>"
                                alt="<? echo $item['name']; ?>"
                                class="trainers-grid__item-img"
                        />
                        <h3 class="trainers-grid__item-name"><? echo $item['name']; ?></h3>
                        <p class="trainers-grid__item-experience"><? echo $item['exp']; ?></p>
                    </div>
                <? endforeach; ?>
            </div>
        <? endforeach; ?>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <nav class="footer-menu">
                <ul class="footer-menu__list">
                    <li class="footer-menu__list-item">
                        <a href="../index.php" class="footer-menu__list-link">Главная</a>
                    </li>
                    <li class="footer-menu__list-item">
                        <a href="../index.php#subscription" class="footer-menu__list-link">Абонементы</a>
                    </li>
                    <li class="footer-menu__list-item">
                        <a href="trainer.php" class="footer-menu__list-link">Тренеры</a>
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
</body>
</html>
