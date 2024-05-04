<?php
$a = $b = $c = '';
$error = null;
$output = null;
$formSubmitted = $_SERVER["REQUEST_METHOD"] === "POST";

if ($formSubmitted) {
    $a = filter_input(INPUT_POST, 'a', FILTER_SANITIZE_NUMBER_INT);
    $b = filter_input(INPUT_POST, 'b', FILTER_SANITIZE_NUMBER_INT);
    $c = filter_input(INPUT_POST, 'c', FILTER_SANITIZE_NUMBER_INT);

    if (is_numeric($a) && is_numeric($b) && is_numeric($c) && $a != 0) {
        $discriminant = ($b * $b) - (4 * $a * $c);
        $output = "<h2>The discriminant of the quadratic equation with a = $a, b  = $b, and c = $c is: " . $discriminant . "</h2>";
    } else {
        $error = "Please enter valid coefficients for a, b, and c, with a not equal to 0.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
<?php if (!$formSubmitted) { ?>
    <h2>Discriminant of a Quadratic Equation</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <p>A = <input type="text" name="a" value="<?php echo isset($a) ? $a : ''; ?>" placeholder="Value of a here"></p>
        <p>B = <input type="text" name="b" placeholder="Value of b here"></p>
        <p>C = <input type="text" name="c" placeholder="Value of c here"></p>
        <button type="submit">Submit</button>
    </form>
<?php } elseif (isset($error)) { ?>
    <p style="color: red;">Error: <?php echo $error; ?></p>
<?php } elseif (isset($output)) { ?>
    <?php echo $output; ?>
<?php } ?>
</body>
</html>
