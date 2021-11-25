



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
</head>
<body>
<?php
include ('../../component/nav.php')
?>
<div class="main">
    <div class="left">
        <div class='terms ws-normal'>
            <h3>特定商取引</h3s>
            <p class="font15px">
特定商取引法に基づく表記<br>
「特定商取引に関する法律」第11条に基づき、以下のとおり表示致します。<br><br>

事業者の名称<br>
山崎大暉<br><br>

事業所所在地<br>
郵便番号：221-0811<br>
住所：横浜市神奈川区斎藤分町6-35<br><br>

運営責任者<br>
山崎大暉<br><br>

事業者の連絡先<br>
メールアドレス：prod.noland1121@gmail.com<br>
電話番号：070-1552-2479<br><br>

または、<a href='../contact'>お問合せフォーム</a>よりご連絡ください<br><br>

販売価格について<br>
販売価格は、購入手続きの際に画面に表示された金額（表示価格/消費税別）と致します。<br><br>

販売価格以外でお客様に発生する金銭<br>
当サイトのページ閲覧、コンテンツ購入、ソフトウェアのダウンロード等に必要となるインターネット接続料金、通信料金等はお客様の負担となります。それぞれの料金は、お客様がご利用のインターネットプロバイダまたは携帯電話会社にお問い合わせください。<br><br>

代金（対価）の支払方法と時期<br>
支払方法：クレジットカードによる決済または銀行振込。<br>
支払時期：クレジットカードによる決済の場合、申し込み時に支払われます。<br><br>

代金支払の振込手数料<br>
銀行等の金融機関からお支払いの場合、振込手数料はお客様のご負担となります。<br>
郵便局・コンビニエンスストアからのお支払いの場合、振込・振替手数料は不要です。<br><br>

キャンセルについての特約に関する事項<br>
サービスの性質上サービスに欠陥がある場合を除き、購入後のお客様の都合によるキャンセルはお受けできません。<br>
注文後24時間以内*でサービスを利用済みでない場合に限りキャンセルが可能です。決済処理後のキャンセルにかかる返金は決済会社（Pay.jp）よりカード会社を通じて行われます。<br>
（*レッスンのキャンセルについての詳細は、<a href='./'>利用規約</a>の「レッスンお支払いに関する規約」をご覧ください。）<br><br>
解約につきましては<a href='../contact'>お問い合わせフォーム</a>よりご連絡ください。<br>
解約日の当月末までご利用いただき翌月より請求を停止いたします。 なお、日割り分等での返金は承っておりませんのでご了承ください。<br><br>

返品・交換不良品・解約について<br>
主催者都合やなんらかの事情でサービス提供中止になった場合は全額返金いたします。<br>
            </p>
        </div>
    </div>
    <div class="right">
        <?php include('../../component/pr.php');  ?>
    </div>
</div>
<script>
    function click_coach_border(){
        document.getElementById('coach-border2').style.cssText='display:block'
        document.getElementById('student-border2').style.cssText='display:none'
        document.getElementById('coach-post').style.cssText='display:block'
        document.getElementById('student-post').style.cssText='display:none'
    }
    function click_student_border(){
        document.getElementById('coach-border2').style.cssText='display:none'
        document.getElementById('student-border2').style.cssText='display:block'
        document.getElementById('coach-post').style.cssText='display:none'
        document.getElementById('student-post').style.cssText='display:block'
    }
</script>
<?php
include ('../../component/footer.php');
include ('../../component/nav2.php');?>
</body>
</html>

