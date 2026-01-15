<?php

$error = [];

$confirmation_message = "";

$name = $email = $password = $confirmPassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirmPassword = trim($_POST["confirmPassword"]);

    if (empty($name)) {
        $error["name"] = "Name is required!";
    }

    if (empty($email)) {
        $error["email"] = "Email is required!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error["email"] = "Invalid email format!";
    }

    if (empty($password)) {
        $error["password"] = "Password is required!";
    } elseif (strlen($password) < 6) {
        $error["password"] = "Password must be at least 6 characters!";
    }

    if (empty($confirmPassword)) {
        $error["confirmPassword"] = "Confirm Password is required!";
    } elseif ($password !== $confirmPassword) {
        $error["confirmPassword"] = "Passwords do not match!";
    }

    if (empty($error)) {
        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        $confirmation_message = "Registration Successful!";
    }
}

?>


<?php  ?>


<DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration page</title>
        <style>
            .error {
                color: red;
            }

            .success {
                color: green;
            }

            body {
                display: grid;
                place-items: center;
                min-height: 100vh;
                margin: 0;
            }

            .container {
                display: flex;
                flex-direction: column;
                align-items: center;
                padding-top: 50px;
            }

            .form {
                padding: 25px;
                border-radius: 8px;
                box-shadow: 0 2px 10px gray;
                width: 350px;
            }

            .confirmationBox {
                margin-top: 20px;
                padding: 15px;
                border-radius: 8px;
                box-shadow: 0 2px 10px gray;
                width: 350px;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="form">
                <form action="register.php" method="POST">
                    <label for="name">Name: </label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>"><br>
                    <span class="error"><?php echo $error["name"] ?? ""; ?></span>
                    <br>

                    <label for="email">Email: </label>
                    <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>"><br>
                    <span class="error"><?php echo $error["email"] ?? ""; ?></span>
                    <br>

                    <label for="password">Password: </label>
                    <input type="password" name="password" value="<?php echo htmlspecialchars($password); ?>"><br>
                    <span class="error"><?php echo $error["password"] ?? ""; ?></span>
                    <br>

                    <label for="confirmPassword">Confirm Password: </label>
                    <input type="password" name="confirmPassword" value="<?php echo htmlspecialchars($confirmPassword); ?>"><br>
                    <span class="error"><?php echo $error["confirmPassword"] ?? ""; ?></span>
                    <br>

                    <input type="submit">
                </form>
            </div>

            <div class="confirmationBox">
                <?php
                echo "<h2>User Info</h2>";
                if ($confirmation_message) {
                    echo "<div>
                 <h3 class='success'> $confirmation_message</h3>
                  <p><b>Name:</b> $name</p> 
                  <p><b>Email:</b> $email</p>
                  </div>";
                }

                ?>

            </div>


    </body>

    </html>