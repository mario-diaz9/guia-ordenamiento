<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Merge Sort de Palabras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h2 class="text-center text-primary mb-4">Ordenamiento de Palabras con Merge Sort</h2>
            <form method="post" class="mb-4">
                <div class="mb-3">
                    <label for="palabras" class="form-label">Ingrese palabras separadas por comas:</label>
                    <input type="text" class="form-control" id="palabras" name="palabras"
                        placeholder="Ejemplo: banana, manzana, pera, uva, kiwi" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Ordenar</button>
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $input = $_POST["palabras"];

                $palabras = array_map("trim", explode(",", $input));

                function mergeSort($array)
                {
                    if (count($array) <= 1) {
                        return $array;
                    }

                    $middle = intval(count($array) / 2);
                    $left = array_slice($array, 0, $middle);
                    $right = array_slice($array, $middle);

                    $left = mergeSort($left);
                    $right = mergeSort($right);

                    return merge($left, $right);
                }

                function merge($left, $right)
                {
                    $result = [];
                    $i = $j = 0;

                    while ($i < count($left) && $j < count($right)) {
                        if (strtolower($left[$i]) <= strtolower($right[$j])) {
                            $result[] = $left[$i];
                            $i++;
                        } else {
                            $result[] = $right[$j];
                            $j++;
                        }
                    }

                    while ($i < count($left)) {
                        $result[] = $left[$i];
                        $i++;
                    }
                    while ($j < count($right)) {
                        $result[] = $right[$j];
                        $j++;
                    }

                    return $result;
                }

                echo "<div class='alert alert-secondary'><strong>Lista original:</strong> " . implode(", ", $palabras) . "</div>";
                $ordenadas = mergeSort($palabras);
                echo "<div class='alert alert-success'><strong>Lista ordenada alfabéticamente:</strong> " . implode(", ", $ordenadas) . "</div>";
            }
            ?>
        </div>
    </div>

</body>

</html>