<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>
        Календарь
    </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="Pic/Favico.ico" type="image/x-icon">

</head>

<body>
    <div class="alert alert-primary text-center" role="alert">
        <h1>Календарь для экзаменов!</h1>
    </div>


    <?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/calender.php"; 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/Settings/dbClass.php";
    ?>

    <?php /*Получаем список доступных предметов*/

    try {
        $db=new dbMysql();
        $db->connect();
        $q = "SELECT id, title FROM subjects";
        $result = $db->Send($q);
        $db->close();
    } catch (Exception $e) {
        echo($e);
    ?>
        <script language="JavaScript">
            alert("База данных недоступна");
        </script>
    <?php
    }
    ?>




    <div class="cont" style="background-color: rgb(245, 245, 245);">
        <form action="addForm.php" method="POST">
            <div class="row justify-content-md-center g-3">
                <div class="col-sm-4">
                    <label for="date">Дата: </label>
                    <input type="date" name="date" required>
                </div>
                <div class="col-sm-3">
                    <label for="date">Время: </label>
                    <input type="time" name="time" required>
                </div>

                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="examen_id" required>
                        <option selected>Выберите экзамен</option>

                        <?php while ($row = mysqli_fetch_array($result)) : ?>
                            <option value=<?= $row['id'] ?>><?= $row['title'] ?></option>
                        <?php endwhile; ?>

                    </select>
                </div>

                <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary">Добавить экзамен</button>
                </div>

            </div>
        </form>
    </div>
</body>

</html>