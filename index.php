<?php
include 'bas.php';
session_start();

// Register User
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Kullanıcı adının zaten var olup olmadığını kontrol et
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $register_error = "Bu kullanıcı adı zaten mevcut.";
    } else {
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql) === TRUE) {
            $register_success = "Kayıt başarılı lütfen giriş yapın.";
        } else {
            $register_error = "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Login User
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: index.html");
            exit();
        } else {
            $login_error = "Geçersiz şifre.";
        }
    } else {
        $login_error = "Bu kullanıcı adı yoktur.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Kayıt/Giriş</title>
    <style>
        body {
            background-color: #28a745; /* Yeşil arka plan rengi */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            max-width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Kayıt</h2>
        <?php if (isset($register_error)): ?>
            <div class="alert alert-danger"><?= $register_error ?></div>
        <?php endif; ?>
        <?php if (isset($register_success)): ?>
            <div class="alert alert-success"><?= $register_success ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Kullanıcı adı:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Şifre:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="register">Kayıt</button>
        </form>

        <h2>Giriş</h2>
        <?php if (isset($login_error)): ?>
            <div class="alert alert-danger"><?= $login_error ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <div class="form-group">
                <label for="username">Kullanıcı adı:</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Şifre:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary" name="login">Giriş</button>
        </form>
    </div>
</body>
</html>
