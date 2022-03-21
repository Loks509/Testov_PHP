<?php

$CountOfDay = cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y"));

$beginMonth = mktime(0, 0, 0, date("m"), 1, date("Y"));
$beginMonth = date('w', $beginMonth);

?>

<table class="bodytable">
    <tr class="oglav">
        <th>ПН</th>
        <th>ВТ</th>
        <th>СР</th>
        <th>ЧТ</th>
        <th>ПТ</th>
        <th>СБ</th>
        <th>ВС</th>
    </tr>
    <tr>
        <?php 
            for ($day_g = 1; $day_g < $CountOfDay + $beginMonth; $day_g++) :
            $day = $day_g - $beginMonth + 1; 
        ?>

            <td>
                <?php if ($day > 0) : ?>
                    <div class="link round">
                        <a href="GetList.php?day=<?= $day ?>"><?= $day ?> </a>
                    </div>
                <?php endif; ?>
            </td>
            <?php if ($day_g % 7 == 0) : ?>
                </tr>
                <tr>
            <?php endif; ?>
        <?php endfor; ?>
    </tr>
</table>