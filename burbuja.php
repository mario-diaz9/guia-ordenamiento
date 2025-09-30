<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bubble Sort Descendente en PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="text-center text-primary mb-4">Ordenamiento con Bubble Sort (Descendente)</h2>
        <form method="post" class="mb-4">
            <div class="mb-3">
                <label for="numeros" class="form-label">Ingrese números separados por comas:</label>
                <input type="text" class="form-control" id="numeros" name="numeros" placeholder="Ejemplo: 34, -5, 23, 0, -12, 90" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Ordenar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input = $_POST["numeros"];
            $numeros = array_map("intval", explode(",", str_replace(" ", "", $input)));
            function bubbleSortDesc(&$array) {
                $n = count($array);
                for ($i = 0; $i < $n - 1; $i++) {
                    for ($j = 0; $j < $n - $i - 1; $j++) {
                        if ($array[$j] < $array[$j + 1]) {
                            $temp = $array[$j];
                            $array[$j] = $array[$j + 1];
                            $array[$j + 1] = $temp;
                        }
                    }
                }
            }
            echo "<div class='alert alert-secondary'><strong>Lista original:</strong> " . implode(", ", $numeros) . "</div>";
            bubbleSortDesc($numeros);
            echo "<div class='alert alert-success'><strong>Lista ordenada (descendente):</strong> " . implode(", ", $numeros) . "</div>";
        }
        ?>
    </div>
</div>

</body>
</html>
