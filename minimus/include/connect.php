<!-- Подключение к бд -->
<?php

$host='localhost';
$database='9172350836_z74';
$user='046446404_z74';
$pass='9djtk8wQ4h$e';

$link=new mysqli($host,$user,$pass,$database); //Процесс подключения к БД

if($link->connect_errno){
echo"Проблемы с БД ", mysqli_connect_error();
exit;
}
if (!$link->set_charset("utf8")) {
printf("Ошибка при загрузке набора символов utf8: %s\n", $link->error);
exit();
}

?>