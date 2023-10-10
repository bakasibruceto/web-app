<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href=" https://cdn.jsdelivr.net/npm/@picocss/pico@1.5.10/css/pico.min.css" rel="stylesheet">
</head>

<body>
    <main class="container">
        <div class="grid">
            <h1>Forgot Password</h1>
            <form action="../include/ForgotPassword.inc.php" method="POST">
                <label for="email">email
                    <input type="text" name="email">
                </label>
                <input type="submit" name="submit" value="submit">
                </label>
            </form>

        </div>

    </main>

</body>

</html>