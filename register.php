<?php

require_once __DIR__ . '/src/helpers.php';

// $_SESSION['validation'] = [];

?>

<!DOCTYPE html>
<html lang="ru" data-theme="light">

<head>
    <meta charset="UTF-8">
    <title>Aвторизация и регистрация</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <link rel="stylesheet" href="assets/app.css">
</head>

<body>

    <form class="card" action="src/actions/register.php" method="post" enctype="multipart/form-data"> <!-- здесь enctype="multipart/form-data" позволяет форме поддерживать отправку файлов -->
        <h2>Регистрация</h2>

        <label for="name">
            Имя
            <input type="text" id="name" name="name" placeholder="Кайрош Нуртас" <?php validationErrorAttr('name'); ?> value="<?php echo old('name') ?>">
            <?php if (hasValidationError('name')) : ?>
                <small><?php validationErrorMessage('name'); ?></small> <!-- здесь эта функция выполняется только если hasValidationError возвращает true -->
            <?php endif; ?>
        </label>

        <label for="email">
            E-mail
            <input type="text" id="email" name="email" placeholder="example@gmail.com" <?php validationErrorAttr('email'); ?> value="<?php echo old('email') ?>">
            <?php if (hasValidationError('email')) : ?>
                <small><?php validationErrorMessage('email'); ?></small>
            <?php endif; ?>
        </label>

        <label for="avatar">Изображение профиля
            <input type="file" id="avatar" name="avatar">
        </label>

        <div class="grid">
            <label for="password">
                Пароль
                <input type="password" id="password" name="password" placeholder="******" <?php validationErrorAttr('password'); ?>>
            <?php if (hasValidationError('password')) : ?>
                <small><?php validationErrorMessage('password'); ?></small>
            <?php endif; ?>
            </label>

            <label for="password_confirmation">
                Подтвердите пароль
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="******">
            </label>
        </div>

        <fieldset>
            <label for="terms">
                <input type="checkbox" id="terms" name="terms" required>
                Я принимаю все условия пользования
            </label>
        </fieldset>

        <button type="submit" id="submit">Продолжить</button>
    </form>
    <?php clearValidation(); ?> <!-- вызываем эту функию для очищения форму от ошибок при обновлении страницы -->

    <p>У меня уже есть <a href="/login.html">аккаунт</a></p>

    <script src="assets/app.js"></script>
</body>

</html>