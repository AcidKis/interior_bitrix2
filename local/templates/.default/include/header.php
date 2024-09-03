<table>
    <tr>
        <td rowspan="2" class="hd_companyname">
            <h1><a href="">Мебельный магазин</a></h1>
        </td>
        <td rowspan="2" class="hd_txarea">
                        <span class="tel"><?
                            $APPLICATION->IncludeFile(
                                SITE_DIR . "include/phone.php",
                                Array(),
                                Array(
                                    "MODE" => "html",
                                    "NAME" => "Телефон",
                                    "TEMPLATE" => "standard.php"
                                )
                            );
                            ?></span>	<br/>
            <?echo GetMessage('work_hours')?> <span class="workhours">ежедневно с 9-00 до 18-00</span>
        </td>
        <td style="width:232px">
            <?$APPLICATION->IncludeComponent("bitrix:search.form", "search", Array(

            ),
                false
            );?>
        </td>
    </tr>
    <tr>
        <td style="padding-top: 11px;">

			<?$APPLICATION->IncludeComponent(
	"bitrix:main.auth.form", 
	"auth", 
	array(
		"AUTH_FORGOT_PASSWORD_URL" => "/forgot.php",
		"AUTH_REGISTER_URL" => "/register.php",
		"AUTH_SUCCESS_URL" => "/user/profile.php",
		"SHOW_ERRORS" => "Y",
		"COMPONENT_TEMPLATE" => "auth"
	),
	false
);?>
        </td>
    </tr>
</table>
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_multi", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"COMPONENT_TEMPLATE" => "top_multi",
		"DELAY" => "N",
		"MAX_LEVEL" => "3",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "Y"
	),
	false
);?>