<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/components/header.php"; ?>

<main id="main-registration">
    <div id="text-info">
        <h3>1. Заполнение персональных данных</h3>
        <p>
            Подача заявления в ЮУрГУТ состоит из нескольких этапов. Этап представленный ниже содержит в себе заполнение
            персональный данных абитуриента.
        </p>
    </div>

    <form id="personal-data" method="POST" enctype="multipart/form-data">
        <div id="name-surname-patronymic">
            <div>
                <label for="name">Имя</label>
                <input type="text"
                       name="name"
                       id="name"
                       placeholder="Введите имя"
                       pattern="[А-Я]{1}[а-я]{,50}"
                       required>
                <p class="instruction">Вводите имя с большой буквы без пробелов и знаков пунктуации</p>
            </div>
            <div>
                <label for="surname">Фамилия</label>
                <input type="text"
                       name="surname"
                       id="surname"
                       placeholder="Введите фамилию"
                       pattern="[А-Я]{1}[а-я]{,50}"
                       required>
                <p class="instruction">Вводите фамилию с большой буквы без пробелов и знаков пунктуации</p>
            </div>
            <div>
                <label for="patronymic">Отчество</label>
                <input type="text"
                       name="patronymic"
                       id="partonymic"
                       placeholder="Введите отчество"
                       pattern="[А-Я]{1}[а-я]{,50}"
                       required>
                <p class="instruction">Вводите отчество с большой буквы без пробелов и знаков пунктуации</p>
            </div>
        </div>

        <div id="personal-info">
            <div>
                <label for="num-phone">Номер телефона</label>
                <input type="text"
                       name="num-phone"
                       id="num-phone"
                       placeholder="Введите номер телефона"
                       required>
            </div>
            <div>
                <label for="num-certif">Номер аттестата</label>
                <input type="text"
                       name="num-certif"
                       id="num-certif"
                       placeholder="Введите номер аттестата"
                       required>
            </div>
            <div>
                <label for="school">Название школы</label>
                <input type="text"
                       name="school"
                       id="school"
                       placeholder="Введите название школы"
                       pattern="[А-Я]{1}[а-я]{,100}"
                       required>
                <p class="instruction">Вводите название школы с большой буквы и знаков пунктуации</p>
            </div>
            <div>
                <label for="date-birth">Дата рождения</label>
                <input type="date"
                       name="date-birth"
                       id="date-birth"
                       required>
            </div>
            <div>
                <label for="address">Адресс проживания</label>
                <input type="text"
                       name="address"
                       id="address"
                       placeholder="Введите адрес проживания"
                       required>
            </div>
        </div>

        <div id="passport-info">
            <div>
                <label for="passport-num">Номер паспорта</label>
                <input type="number"
                       name="passport-num"
                       id="passport-num"
                       placeholder="Введите номер паспорта"
                       required>
            </div>
            <div>
                <label for="passport-series">Серия паспорта</label>
                <input type="number"
                       name="passport-series"
                       id="passport-series"
                       placeholder="Введите серию паспорта"
                       required>
            </div>
            <div>
                <label for="passport-get-by">Кем выдан паспорт</label>
                <input type="text"
                       name="passport-get-by"
                       id="passport-get-by"
                       placeholder="Введите кем выдан паспорт"
                       required>
            </div>
            <div>
                <label for="date-passport">Дата выдачи паспорта</label>
                <input type="date"
                       name="date-passport"
                       id="date-passport"
                       placeholder="Введите дату выдачи паспорта"
                       required>
            </div>
        </div>

        <div id="uploading-photo">
            <label for="img">Фотография
                <input type="file"
                       name="img-stmt"
                       id="img"
                       accept="image/png, image/jpg, image/jpeg"
                       required>
            </label>
        </div>

        <div>
            <button type="submit"
                    name="submit"
                    id="to-second-step-btn">
                ПЕРЕЙТИ К СЛЕДУЮЩЕМУ ЭТАПУ
            </button>
        </div>
    </form>
</main>

<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/views/components/footer.php"; ?>

<!--<script src="/public/js/set-info-student.js"></script>-->