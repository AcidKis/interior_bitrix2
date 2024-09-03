<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<form method="GET" action="">
    <label for="filter_last_login">Фильтр по последней авторизации:</label>
    <input type="date" name="filter_last_login" id="filter_last_login" value="<?= htmlspecialchars($_GET['filter_last_login'] ?? '') ?>">

    <label for="filter_email">Поиск по Email:</label>
    <input type="text" name="filter_email" id="filter_email" value="<?= htmlspecialchars($_GET['filter_email'] ?? '') ?>">

    <button type="submit">Применить фильтр</button>
</form>

<div class="user-list">
    <table>
        <thead>
        <tr>
            <th>Логин</th>
            <th>Email</th>
            <th>Последняя авторизация</th>
            <th>Действия</th>
        </tr>
        </thead>
        <tbody>
        <?php if (empty($arResult['USERS'])): ?>
            <tr>
                <td colspan="4">Пользователи не найдены</td>
            </tr>
        <?php else: ?>
            <?php foreach ($arResult['USERS'] as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['LOGIN']) ?></td>
                    <td><?= htmlspecialchars($user['EMAIL']) ?></td>
                    <td><?= htmlspecialchars($user['LAST_LOGIN']) ?></td>
                    <td><a href="/admin/users/<?= htmlspecialchars($user['LOGIN']) ?>/">Посмотреть</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>
