



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
            <h3>個人情報保護方針</h3s>
            <p class="font15px">
                『ちょいふっと』は、お客様からの信頼を第一と考え、個人情報の保護に関する法律「個人情報保護法」及びプライバシーポリシーに沿って、お客様の個人情報を厳格に管理し、個人情報の正確性・機密性の保持に努めます。 <br>
                <br>
                お客様よりお預かりした個人情報は適切に管理し、適切な範囲で利用し、第三者に漏洩いたしません。<br>
                <br>
                1.『ちょいふっと』は、個人情報を取り扱っている管理責任者が適切な管理を行っております。<br>
                2.お客様の個人情報の取り扱いは、業務上の安全に利用する目的のみで頂戴しております。<br>
                3.『ちょいふっと』は、お客様より頂戴した個人情報を適切に管理し、個人情報の漏えい、滅失又はき損の防止及び是正に努めます。<br>
                また、お客様より取得させていただいた個人情報は利用目的の範囲内で利用し、お客様の同意を得た会社以外の第三者に提供、開示等一切いたしません。<br>
                4.『ちょいふっと』が、上記3におけるお客様の同意に基づき個人情報を提供する人物には、お客様の個人情報を漏えいや再提供等しないよう義務づけ適切な管理をさせます。<br>
                5.お客様が、お客様の個人情報の照会、修正等を希望される場合、相談がある場合には連絡いただければ、合理的な範囲ですみやかに対応いたします。<br>
                6.『ちょいふっと』が保有する個人情報に関して適用される法令、規範を遵守するとともに、上記各項における取り組みを組織的かつ定期的かつ継続的に見直し、改善していきます。
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

