<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .table-links {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .table-link {
            margin: 10px;
        }
        .table-link a {
            display: block;
            padding: 15px 25px;
            background-color: #4CAF50; /* Зеленый цвет */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            transition: background-color 0.3s ease;
        }
        .table-link a:hover {
            background-color: #45a049; /* Темнозеленый при наведении */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Tables</h1>
    <div class="table-links">
        <div class="table-link">
            <a href="appointments.php">Appointments</a>
        </div>
        <div class="table-link">
            <a href="doctors.php">Doctors</a>
        </div>
        <div class="table-link">
            <a href="patients.php">Patients</a>
        </div>
        <div class="table-link">
            <a href="prescriptions.php">Prescriptions</a>
        </div>
    </div>
</div>

</body>
</html>
