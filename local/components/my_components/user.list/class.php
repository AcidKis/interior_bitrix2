<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\UserTable;

class UserListComponent extends CBitrixComponent
{
    public function onPrepareComponentParams($params)
    {
        $params['FILTER_DATE_FROM'] = isset($params['FILTER_DATE_FROM']) ? $params['FILTER_DATE_FROM'] : '';
        $params['FILTER_DATE_TO'] = isset($params['FILTER_DATE_TO']) ? $params['FILTER_DATE_TO'] : '';
        $params['FILTER_EMAIL'] = isset($params['FILTER_EMAIL']) ? $params['FILTER_EMAIL'] : '';

        return parent::onPrepareComponentParams($params);
    }

    public function executeComponent()
    {
        $filter = ['ACTIVE' => 'Y'];

        if ($this->arParams['FILTER_DATE_FROM']) {
            $filter['LAST_LOGIN'] = '>=' . $this->arParams['FILTER_DATE_FROM'];
        }

        if ($this->arParams['FILTER_DATE_TO']) {
            $filter['LAST_LOGIN'] = ($filter['LAST_LOGIN'] ?? '') . '<=' . $this->arParams['FILTER_DATE_TO'];
        }

        if ($this->arParams['FILTER_EMAIL']) {
            $filter['EMAIL'] = '%' . $this->arParams['FILTER_EMAIL'] . '%';
        }

        $rsUsers = UserTable::getList([
            'select' => ['ID', 'LOGIN', 'NAME', 'LAST_NAME', 'EMAIL', 'LAST_LOGIN'],
            'filter' => $filter,
            'order' => ['LAST_NAME' => 'ASC'],
            'limit' => 50
        ]);

        $this->arResult['USERS'] = [];
        while ($user = $rsUsers->fetch()) {
            $this->arResult['USERS'][] = $user;
        }

        $this->includeComponentTemplate();
    }
}
?>