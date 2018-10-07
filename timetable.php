<?php
/*$month_array = ['1' => 'Январь', 2 => 'Февраль', 3 => 'Март', 4 => 'Апрель', 5 => 'Май', 6 => 'Июнь',
 7 => 'Июль', 8 => 'Август', 9 => 'Сентябрь', 10 => 'Октябрь', 11 => 'Ноябрь', 12 => 'Декабрь'];

//$day = (int)date('j');
$day = 31;
$month_number = (int)date('n');
$month_days = (int)date('t');
$year = (int)date('Y');
$final = [];
$k = 0;
for(; ($day <= $month_days) and ($k < 7); ++$day, ++$k)
{
    $final[$month_array[$month_number]][] = sprintf('%d-%d-%d', $year, $month_number, $day);
}
if ($k < 7) {
    $day = 1;
    if ($month_number == 12)
    {
         $month_number = 1;
         ++$year;
    }
    else ++$month_number;
    for(; $k < 7; ++$day, ++$k)
    {
        $final[$month_array[$month_number]][] = sprintf('%d-%d-%d', $year, $month_number, $day);
    }   
}
var_dump($final);
echo '<br><br>';
var_dump(explode(' ', date('j n t')));
echo '<br><br>';
$today = getdate();
print_r($today);
echo '<br><br>';
$date = date_create_from_format('j-M-Y', '15-Feb-2009');
echo date_format($date, 'Y-m-d');
echo '<br><br>';
$date = date_create('2000-01-01');
echo date_format($date, 'Y-m-d H:i:s');
die(); */

//РАСПИСАНИЕ СЕАНСОВ
require_once './db.php';
require_once './models/timetable.php';

$link = db_connect();

$seances = array();
$date = isset($_GET['date']) ? $_GET['date'] : date('Y-m-d');
$seances = getTimetableOnDate($link, $date);

include './views/timetable.php';
?>