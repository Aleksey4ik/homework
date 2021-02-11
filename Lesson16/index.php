<?php

$apatments = [
    ['Могилев', 'ул. Симонова 33-20', 65, 150],
    ['Могилев', 'ул. Первомайская 13-25', 55, 200],
    ['Минск', 'просп. Победителей 28-11', 105, 700],
    ['Минск', 'просп. Победителей 12-8', 60, 300],
    ['Могилев', 'пер. Морозова 25', 40, 100],
    ['Могилев', 'пер. Карпинской 33-11', 75, 200]
];

class Apatment
{
    private string $city;
    private string $address;
    private int $area;
    private int $price;
} 

$host = '127.0.0.1';
$user = 'root';
$password = '';
$db = 'datebase';

$link = new mysqli($host, $user, $password, $db);

$querySql = "CREATE TABLE IF NOT EXISTS apartments(id INT PRIMARY KEY AUTO_INCREMENT,
    area INT, city VARCHAR(255), address VARCHAR(255), price INT)";
$res = $link->query($querySql);

function addApartmentIntoTable(mysqli $link, string $city, string $address, int $area, int $price = 50000): void
{
    $query = "INSERT INTO apartments(area, city, address, price) VALUES(?, ?, ?, ?)";
    $stmt = $link->prepare($query);
    $stmt->bind_param('issi', $area, $city, $address, $price);
    $stmt->execute();
    $stmt->close();
}

                                // $amountRows - максимальное количество строк для вывода
                                // $typeRutern - если аргумент не пережан в функцию, она вернер ассоциативный массив,
                                // а если передеть любое значение, тогда ф-я вернет массив объектов
function areaWithTolerance(mysqli $link, int $area, int $tolerance, int $amountRows, int $typeRutern = null): mixed
{
    $min = $area - $tolerance;
    $max = $area + $tolerance;

    $query = "SELECT * FROM apartments WHERE area BETWEEN ? AND ?";
    $stmt = $link->prepare($query);
    $stmt->bind_param('ii', $min, $max);
    $stmt->execute();
    $res = $stmt->get_result();

    $i=1;
    if ($typeRutern) {  
        while (($row = $res->fetch_object('Apatment')) && $i <= $amountRows) {
            $array[] = $row;
            $i++;
        }
    } else {
        while (($row = $res->fetch_assoc()) && $i <= $amountRows) {
            $array[] = $row;
            $i++;
        }
    }

    $res->close();
    $stmt->close();
    return $array;
}


// addApartmentIntoTable($link, 'Могилев', 'ул. Симонова 33-20', 65, 150);
// addApartmentIntoTable($link, 'Могилев', 'ул. Первомайская 13-25', 55, 200);
// addApartmentIntoTable($link, 'Минск', 'просп. Победителей 28-11', 105, 700);
// addApartmentIntoTable($link, 'Минск', 'просп. Победителей 12-8', 60, 300);
// addApartmentIntoTable($link, 'Могилев', 'пер. Морозова 25', 40, 100);
// addApartmentIntoTable($link, 'Могилев', 'пер. Карпинской 33-11', 75, 200);

foreach ($apatments as $value) {
    addApartmentIntoTable($link, $value[0], $value[1], $value[2], $value[3]);
}

print_r(areaWithTolerance($link, 50, 10, 5, 1));     
// $res->free();
$link->close();

