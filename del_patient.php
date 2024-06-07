<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Видалити пацієнта</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        form {
            width: 50%;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="date"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 15px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 10px; /* Добавлено для перемещения кнопки ниже */
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h2>Видалити пацієнта</h2>
    <?php
        // Подключение к базе данных
        $mysqli = new mysqli("localhost", "root", "", "test");
        if ($mysqli->connect_errno) {
            echo "Вибачте, виникла проблема на сайті";
            exit;
        }

        // Подготовка запроса для выборки всех пациентов
        $s1 = $mysqli->prepare("SELECT * FROM patients");
        $s1->execute();
        
        // Получение результата запроса
        $res = $s1->get_result();
        if ($res){
            // Если есть пациенты, создаем форму для выбора пациента для удаления
            echo "<form method='post'>";
            echo "<select name='id'>";
            echo "<option value=''>Виберіть пацієнта для видалення</option>";
            while ($row = $res->fetch_assoc()) {
                $id = $row['patient_id'];
                $name = $row['first_name'] . ' ' . $row['last_name'];
                echo "<option value='$id'>$id - $name</option>";
            }
            echo "</select>";
            echo "<br>";
            echo "<input type='submit' name='del' value='Видалити пацієнта'>";
            echo "</form>";
        }
        else{
            echo "<p>Пацієнтів не знайдено</p>";
        }

        // Проверяем, была ли нажата кнопка "Удалить"
        if (isset($_POST['del'])) {
            // Если да, получаем ID пациента, который нужно удалить
            $id1=$_POST['id'];
            
            // Подготовка запроса для удаления пациента по его ID
            $s1 = $mysqli->prepare("DELETE FROM patients WHERE patient_id = ?");
            $s1->bind_param("i", $id1);
            $s1->execute();
            echo "<p>Пацієнт успішно видалено</p>";
        }
        
        // Закрываем подготовленный запрос
        $s1->close();
        
        // Закрываем соединение с базой данных
        $mysqli->close();
    ?>

    <h2>Список пацієнтів</h2>

<?php
// Подключение к базе данных
$mysqli = new mysqli("localhost", "root", "", "test");
if ($mysqli->connect_errno) {
    echo "Вибачте, виникла проблема на сайті";
    exit;
}

// Выборка данных из таблицы пациентов
$result = $mysqli->query("SELECT * FROM patients");
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>Patient ID</th><th>Імя</th><th>Призвіще</th><th>Дата народження</th><th>Стать</th><th>Адреса</th><th>Телефон</th><th>Email</th><th>Контактна особа</th><th>Телефон контактної особи</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["patient_id"]."</td>";
        echo "<td>".$row["first_name"]."</td>";
        echo "<td>".$row["last_name"]."</td>";
        echo "<td>".$row["date_of_birth"]."</td>";
        echo "<td>".$row["gender"]."</td>";
        echo "<td>".$row["address"]."</td>";
        echo "<td>".$row["phone"]."</td>";
        echo "<td>".$row["email"]."</td>";
        echo "<td>".$row["emergency_contact"]."</td>";
        echo "<td>".$row["emergency_phone"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>У базі даних немає пацієнтів</p>";
}

$mysqli->close();
?>
</body>
</html>
