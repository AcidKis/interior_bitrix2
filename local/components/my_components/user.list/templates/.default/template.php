<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

    <form method="GET" action="">
        <label for="FILTER_DATE_FROM">Дата последней авторизации с:</label>
        <input type="date" name="FILTER_DATE_FROM" id="FILTER_DATE_FROM" value="<?= htmlspecialcharsbx($arParams['FILTER_DATE_FROM']) ?>">

        <label for="FILTER_DATE_TO">по:</label>
        <input type="date" name="FILTER_DATE_TO" id="FILTER_DATE_TO" value="<?= htmlspecialcharsbx($arParams['FILTER_DATE_TO']) ?>">

        <label for="FILTER_EMAIL">Поиск по email:</label>
        <input type="text" name="FILTER_EMAIL" id="FILTER_EMAIL" value="<?= htmlspecialcharsbx($arParams['FILTER_EMAIL']) ?>">

        <input type="submit" value="Фильтровать">
    </form>

<?php if (!empty($arResult['USERS'])): ?>
    <ul>
        <?php foreach ($arResult['USERS'] as $user): ?>
            <li>
                <a href="/admin/users/<?= urlencode($user['LOGIN']) ?>/">
                    <?= htmlspecialcharsbx($user['LAST_NAME']) ?> <?= htmlspecialcharsbx($user['NAME']) ?> (<?= htmlspecialcharsbx($user['EMAIL']) ?>, последний вход: <?= htmlspecialcharsbx($user['LAST_LOGIN']) ?>)
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Пользователи не найдены</p>
<?php endif; ?>