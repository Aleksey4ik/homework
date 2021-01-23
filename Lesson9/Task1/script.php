<?php
# продолжаем сессию
session_start();

$name = $_SESSION["name"];
// $age = $_SESSION["age"];
// $email = $_SESSION["email"];
// $about = $_SESSION["about"];
// $gender = $_SESSION["gender"];



echo "<h1>hello, $name</h1>";
// echo "<h3>you are $age years old</h3>";
// echo "<h3>your email: $email</h3>";
// echo "<p>about you: $about</p>";
// echo "<h3>Your gender: $gender</h3>";

if (!empty($_SESSION['image'])) {           // если передана нам данный параметр в сессии, значит юзер занрузил файл           
    echo '<h2>Файл успешно загружен!</h2><br>';
    echo '<img src="' . $_SESSION['image'] . '"/>';   // и соответственно выведем его на экран
}                                                                               // а если юзер не загружал, фото не выведет
// if ($age < 18) {
//     echo "<div><i>Контент для детей</i></div>";
// } else {
//     echo "<div><b>Контент для взрослых<b></div>";
// }

$today = date("d.m");
if ($today == '08.03' && $gender == 'female') {
    echo "<br><h1>Поздравляем Вас 8 Марта!<h1>";
}
if ($today == '14.01') {
    echo "<br><h1>Поздравляем Вас со Старым Новым Годом!))<h1>";
}

# завершаем сессию и удаляем её данные
session_destroy();
