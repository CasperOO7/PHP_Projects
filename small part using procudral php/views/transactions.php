<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                text-align: center;
            }

            table tr th, table tr td {
                padding: 5px;
                border: 1px #eee solid;
            }

            tfoot tr th, tfoot tr td {
                font-size: 20px;
            }

            tfoot tr th {
                text-align: right;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check #</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                
                <?php if (! empty($transactions)): ?>
                <?php foreach($transactions as $trans): ?>
                    <tr>
                    <td><?= date__format($trans['date'])?></td>
                    <td><?= $trans['check_number']?></td>
                    <td><?= $trans['description']?></td>
                    <?php   $color= ($trans['amount']>0) ?'green;':($trans['amount']<0 ?'red;':'blue;') ?>
                    <td><span style="color:<?= $color ?>" ><?= dollar_format($trans['amount'])?></span></td>
                    </tr>

                    <?php endforeach ?>
                    <?php endif ?>
                




                
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income:</th>
                    <?php   $color= ($total['income']>0) ?'green;':($total['income']<0 ?'red;':'blue;') ?>
                    <td><span style="color:<?= $color ?>" ><?= dollar_format($total['income'])?></span></td>
                    
                </tr>
                <tr>
                    <th colspan="3">Total Expense:</th>
                    <?php   $color= ($total['expenses']>0) ?'green;':($total['expenses']<0 ?'red;':'blue;') ?>
                    <td><span style="color:<?= $color ?>" ><?= dollar_format($total['expenses'])?></span></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total:</th>
                    <?php   $color= ($total['nettotal']>0) ?'blue;':($total['nettotal']<0 ?'red;':'black;') ?>
                    <td><span style="color:<?= $color ?>" ><?= dollar_format($total['nettotal'])?></span></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
