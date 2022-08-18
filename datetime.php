<?php

//$date = new DateTime();
$date = new DateTime('2022-12-30 15:35:00');
$date2 = new DateTime('2020-01-06 15:37:00');
$date3 = new DateTime('');

$date->add(DateInterval::createFromDateString('2 days 5 minutes 17 seconds')); //modify date
$date->sub(DateInterval::createFromDateString('10 seconds'));

echo $date->format('d/m/Y H:i:s');
echo '<br />';

$diff = $date3->diff($date);
echo $diff->format('%a'); //day quantity rest to end year. y= years; a = days ; m = month ;  d = days ; i= minutes ; s = seconds ; h= hours ;
