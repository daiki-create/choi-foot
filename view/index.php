<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../component/head.php');  ?>
</head>
<body>
<div class="header">
    <div class="top">
        <div class="hamburger">
            <span class="top-hamburger"></span>
            <span class="middle-hamburger"></span>
            <span class="bottom-hamburger"></span>
            <div class="menu-content">
                <ul>
                    <li class="menu-item"><a href="../view/use/index.php">ご利用について</a></li>
                    <li class="menu-item"><a href="../view/recruit/index.php">コーチ募集</a></li>
                    <li class="menu-item"><a href="../view/contact/index.php">お問い合わせ</a></li>
                    <li class="menu-item"><a href="../view/terms/index.php">利用規約</a></li>
                    <li class="menu-item"><a href="../view/terms/privacy.php">個人情報保護方針</a></li>
                    <li class="menu-item"><a href="../../view/terms/scta.php">特定商取引</a></li>
                    <li class="menu-item"><a href="../view/retire/index.php">退会</a></li>
                </ul>
            </div>
        </div>
        <div class="title">ちょいふっと</div>
        <?php
        session_start();
        if ($_SESSION["flag"]===true){
            echo "<div class='login' ><a href='login/logout.php'>ログアウト</a></div>";
        }else{
            echo "<div class='login'><a href='login/index.php'>ログイン</a></div> ";
        }
        ?>
        <form class="search" action="search/index.php" method="post">
            <input name="search-txt" class="search-txt" placeholder="コーチを検索" type="text" id="search-txt" required>
            <button id="search-btn" class="search-btn" type="button" onclick="click_search_btn()"></button>
            <button id="search-btn2" style="display: none;" class="search-btn" type="submit"></button>
        </form>

        <script>
        var count=0;
            function click_search_btn(){
                document.getElementById('search-txt').style.cssText='display:block'
                document.getElementById('search-btn2').style.cssText='display:block'
                document.getElementById('search-btn').style.cssText='display:none'
            }
        </script>
    </div>
    <ul class="nav-ul">
        <li class="nav-item"><a href="./"><img src='../img/top.png' class='nav-icon'></a></li>
        <li class="nav-item"><a href="message/index.php"><img src='../img/chat.png' class='nav-icon'></a></li>
        <li class="nav-item"><a href="mypage/index.php"><img src='../img/mypage.png' class='nav-icon'></a></li>
        <li class="nav-item"><a href="lesson/index.php"><img src='../img/lesson.png' class='nav-icon'></a></li>
    </ul>
</div>
<div class="main">
    <div class="left">
        <?php
        echo htmlentities($_GET['error'])
        ?>
        <br>
        <br>
        <?php
        echo $_GET['message'];;
        ?>
        <div class='top-parent'>
            <?php
            $stmt=$pdo->query('select * from coaches order by id desc');
            foreach ($stmt as $row){
                $id=$row['id'];
                $prefecture=$row['prefecture'];
                $fee=$row['fee'];
                $comment=$row['comment'];
                $prof=$row['prof'];
                $pass=$row['pass'];
                if($pass==1){
                    echo "
                    <div class='coach-card'>
                        <a href='coach/index.php?id=$id'>
                            <img class='coach-prof' src='../img/$prof' alt=''>
                            <div class='prefecture'>$prefecture</div>
                            <div class='fee'>$fee 円/30分</div>
                        </a>
                        <div class='comment font15px'>$comment</div>
                    </div> 
                     ";
                }
                

            }

            ?>
        </div>
    </div>
    <div class="right">
    <br><br><br>
        
        <div class='ad'>
            <a href="https://t.afi-b.com/visit.php?guid=ON&a=Y7654s-k257228b&p=x790622p" rel="nofollow">
                <img class="ad-img" src="https://www.afi-b.com/upload_image/7654-1452130094-3.jpg" style="border:none;" />
            </a>
        </div>

    </div>
</div>
<div class="footer">
    <ul class="footer-box">
        <li class="footer-item"><a href="index.php">TOP</a></li>
        <li class="footer-item"><a href="message/index.php">チャット</a></li>
        <li class="footer-item"><a href="mypage/index.php">マイページ</a></li>
        <li class="footer-item"><a href="lesson/index.php">レッスン</a></li>
    </ul>
    <ul class="footer-box">
        <li class="footer-item"><a href="use/index.php">ご利用について</a></li>
        <li class="footer-item"><a href="recruit/index.php">コーチ募集</a></li>
        <li class="footer-item"><a href="contact/index.php">お問い合わせ</a></li>
    </ul>
    <div style="text-align: center" class="copy-right">
        Copyright (C) 2020-2025
        【レンタルサッカーコーチ】ちょいふっと
        All Rights Reserved.
    </div>
</div>
<div class="nav">
    <ul class='nav-ul-sp'>
        <li class="nav-item"><a href="../view/index.php"><img src='../img/top.png' class='nav-icon'></a></li>
        <li class="nav-item"><a href="../view/message/index.php"><img src='../img/chat.png' class='nav-icon'></a></li>
        <li class="nav-item"><a href="../view/mypage/index.php"><img src='../img/mypage.png' class='nav-icon'></a></li>
        <li class="nav-item"><a href="../view/lesson/index.php"><img src='../img/lesson.png' class='nav-icon'></a></li>
    </ul>
</div>




</body>
</html>
