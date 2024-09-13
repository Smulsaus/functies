<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="calculator">
        <h1>Simple Calculator</h1>
        <form method="POST" action="">
            <label for="num1">First Number:</label>
            <input type="text" id="num1" name="num1" required><br><br>

            <label for="operation">Operation (+, -, *, /):</label>
            <input type="text" id="operation" name="operation" required><br><br>

            <label for="num2">Second Number:</label>
            <input type="text" id="num2" name="num2" required><br><br>

            <input type="submit" value="Calculate">
        </form>

        <?php
        // Functie voor de som
        function calculate($num1, $num2, $operation) {
            switch ($operation) {
                case '+':
                    return $num1 + $num2;
                case '-':
                    return $num1 - $num2;
                case '*':
                    return $num1 * $num2;
                case '/':
                    if ($num2 != 0) {
                        return $num1 / $num2;
                    } else {
                        return "Error: Division by zero!";
                    }
                default:
                    return "Invalid operation!";
            }
        }

        // form 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST['num1'];
            $operation = $_POST['operation'];
            $num2 = $_POST['num2'];

            // Inputs
            if (is_numeric($num1) && is_numeric($num2)) {
                $result = calculate((float)$num1, (float)$num2, $operation);
                echo "<p>Result: $result</p>";
            } else {
                echo "<p>Please enter valid numbers.</p>";
            }
        }
        ?>
    </div>
</body>
</html>
