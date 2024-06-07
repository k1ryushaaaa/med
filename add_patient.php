<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Добавити пацієнта</title>
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
    <h2>Добавити нового пацієнта</h2>
    <!-- Форма добавления пациента -->
    <form method="post">
        <label>Ім'я</label><br>
        <input type="text" name="first_name"><br>
        <label>Призвіще</label><br>
        <input type="text" name="last_name"><br>
        <label>Дата народження</label><br>
        <input type="date" name="date_of_birth"><br>
        <label>Стать</label><br>
        <input type="text" name="gender"><br>
        <label>Адреса</label><br>
        <input type="text" name="address"><br>
        <label>Телефон</label><br>
        <input type="text" name="phone"><br>
        <label>Email</label><br>
        <input type="text" name="email"><br>
        <label>Контактна особа у разі аварії</label><br>
        <input type="text" name="emergency_contact"><br>
        <label>Телефон контактної особи</label><br>
        <input type="text" name="emergency_phone"><br>
        <input type="submit" name="sub" value="Добавити">
    </form>

    <?php
        // Подключение к базе данных
        $mysqli = new mysqli("localhost", "root", "", "test");
        if ($mysqli->connect_errno) {
            echo "Вибачте, виникла проблема на сайті";
            exit;
        }

        // Добавление нового пациента
        if(isset($_POST['sub'])){
            $first_name=$_POST['first_name'];
            $last_name=$_POST['last_name'];
            $date_of_birth=$_POST['date_of_birth'];
            $gender=$_POST['gender'];
            $address=$_POST['address'];
            $phone=$_POST['phone'];
            $email=$_POST['email'];
            $emergency_contact=$_POST['emergency_contact'];
            $emergency_phone=$_POST['emergency_phone'];
            $s1 = $mysqli->prepare("INSERT INTO patients (first_name, last_name, date_of_birth, gender, address, phone, email, emergency_contact, emergency_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $s1->bind_param("sssssssss", $first_name, $last_name, $date_of_birth, $gender, $address, $phone, $email, $emergency_contact, $emergency_phone);
            $success = $s1->execute();
            $s1->close();
            
            if($success){
                echo "<p>Дані успішно додані</p>";
                // Перенаправление на эту же страницу после добавления данных
                header("Location: ".$_SERVER['PHP_SELF']);
                exit;
            } else {
                echo "<p>Виникла помилка при додаванні даних</p>";
            }
        }

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
        echo "<tr><th>Patient ID</th><th>Имя</th><th>Фамилия</th><th>Дата рождения</th><th>Пол</th><th>Адрес</th><th>Телефон</th><th>Email</th><th>Контактное лицо</th><th>Телефон контактного лица</th></tr>";
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
