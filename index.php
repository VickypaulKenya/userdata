<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CSS/index.css">
</head>
<body>
    <div class="container">
        <h2>Registration</h2>
        <form action="includes/register.inc.php" method="post">
            <div class="input-field">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>
             <div class="input-field">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
             <div class="input-field">
                <label for="pwd">Password</label>
                <input type="password" name="pwd" id="pwd">
            </div>

           <button class="btn" type="submit">Submit</button>
        </form>
    </div>
</body>
</html>