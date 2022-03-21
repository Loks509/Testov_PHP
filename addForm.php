<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="8; URL=/">
    <title>
        Добавление экзамена
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="Pic/Favico.ico" type="image/x-icon">

</head>

<body>

    <?php

    require_once $_SERVER['DOCUMENT_ROOT'] . "/Settings/dbClass.php";

    $date = $_POST['date'];
    $time = $_POST['time'];
    $examen_id = $_POST['examen_id'];

    try {
        $db=new dbMysql();
        $db->connect();
        
        $date=mysqli_real_escape_string($db->link,$date);
        $time=mysqli_real_escape_string($db->link,$time);
        $examen_id=mysqli_real_escape_string($db->link,$examen_id);

        $q = "INSERT INTO shedule (id_subject, date) VALUES ($examen_id, '$date $time:00')";
        $result = $db->Send($q);
        
        $db->close();

        echo $result;
    } catch (Exception $e) { ?>

        <div class="cont alert alert-danger" role="alert">
            <?= $e ?>
        </div>

    <?php exit;
    }        /*Exit PHP */ ?>

    <div class="cont alert alert-success text-center" role="alert">
        <h1>Экзамен успешно добавлен!</h1><br>
        <h3>Вас автоматически переправит на стартовую страницу через 8 секунд<br>
            или если не хотите ждать то <a href="/">ТЫК</a></h3>

        <li>
            <?= "Дата = $date" ?>
        </li>
        <li>
            <?= "Время = $time" ?>
        </li>

    </div>


</body>