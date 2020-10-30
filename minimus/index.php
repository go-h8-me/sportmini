<?php
session_start();
include "include/QueryDataBase.php";
$database = new QueryDataBase();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/style.css"/>
    <link
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap"
            rel="stylesheet"
    />
    <script
            src="https://kit.fontawesome.com/6086c0d842.js"
            crossorigin="anonymous"
    ></script>
    <title>Minimus</title>
</head>
<body>
<header class="header index">
    <div class="header-dark">
        <div class="container">
            <nav class="header-menu">
                <ul class="header-menu__list">
                    <li class="header-menu__list-item">
                        <a href="index.php" class="header-menu__list-link"
                        ><img src="img/logo.png" alt="" class="header-menu__list img"
                            /></a>
                    </li>
                    <li class="header-menu__list-item">
                        <a href="#" class="header-menu__list-link">Главная</a>
                    </li>
                    <li class="header-menu__list-item">
                        <a href="#subscription" class="header-menu__list-link">Абонементы</a>
                    </li>
                    <li class="header-menu__list-item">
                        <a href="pages/trainer.php" class="header-menu__list-link"
                        >Тренеры</a
                        >
                    </li>
                    <li class="header-menu__list-item">
                        <a href="pages/sale.php" class="header-menu__list-link">Акции</a>
                    </li>
                    <li class="header-menu__list-item">
                        <?
                            if ($_SESSION["user_log"] == true) {
                            echo '<a href="pages/lk.php" class="header-menu__list-link">Личный кабинет</a>';
                            } else {
                            echo '<a href="pages/auth.php" class="header-menu__list-link">Войти</a>';
                            }
                        ?>
                    </li>
                </ul>
            </nav>
            <div class="header-content">
                <h1 class="header-content__title">Фитнес-клуб Minimus</h1>
                <p class="header-content__adress">
                    Казань, Респ. Татарстан, 420014
                </p>

                <p class="header-content__time">
                    Время работы: с 9:00 до 21:00 без обедов и выходных
                </p>

                <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4485.350059406973!2d49.10461375241576!3d55.79888058724147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x5b0126a895b9ce7d!2z0JrQsNC30LDQvdGB0LrQuNC5INC60YDQtdC80LvRjA!5e0!3m2!1sru!2sru!4v1603899227420!5m2!1sru!2sru"
                        width="600"
                        height="350"
                        frameborder="0"
                        style="border: 0"
                        allowfullscreen=""
                        aria-hidden="false"
                        tabindex="0"
                ></iframe>
            </div>
        </div>
    </div>
</header>
<section class="subscription" id="subscription">
    <div class="container">
        <? $types = $database->getData("SELECT * FROM `sport_type`");?>
        <? foreach ($types as $type):?>
        <div class="subscription-content">
            <h1 class="subscription-content__title">Абонементы в <? echo $type['name'];?></h1>
            <p class="subscription-content__subtitle">
                Закажи абонемент не отходя от компьютера
            </p>
        </div>
        <div class="subscription-grid">
            <? $items = $database->getData("SELECT * FROM `sport_sub` WHERE `type` = " . $type['id']); ?>
            <? foreach ($items as $item):?>
            <div class="subscription-grid__item">
                <h2 class="subscription-grid__item-title"><? echo $item['title'];?></h2>
                <p class="subscription-grid__item-time"><? echo $item['time'];?></p>
                <p class="subscription-grid__item-disc">
                    <? echo $item['disc'];?>
                </p>

                <a href="pages/sub_item.php?id=<? echo $item['id']; ?>" class="subscription-grid__item-btn"> Узнать цену </a>
            </div>
            <? endforeach; ?>
        </div>
        <? endforeach; ?>
    </div>
</section>

<section class="slider">
    <div class="slider-wrapper">
        <? $sliders = $database->getData("SELECT * FROM `sport_slider`"); ?>
        <? foreach ($sliders as $slider): ?>
            <div class="slider-item">
                <img src="<? echo $slider['img_path']; ?>" alt="<? echo $slider['name']; ?>"/>
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
                        <a href="#" class="footer-menu__list-link">Главная</a>
                    </li>
                    <li class="footer-menu__list-item">
                        <a href="#subscription" class="footer-menu__list-link">Абонементы</a>
                    </li>
                    <li class="footer-menu__list-item">
                        <a href="pages/trainer.php" class="footer-menu__list-link">Тренеры</a>
                    </li>
                    <li class="footer-menu__list-item">
                        <a href="pages/sale.php" class="footer-menu__list-link">Акции</a>
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

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/slider.js"></script>
</body>
</html>
