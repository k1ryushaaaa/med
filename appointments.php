<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments</title>
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

<h2>Appointments</h2>

<table>
    <tr>
        <th>Appointment ID</th>
        <th>Patient ID</th>
        <th>Doctor ID</th>
        <th>Appointment Date</th>
        <th>Reason</th>
        <th>Status</th>
    </tr>

    <?php
    // Подключение к базе данных
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Запрос к базе данных
    $sql = "SELECT * FROM appointments";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Вывод данных каждой строки
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["appointment_id"]."</td>";
            echo "<td>".$row["patient_id"]."</td>";
            echo "<td>".$row["doctor_id"]."</td>";
            echo "<td>".$row["appointment_date"]."</td>";
            echo "<td>".$row["reason"]."</td>";
            echo "<td>".$row["status"]."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='6'>0 results</td></tr>";
    }
    $conn->close();
    ?>
</table>

</body>
</html>
