<?php
$amount=htmlentities($_POST['amount']);
$id=htmlentities($_POST['id']);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <?php include('../../component/head.php');  ?>
</head>
<body>
<?php
include ('../../component/nav.php');
?>
<div class="main">
    <div class="left">
        <div class="payment-parent">
            <form action="checkout-payjp.php" method="post">
                <?php
                echo "
                <input type='hidden' name='amount' value='$amount'>
                <input type='hidden' name='id' value='$id'>
                ";
                ?>
                <h1 class='payment-title'>お支払い</h1>
                <h3>ご利用可能なカード</h3>
                <p>Mastercard</p>
                <p>Visa</p>
                <script type="text/javascript" 
                src="https://checkout.pay.jp" 
                class="payjp-button"
                data-key="pk_live_89f1da71ac6cdef48dd25120"
                data-text="カードで支払う"
                data-name-placeholder="ちょ井　ふっ太郎"
                data-submit-text="決済する"
                ></script>
            </form>
        </div>
    </div>
    <div class="right">
        <?php include('../../component/pr.php');  ?>
    </div>
</div>
<?php
include ('../../component/footer.php');
include ('../../component/nav2.php');?>

</body>
</html>


