<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href=" https://cdn.jsdelivr.net/npm/@picocss/pico@1.5.10/css/pico.min.css" rel="stylesheet">
</head>

<body>
    <main class="container">
        <form action="../include/Signup.inc.php" method="POST">
            <div class="grid">
                <h1>Sign up</h1>
                <div>
                    <label for="username">username
                        <input type="text" name="username">
                    </label>
                    <label for="email">email
                        <input type="text" name="email">
                    </label>
                    <label for="password">password
                        <input type="password" name="password">
                    </label>
                    <label for="password">Re-Enter password
                        <input type="password" name="repassword">
                    </label>
                    <button type="submit" name="submit">sign up </button>
                </div>
            
            </div>
        
        </form>
    </main>

</body>

</html>