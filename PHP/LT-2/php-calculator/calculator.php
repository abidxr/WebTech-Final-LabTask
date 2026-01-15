<?php
echo "Hello";
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
</head>

<body>

    <form>
        <p><b>Enter the first number</b></p>
        <input type="number" name="fNum" value="<?php echo htmlspecialchars($fNum); ?>"><br>
        <span class="error"></span><br>
        <p><b>Enter the second number</b></p>
        <input type="number" name="sNum" value="<?php echo htmlspecialchars($sNum); ?>"><br>
        <span class="error"></span>

    </form>

</body>

</html>