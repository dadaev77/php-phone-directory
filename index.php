<?php

include 'contactsController.php' ?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Телефонный справочник</title>

</head>
<body>

<h2>Добавить контакт</h2>
<form method="post">
    <label for="name">Имя:</label>
    <input type="text" id="name" name="name" required>
    <label for="phone">Телефон:</label>
    <input type="text" id="phone" name="phone" required>
    <button type="submit">Добавить</button>
</form>

<h2>Список контактов</h2>
<ul>
    <?php
    if (!empty($contacts)) {
        foreach ($contacts as $index => $contact): ?>
            <li>
                <?= htmlspecialchars($contact['name'], ENT_QUOTES | ENT_HTML5) ?>: <?= htmlspecialchars($contact['phone'], ENT_QUOTES | ENT_HTML5) ?>
                <form method="post">
                    <input type="hidden" name="delete" value="<?= $index ?>">
                    <button type="submit">Удалить</button>
                </form>
            </li>
        <?php
        endforeach;
    } ?>
</ul>

</body>
</html>
