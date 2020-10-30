<?
if ($_SESSION["user_log"] == true) {
    echo '<a href="../pages/lk.php" class="header-menu__list-link">Личный кабинет</a>';
} else {
    echo '<a href="auth.php" class="header-menu__list-link">Войти</a>';
}
?>