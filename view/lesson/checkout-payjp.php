


<?php
include('../../component/head.php');
require_once('../../payjp-php-master/init.php');

echo "<body>
<div style='text-align:center;margin-top:100px'>
お支払いに失敗しました。<br>
有効なカードをご用意の上もう一度お試しください。<br><br>
また、銀行振り込みでの決済も可能です。<br><br>
<button type='button' onclick=\"location.href='index.php'\" style='cursor:pointer;'>戻る</button>
</div>
</body>";

\Payjp\Payjp::setApiKey('sk_live_e8024dc9f4c17ef186b09e54b775cd27868693f29eed8bd4ecc74d85');


$charge =\Payjp\Charge::create(array(
    'card' => htmlentities($_POST['payjp-token']),
    'amount' => htmlentities($_POST['amount']),
    'currency' => 'jpy'
));

if ( isset($charge['error']) ) {
    $message="支払いに失敗しました。";
    header("location:index.php?message=$message");
    exit();
}

$id=htmlentities($_POST['id']);
$stmt=$pdo->prepare("update lessons set done=:done where id=:id");
$params=array(
    ":done"=>1,
    ":id"=>$id
);
$stmt->execute($params);

$message="支払いが完了しました。";
header("location:index.php?message=$message");
exit();



