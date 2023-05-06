<?php

declare(strict_types = 1);

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define('APP_PATH', $root . 'app' . DIRECTORY_SEPARATOR);
define('FILES_PATH', $root . 'transaction_files' . DIRECTORY_SEPARATOR);
define('VIEWS_PATH', $root . 'views' . DIRECTORY_SEPARATOR);

require APP_PATH .'business_logic.php';
require APP_PATH .'view_format.php';


$files=get_files(FILES_PATH);

$transactions=[];

foreach($files as $file)
    $transactions=array_merge($transactions,get_content($file,'Parse_Transx'));

    $total=process($transactions);
    require VIEWS_PATH . 'transactions.php';

    

