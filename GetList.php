<?php

$NumberDay = $_GET['day'];
$haveExept = false;

require_once $_SERVER['DOCUMENT_ROOT'] . "/Settings/dbClass.php";

$ind=1;
try {

    $db=new dbMysql();
    $db->connect();

    $NumberDay=mysqli_real_escape_string($db->link,$NumberDay);

    $q = "SELECT DATE_FORMAT(shedule.date, '%H:%i') AS 'time', subjects.title AS 'title', GROUP_CONCAT(specialities.title SEPARATOR ', ') AS 'specialit'
    	from shedule
    	INNER JOIN subjects ON shedule.id_subject=subjects.id 

    	INNER JOIN subjects_to_specialities ON shedule.id_subject=subjects_to_specialities.id_subject
    	INNER JOIN specialities ON specialities.id=subjects_to_specialities.id_speciality
        WHERE DATE_FORMAT(shedule.date,'%d')=$NumberDay
        GROUP BY shedule.id_subject
        ORDER BY time";

    $result=$db->Send($q);
    $db->close();
} catch (Exception $e) {
    $haveExept = true;
    $infoExept = $e;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        Таблица экзаменов
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="alert alert-primary text-center" role="alert">
        <h1>Таблица экзаменов</h1>
        <br>
        <h1>
            <?php echo date($NumberDay . "-m-Y"); ?>
        </h1>
    </div>

    <?php if ($haveExept) : ?>
        <div class="cont">
            <div class="alert alert-info text-center" role="alert">
                Ошибка чтения данных
                <br>
                <?=$infoExept?>
            </div>
        </div>
    <?php 
    exit;               /*Выход из PHP*/
    endif;
    ?>

    <?php if ($result == null||$result==false||mysqli_num_rows($result)==0) : ?>
        <div class="cont">
            <div class="alert alert-info text-center" role="alert">
                Экзамены не найдены
            </div>
        </div>

    <?php else :

    ?>
        <table class="table table-striped table-dark table-hover">
            <tr>
                <th>№</th>
                <th>Время</th>
                <th>Название</th>
                <th>Группы</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($result)) : ?>
                <tr>
                    <th><?= $ind++ ?></th>
                    <th><?= $row['time'] ?></th>
                    <th><?= $row['title'] ?></th>
                    <th><?= $row['specialit'] ?></th>
                </tr>
            <?php endwhile; ?>

        </table>
    <?php endif; ?>
</body>