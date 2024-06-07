<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Управління пацієнтами</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .button-container {
            margin-bottom: 20px;
        }
        .button-container input[type="button"] {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 8px;
        }
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 0 auto;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Управління пацієнтами</h2>
    <div class="button-container">
        <input type="button" value="Добавити пацієнта" onclick="window.location.href='add_patient.php'">
        <input type="button" value="Видалити пацієнта" onclick="window.location.href='del_patient.php'">
        <input type="button" value="Редагувати інформацію про пацієнта" onclick="window.location.href='edit_patient.php'">
    </div>
    <h3>Список пацієнтів</h3>
    <?php
    // Подключение к базе данных
    $mysqli = new mysqli("localhost", "root", "", "test");
    if ($mysqli->connect_errno) {
        echo "Вибачте, виникла проблема на сайті";
        exit;
    }

    // Запрос к базе данных для получения данных о пациентах
    $sql = "SELECT * FROM patients";
    $result = $mysqli->query($sql);

    // Проверяем, есть ли данные
    if ($result->num_rows > 0) {
        // Выводим данные каждой строки в таблице
        echo "<table>";
        echo "<tr><th>ID</th><th>Імя</th><th>Дата Народження</th><th>Стать</th><th>Адреса</th><th>Телефон</th><th>Email</th><th>Контакт для екстрених випадків</th><th>Телефон для екстрених випадків</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["patient_id"] . "</td>";
            echo "<td>" . $row["first_name"] . " " . $row["last_name"] . "</td>";
            echo "<td>" . $row["date_of_birth"] . "</td>";
            echo "<td>" . $row["gender"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["phone"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["emergency_contact"] . "</td>";
            echo "<td>" . $row["emergency_phone"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 результатів";
    }

    $mysqli->close();
    ?>
</body>
</html>
