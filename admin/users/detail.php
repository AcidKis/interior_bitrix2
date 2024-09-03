<?php
use Bitrix\Main\UserTable;

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Детальная информация о пользователе");

$urlPath = trim($_SERVER['REQUEST_URI'], '/');
$urlSegments = explode('/', $urlPath);
$login = end($urlSegments);

if (!$login) {
    ShowError("Не указан логин пользователя.");
    require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
    return;
}

$rsUser = UserTable::getList([
    'select' => ['ID', 'LOGIN', 'NAME', 'LAST_NAME', 'EMAIL', 'LAST_LOGIN'],
    'filter' => ['LOGIN' => $login]
]);

$user = $rsUser->fetch();

if (!$user) {
    ShowError("Пользователь не найден.");
} else {
    ?>
    <h1>Детальная информация о пользователе</h1>
    <p>Логин: <?= htmlspecialcharsbx($user['LOGIN']) ?></p>
    <p>Имя: <?= htmlspecialcharsbx($user['NAME']) ?></p>
    <p>Фамилия: <?= htmlspecialcharsbx($user['LAST_NAME']) ?></p>
    <p>Email: <?= htmlspecialcharsbx($user['EMAIL']) ?></p>
    <p>Дата последней авторизации: <?= htmlspecialcharsbx($user['LAST_LOGIN']) ?></p>
    <?php
}

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php");
?>