<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertion Sort de Nombres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="text-center text-primary mb-4">Ordenamiento de Nombres con Insertion Sort</h2>

        <form method="post" class="mb-4">
            <div class="mb-3">
                <label for="nombres" class="form-label">Ingrese nombres separados por comas:</label>
                <input type="text" class="form-control" id="nombres" name="nombres" 
                       placeholder="Ejemplo: Ana, Pedro, Luis, Marta, Sofía" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Ordenar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $input = $_POST["nombres"];
            $nombres = array_map("trim", explode(",", $input));
            function insertionSort(&$array) {
                $n = count($array);
                for ($i = 1; $i < $n; $i++) {
                    $key = $array[$i];
                    $j = $i - 1;
                    while ($j >= 0 && strcasecmp($array[$j], $key) > 0) {
                        $array[$j + 1] = $array[$j];
                        $j--;
                    }
                    $array[$j + 1] = $key;
                }
            }
            echo "<div class='alert alert-secondary'><strong>Lista original:</strong> " . implode(", ", $nombres) . "</div>";
            insertionSort($nombres);
            echo "<div class='alert alert-success'><strong>Lista ordenada alfabéticamente:</strong> " . implode(", ", $nombres) . "</div>";
        }
        ?>
    </div>
</div>

</body>
</html>
