<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php"; ?>

<header>
    <a href="/" id="link-to-main">
        <div id="logo">
            <img src="/public/img/icons/university-logo.svg"
                    alt="Логотип университета"
                    id="logo-pic">
            <p>ЮУрГУТ</p>
        </div>

        <div id="navigation">
            <nav class="navbar" id="navbar">
                <ul class="nav">
                    <?php foreach ($routes as $key => $value) : ?>
                        <li class="nav-item"
                            onmouseover="this.style.borderBottom='1px solid #f1a025'"
                            onmouseout="this.style.borderBottom='0'">
                            <a class="nav-link" href="<?= $value ?>" style="color: black; font-weight: 600"><?= $key ?></a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </nav>

            <a href="<?= $_SESSION["isAuth"] ?? false ? "/app/controllers/user-page" : "/app/controllers/log-in"?>" id="user-button">
                <img src="/public/img/icons/user-icon.svg"
                        alt="Иконка личного кабинета">
            </a>
        </div>
</header>