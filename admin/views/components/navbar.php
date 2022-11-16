<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php"; ?>

<header>
    <div id="navigation">
        <nav class="navbar" id="navbar">
            <ul class="nav">
                <?php foreach ($routes_admin as $key => $value) : ?>
                    <li class="nav-item">
                        <button type="submit" name="submit" class="nav-buttons"><a class="nav-link" href="<?= $value ?>"><?= $key ?></a>
                        </button>
                    </li>
                <?php endforeach ?>
            </ul>
        </nav>
    </div>

    <div id="button-logout">
        <button type="submit"
                name="logout-submit"><a href="/admin/app/controllers/log-out">ВЫЙТИ</a></button>
    </div>
</header>