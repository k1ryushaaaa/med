<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Редагувати інформацію про пацієнта</title>
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
        /* Добавленные стили для увеличения расстояния */
        h2 {
            margin-bottom: 20px;
        }
        /* Стили для таблицы */
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
    <h2>Редагувати інформацію про пацієнта</h2>
    <?php
        // Подключение к базе данных
        $mysqli = new mysqli("localhost", "root", "", "test");
        if ($mysqli->connect_errno) {
            echo "Вибачте, виникла проблема на сайті";
            exit;
        }

        // Запрос для выбора всех пациентов
        $s1 = $mysqli->prepare("SELECT * FROM patients");
        $s1->execute();
        $res = $s1->get_result();

        if ($res) {
            // Форма для выбора пациента для редактирования
            echo "<form method='post'>";
            echo "<select name='id'>";
            echo "<option value=''>Виберіть пацієнта для редагування інформації</option>";
            while ($row = $res->fetch_assoc()) {
                $id = $row['patient_id'];
                $name = $row['first_name'] . ' ' . $row['last_name'];
                echo "<option value='$id'>$id - $name</option>";
            }
            echo "</select>";
            echo "<br>";
            echo "<input type='submit' name='sel' value='Вибрав пацієнта для редагування інформації'>";
            echo "</form>";
        } else {
            echo "<p>Пацієнтів не знайдено</p>";
        }

        // Проверяем, был ли выбран пациент для редактирования
        if (isset($_POST['sel'])) {
            $id1 = $_POST['id'];
            
            // Запрос для получения данных выбранного пациента
            $s1 = $mysqli->prepare("SELECT * FROM patients WHERE patient_id = ?");
            $s1->bind_param("i", $id1);
            $s1->execute();
            $res1 = $s1->get_result();
            $res = $res1->fetch_assoc();

            // Форма для редактирования информации о пациенте
            echo '<form method="post">';
            echo '<input type="hidden" name="id1" value="' . $res['patient_id'] . '">';
            echo '<br><label>Імя</label><br>';
            echo '<input type="text" name="first_name" value="' . $res['first_name'] . '"><br>';
            echo '<label>Прізвище</label><br>';
            echo '<input type="text" name="last_name" value="' . $res['last_name'] . '"><br>';
            echo '<label>Дата народження</label><br>';
            echo '<input type="date" name="date_of_birth" value="' . $res['date_of_birth'] . '"><br>';
            echo '<label>Стать</label><br>';
            echo '<input type="text" name="gender" value="' . $res['gender'] . '"><br>';
            echo '<label>Адреса</label><br>';
            echo '<input type="text" name="address" value="' . $res['address'] . '"><br>';
            echo '<label>Телефон</label><br>';
            echo '<input type="text" name="phone" value="' . $res['phone'] . '"><br>';
            echo '<label>Email</label><br>';
            echo '<input type="text" name="email" value="' . $res['email'] . '"><br>';
            echo '<label>Контактна особа у разі аварії</label><br>';
            echo '<input type="text" name="emergency_contact" value="' . $res['emergency_contact'] . '"><br>';
            echo '<label>Телефон контактної особи</label><br>';
            echo '<input type="text" name="emergency_phone" value="' . $res['emergency_phone'] . '"><br>';
            echo '<input type="submit" name="upd" value="Зберегти зміни">';
            echo '</form>';
        }

        // Проверяем, была ли нажата кнопка "Сохранить изменения"
        if (isset($_POST['upd'])) {
            // Если да, получаем данные из формы
            $id1 = $_POST['id1'];
            $first_name=$_POST['first_name'];
            $last_name=$_POST['last_name'];
            $date_of_birth=$_POST['date_of_birth'];
            $gender=$_POST['gender'];
            $address=$_POST['address'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $emergency_contact=$_POST['emergency_contact'];
            $emergency_phone=$_POST['emergency_phone'];
            
            // Запрос для обновления данных пациента
            $s1 = $mysqli->prepare("UPDATE patients SET first_name=?, last_name=?, date_of_birth=?, gender=?, address=?, phone=?, email=?, emergency_contact=?, emergency_phone=? WHERE patient_id=?");
            $s1->bind_param("sssssssssi", $first_name, $last_name, $date_of_birth, $gender, $address, $phone, $email, $emergency_contact, $emergency_phone, $id1);
            $success = $s1->execute();
            if($success){
                echo "<p>Інформація про пацієнта успішно оновлена</p>";
            } else {
                echo "<p>Сталася помилка під час оновлення інформації про пацієнта</p>";
            }
            $s1->close();
        }
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
            echo "<tr><th>ID</th><th>Імя</th><th>Прізвище</th><th>Дата народження</th><th>Стать</th><th>Адреса</th><th>Телефон</th><th>Email</th><th>Контактна особа</th><th>Телефон контактної особи</th></tr>";
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
