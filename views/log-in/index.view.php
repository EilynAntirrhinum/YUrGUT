<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/components/header.php"; ?>

<?php //if ($_SESSION["isFailed"]): ?>
        <div class="alert alert-danger <?= $isFailed ?? false ? "vis-alert" : "nonvis-alert"?>" role="alert">
            Неверные логин или пароль!
        </div>
<?php //endif; ?>

    <main id="main-log-in">
        <h3>Авторизация</h3>
        <form method="POST" id="form-auth">
            <div id="authentif">
                <label>Логин
                    <input type="text"
                           name="login-user"
                           required>
                </label>
                <label>Пароль
                    <input type="password"
                           name="password-user"
                           required>
                </label>
                <button type="submit"
                        name="auth-btn"
                        class="auth-btn">
                    Войти
                </button>
            </div>
        </form>
    </main>

<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/components/footer.php"; ?>