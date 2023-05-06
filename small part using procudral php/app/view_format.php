<?php

declare(strict_types=1);


function dollar_format(float $amount):string
{
    $isNegative= $amount < 0;

    return($isNegative ? '-' :'').'$'.number_format(abs($amount),2);
}


function date__format(string $date):string
{
return date('M j, Y',strtotime($date));
}


?>