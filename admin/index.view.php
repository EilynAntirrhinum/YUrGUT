<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/public/css/admin.css">
    <title>Вход</title>
</head>
<body id="admin-auth-body">

<?php if ($_SESSION["isFailed"]): ?>
    <div class="alert alert-danger" role="alert">
        Неверные логин или пароль!
    </div>
<?php endif; ?>

<main id="main-admin-auth">
    <div id="banner-auth">
        <form id="admin-auth" method="POST">
            <label for="login" class="label-log-in">Логин</label>
            <input type="text"
                   name="login-admin"
                   placeholder="Логин"
                   class="input-log-in"
                   required>

            <label for="password" class="label-log-in">Пароль</label>
            <input type="password"
                   name="password-admin"
                   placeholder="Пароль"
                   class="input-log-in"
                   required>

            <button type="submit"
                    name="submit"
                    class="auth-admin-btn">
                Войти
            </button>
        </form>
    </div>
</main>
</body>
</html>