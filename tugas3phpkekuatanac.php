<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistem Penyalaan AC</title>
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f0f2f5;
        margin: 0;
        padding: 0;
    }
    .container {
        max-width: 500px;
        margin: 60px auto;
        padding: 20px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }
    h2 {
        color: #2c3e50;
    }
    label, .result p {
        color: #34495e;
        margin-top: 10px;
    }
    input[type="number"], input[type="submit"] {
        width: 100%;
        padding: 12px;
        margin: 12px 0;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 16px;
    }
    input[type="submit"] {
        background-color: #3498db;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    input[type="submit"]:hover {
        background-color: #2980b9;
    }
    .result {
        margin-top: 20px;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Kekuatan AC</h2>
    <form method="post">
        <label for="suhu">Suhu (°C):</label>
        <input type="number" id="suhu" name="suhu" required>
        <label for="kelembaban">Kelembaban (%):</label>
        <input type="number" id="kelembaban" name="kelembaban" required>
        <input type="submit" value="Submit">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $suhu = $_POST['suhu'];
        $kelembaban = $_POST['kelembaban'];
        $status = "AC Mati";

        if ($suhu >= 30 || ($suhu >= 25 && $kelembaban > 70)) {
            $status = "AC Menyala Berat";
        } elseif ($suhu >= 25 || ($suhu >= 20 && $kelembaban > 70)) {
            $status = "AC Menyala Sedang";
        } elseif ($suhu >= 20 || ($suhu >= 15 && $kelembaban > 50)) {
            $status = "AC Menyala Rendah";
        }

        echo "<div class='result'>";
        echo "<h3>Hasil:</h3>";
        echo "<p>Suhu: $suhu °C</p>";
        echo "<p>Kelembaban: $kelembaban %</p>";
        echo "<p>Status AC: $status</p>";
        echo "</div>";
    }
    ?>
</div>
</body>
</html>
