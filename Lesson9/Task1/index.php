<!doctype html>

<html lang="en">

<head>
  <title>Form</title>
</head>

<body>

  <div style="margin: 0 auto; width: 230px; border: 1px solid red; border-radius: 5px;">
    <form action="index.php" method="post" enctype="multipart/form-data">
      <div style="margin: 0 auto; width: 180px">
        <label for="name">Введите свое имя</label> <br>
        <input id="name" type="text" name="name" placeholder="Иванов Петр Вылисьевич" /> <br><br>

        <!-- <label for="age">Ваш возраст</label> <br>
        <input id="age" type="text" name="age" placeholder="25" /> <br><br>

        <label for="email">Ваш e-mail</label> <br>
        <input id="email" type="text" name="email" placeholder="petrusha@google.com" /><br><br> -->
      </div>
      <!-- <div style="margin: 0 auto; width: 180px">
        <label for="about">О себе</label> <br>
        <textarea id="about" type="text" name="about" placeholder="Несколько слов о себе" style="max-width: 180px;"></textarea>
      </div>
      <div style="padding: 5px; margin: 10px 0; background-color: #cceeaa">
        <p style="text-align: center; margin: 5px 0">CAPTCHA</p>
        <label for="captcha1">Введите результат 2+2</label>
        <input id="captcha1" type="text" name="captcha[]" placeholder="5?">
        <br> <br>
        <label for="captcha2">Напишите слово "yes" наоборот</label> <br>
        <input id="captcha2" type="text" name="captcha[]" placeholder="sey">
      </div>
      <div style="margin: 0 auto; width: 150px;">
        <span>Выбирите ваш пол</span> <br>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label>
      </div> -->
      <div>
        <label for="image">Загрузите файл изображения (jpeg, jpg, png) размером не более <b>2Мб</b></label>
        <input type="file" name="image" id="image">
      </div>
      <div style="width: 80px; margin: 10px auto;">
        <input type="submit" style="background: #0011dd; color: white; border-radius: 5px; font-weight: bold;" />
      </div>
  </div>
</body>

</html>

<?php

function isformValid(array $formData): array
{

  $mistakes = [];
  // валидация имени
  if (empty($_POST["name"])) {
    $mistakes[] = "В поле имя Вы ничего не ввели!<br>";
  } else if (!preg_match("/^[а-яА-ЯёЁa-zA-Z0-9\s]+$/u", $_POST["name"])) {
    $mistakes[] = 'В поле имя Вы ввели недопустимые символы<br><br>';
  }
  // // валидация возраста
  // if (empty($_POST["age"])) {
  //   $mistakes[] = "В поле <b>возраст</b> Вы ничего не ввели!<br>";
  // } else if (filter_var($_POST["age"], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 99]]) === false) {
  //   $mistakes[] = 'Вы ввели не корректный возраст, нужно от 1 до 99<br>';
  // }
  // // валидация email
  // if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
  //   $mistakes[] = "Вы ввели некорректный email!<br>";
  // }

  // //валидация поля О себе
  // if (empty($_POST["about"])) {
  //   $mistakes[] = "В поле \"О себе\" Вы ничего не ввели!<br>";
  // } else if (strlen(htmlspecialchars($_POST["about"])) > 300) {         // теоретически htmlspecialchars здесь не нужен, правильно?
  //   $mistakes[] = "В поле \"О себе\" Вы ввели больше 300 символов!<br>";
  // }

  // //валидация капчи
  // if ($_POST["captcha"][0] != 4 || $_POST["captcha"][1] != 'sey') {
  //   $mistakes[] = 'Вы неверно ввели значения в полях капчи!<br>';
  // }

  // //валидация пола (если он не выьран вообще)
  // if (empty($_POST["gender"])) $mistakes[] = 'Вы не выбрали Ваш пол!<br>';

  //валидация картинки если она загружена, если юзер не загрузил картинку ошибки не будет

  if (!empty($_FILES['image']['name'])) {                     // что-то друго на ум не пришло) если существует имя файла, значит что-то загрузили)
    $check = getimagesize(($_FILES['image']['tmp_name']));    // кстати, на php.net написано, что getimagesize не используйте 
    // для проверки, что файл является картинкой) 
    if ($check === false) {                                         // проверяем что файл является картинкой
      $mistakes[] = "Загруженный файл не является картинкой!";
    } else {

      if ($_FILES['image']['size'] > 2048000) {                     // проверяем что файл не более 2Мб
        $mistakes[] = 'Ошибка загрузки: Размер файла болеше 2Мб';
      }

      $pathFileSave = __DIR__ . "\\" . basename($_FILES['image']['name']);      // путь по которому будет сохранена загруженная картинка
      $fileName = basename($_FILES['image']['name']);                           // присвоим переменой имя загруженного файла
      $imageTypeFile = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));     // с переменной $fileName вернем расширение файла и переведем все символы в нижний регистр
      $allValidFormats = ['jpeg', 'jpg', 'png'];                                // создадим массив допустимых расширений 

      if (!in_array($imageTypeFile, $allValidFormats)) {                                //  проверим, соответствует ли расширение загруженного файла допустимым       
        $mistakes[] = 'Ошибка! Вы загрузили изображение недопустимого формата';
      }

      if (file_exists($pathFileSave)) {                                          // проверим сущетвует ли уже такой файл
        $mistakes[] = 'Ошибка! Такой файл уже существует';
      }
    }
  }

  return $mistakes;
}




function handleForm(): void
{
  # Если данные не были отправлены методом POST - игнор
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    return;
  }

  # Валидация
  $mistakes = isformValid($_POST);
  if (!$mistakes) {
    # начинаем новую сессию
    session_start();

    $_SESSION["name"] = $_POST["name"];
    // $_SESSION["age"] = $_POST["age"];
    // $_SESSION["email"] = $_POST["email"];
    // $_SESSION["about"] = htmlspecialchars($_POST["about"]);
    // $_SESSION["gender"] = $_POST["gender"];

    // работаем с файлом картинки    
    if (!empty($_FILES['image']['name'])) {                                 // если юзер занрузил файл, сделаем над ним следующие манипуляции)
      $pathFileSave = __DIR__ . "\\" . basename($_FILES['image']['name']);  // путь куда будем сохранять временный файл          
      $file = move_uploaded_file($_FILES['image']['tmp_name'], $pathFileSave);  // скопируем временный файл в корень     
      $_SESSION['image'] = basename($pathFileSave);                             // передадим имя файла в сессии
    }

    // var_dump($_SESSION);
    # Переход на новую страницу
    header("Location: script.php");
  } else {
    # Вывод сообщения об ошибке
    foreach ($mistakes as $value) {
      echo "$value" . "<br>";
    }
  }
}

handleForm();
