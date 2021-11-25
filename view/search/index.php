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
        <div class='top-parent search-parent'>
        <?php
        $search=htmlentities($_POST['search-txt']);
        $referer=$_SERVER['HTTP_REFERER'];
        if (strlen(trim($search))>100){
            $error="検索語数が多すぎます。";
            header("location: $referer?error=$error");
            exit();
        }
        echo "<h3>「 $search 」の検索結果</h3>";
        $stmt=$pdo->query("select * from coaches where name like '%$search%' or prefecture like '%$search%' order by id desc");
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
                    <a href='../coach/index.php?id=$id'>
                        <img class='coach-prof' src='../../img/$prof' alt=''>
                        <div class='prefecture'>$prefecture</div>
                        <div class='fee'>$fee 円/30分</div>
                    </a>
                    <div class='comment'>$comment</div>
                </div>
                ";
            }

        }
        ?>
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
