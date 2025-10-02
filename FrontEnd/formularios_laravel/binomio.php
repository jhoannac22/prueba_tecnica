<!DOCTYPE html>
<html>
<head>
    <title>Potencia de binomio</title>
</head>
<body>
    <h2>Potencia de binomio (a + b)<sup>n</sup></h2>

    <form method="post">
        Ingrese el exponente n: 
        <input type="number" name="n" required>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $n = intval($_POST['n']);

        // Función para generar los coeficientes usando recursión
        function coeficiente($n, $k) {
            if ($k == 0 || $k == $n) return 1;
            return coeficiente($n - 1, $k - 1) + coeficiente($n - 1, $k);
        }

        echo "<p>Resultado de (a + b)<sup>$n</sup>:</p>";
        $resultado = [];
        for ($k = 0; $k <= $n; $k++) {
            $c = coeficiente($n, $k);
            $a = "a" . ($n - $k > 1 ? "^" . ($n - $k) : ($n - $k == 1 ? "" : "")) ;
            $b = "b" . ($k > 1 ? "^$k" : ($k == 1 ? "" : "")) ;
            $resultado[] = "{$c}{$a}{$b}";
        }
        echo implode(" + ", $resultado);
    }
    ?>
</body>
</html>
