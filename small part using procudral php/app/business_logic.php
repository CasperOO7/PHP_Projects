<?php
declare(strict_types = 1);

function get_files($files_path):array
{
$files=[];
foreach(scandir($files_path) as $file){
    if(is_dir($file))
    continue;
    else
    {
        $files[] = $files_path . $file;
    }
}
return  $files;
}



function get_content(string $file_name,?callable $transaction_handler=null ): array
{
   if(!file_exists($file_name))
    trigger_error('FILE "'.$file_name.'" doesnt exists.' ,E_USER_ERROR);

    $file=fopen($file_name,'r');
    
    $transactions=[];

    fgetcsv($file);

    while(($transaction=fgetcsv($file))!==false)
    {
        if($transaction_handler!==null)
    {
        $transaction=$transaction_handler($transaction);
    }
    $transactions[]=$transaction;
    }
    return $transactions;
}



function Parse_Transx(array $trans_row):array 
{

[$date,$checknumber,$desc,$amount]=$trans_row;

$amount=(float)str_replace([',','$'],'',$amount);

return ['date'=>$date , 'check_number'=>$checknumber, 'description'=>$desc, 'amount'=>$amount];

}

function Parse_Transy(array $trans_row):array 
{

[$date,$checknumber,$desc,$amount]=$trans_row;

$amount=(float)str_replace([',','$'],'x',$amount);

return ['date'=>$date , 'check_number'=>$checknumber, 'description'=>$desc, 'amount'=>$amount];

}

function process(array $transactions):array
{
$total=['income'=>0,'expenses'=>0,'nettotal'=>0];

foreach($transactions as $transaction){
    $total['nettotal']+=$transaction['amount'];

    if($transaction['amount']>=0)
    $total['income']+=$transaction['amount'];
    else
    $total['expenses']+=$transaction['amount'];
}

return $total;




}