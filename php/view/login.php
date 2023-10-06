<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href=" https://cdn.jsdelivr.net/npm/@picocss/pico@1.5.10/css/pico.min.css" rel="stylesheet">

</head>

<body>
    <main class="container">
        <div class="grid">
            <h1>Login</h1>
            <form action="../include/login.inc.php" method="POST">
                <label for="username">username or email
                    <input type="text" name="username">
                </label>
                <label for="password">password
                    <input type="password" name="password">
                </label>
                <button type="submit" name="submit">Login</button>
            </form>
        </div>
    </main>

</body>

</html>