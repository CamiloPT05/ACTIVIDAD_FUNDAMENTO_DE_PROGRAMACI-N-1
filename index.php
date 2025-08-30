<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Producción Semanal</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Producción Semanal del Operario</h1>
    <form method="POST">
        <input type="number" name="PL" placeholder="Lunes" required><br>
        <input type="number" name="PMA" placeholder="Martes" required><br>
        <input type="number" name="PMI" placeholder="Miércoles" required><br>
        <input type="number" name="PJ" placeholder="Jueves" required><br>
        <input type="number" name="PV" placeholder="Viernes" required><br>
        <input type="number" name="PS" placeholder="Sábado" required><br>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Variables de entrada
        $PL = $_POST['PL'];
        $PMA = $_POST['PMA'];
        $PMI = $_POST['PMI'];
        $PJ = $_POST['PJ'];
        $PV = $_POST['PV'];
        $PS = $_POST['PS'];

        // Producción total y promedio
        $PT = $PL + $PMA + $PMI + $PJ + $PV + $PS;
        $PP = $PT / 6;

        echo "<div class='resultado'>";
        echo "<p><b>Producción Total (PT):</b> $PT unidades</p>";
        echo "<p><b>Promedio de Producción (PP):</b> ".number_format($PP,2)." unidades</p>";

        if ($PP >= 100) {
            echo "<p class='ok'>✅ El operario recibirá incentivos</p>";
        } else {
            echo "<p class='no'>❌ El operario NO recibirá incentivos</p>";
        }
        echo "</div>";
    }
    ?>
</body>
</html>
