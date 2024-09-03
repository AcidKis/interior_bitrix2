<?php
$dir = $APPLICATION->GetCurDir();
if (strpos($dir, '/partners/') === false): // Если это не раздел "Партнерам"
    ?>
    <div class="sb_event">
        <div class="sb_event_header"><h4>Ближайшие события</h4></div>
        <p><a href="">29 августа 2012, Москва</a></p>
        <p>Семинар производителей мебели России и СНГ, Обсуждение тенденций.</p>
    </div>
<?php
else: // Если это раздел "Партнерам"
    ?>
    <div class="sb_event">
        <div class="sb_event_header"><h4>Внимание!</h4></div>
        <p>Заключение партнерского договора позволит вам вывести бизнес на новый уровень.</p>
    </div>
<?php
endif;
?>