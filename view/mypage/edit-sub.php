



<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../component/head.php');  ?>
</head>
<body>
<?php
include ('../../component/nav.php');
session_start();
$me=$_SESSION['mail'];

if($_SESSION['coach']==true){
    $stmt=$pdo->query("select * from coaches where mail='$me'");
}
if($_SESSION['student']==true){
    $stmt=$pdo->query("select * from sutdents where mail='$me'");
}
foreach($stmt as $row){
    $movie1=$row['movie1'];
    $movie2=$row['movie2'];
    $sub1=$row['sub1'];
    $sub2=$row['sub2'];
}
?>
<div class="main" style="margin-bottom:200px ">
    <div class="left">
        <div class='edit-sub-parent'>
            <div class='edit-sub'>
                <div class='edit-sub-img-parent'>
                    <?php echo "<video class='sub-img' src='../../video/$movie1' controls></video>" ?>
                </div>
                <form action="edit-prof.php" method="post" enctype="multipart/form-data">
                <div>
                    <?php
                    echo htmlentities(str_replace('?','',$_GET['message1']));
                    ?>
                </div>
                <label for="movie1" class="prof-label">動画（左）を選択</label><input id="movie1" type="file" name="movie1" style='display:none;' class='select-sub-input'>
                <?php echo "<input type='hidden' name='old_movie1' value='$movie1'>" ?>
                <input type="submit" value="変更する" class='cahange-sub-btn'>
                </form>
            </div>

            <div class='edit-sub'>
                <div class='edit-sub-img-parent'>
                    <?php echo "<video class='sub-img' src='../../video/$movie2' controls></video>" ?>
                </div>
                <form action="edit-prof.php" method="post" enctype="multipart/form-data">
                <div>
                    <?php
                    echo htmlentities(str_replace('?','',$_GET['message2']));
                    ?>
                </div>
                <label for="movie2" class="prof-label">動画（右）を選択</label><input id="movie2" type="file" name="movie2" style='display:none;' class='select-sub-input'>
                <?php echo "<input type='hidden' name='old_movie2' value='$movie2'>" ?>
                <input type="submit" value="変更する" class='cahange-sub-btn'>
                </form>
            </div>
            <br class='pc-br'>
            <div class='edit-sub'>
                <div class='edit-sub-img-parent'>
                    <?php echo "<img src=\"../../img/$sub1\" class='edit-sub-img js-replace-no-image'>" ?>
                </div>
                <form action="edit-prof.php" method="post" enctype="multipart/form-data">
                <div>
                    <?php
                    echo htmlentities(str_replace('?','',$_GET['message3']));
                    ?>
                </div>
                <label   for="sub1" class="prof-label">サブ画像（左）を選択</label><input id="sub1" type="file" name="sub1" style='display:none;' class='select-sub-input'>
                <?php echo "<input type='hidden' name='old_sub1' value='$sub1'>" ?>
                <input type="submit" value="変更する" class='cahange-sub-btn'>
                </form>
            </div>

            <div class='edit-sub'>
                <div class='edit-sub-img-parent'>
                    <?php echo "<img src=\"../../img/$sub2\" class='edit-sub-img js-replace-no-image'>" ?>
                </div>
                <form action="edit-prof.php" method="post" enctype="multipart/form-data">
                <div>
                    <?php
                    echo htmlentities(str_replace('?','',$_GET['message4']));
                    ?>
                </div>
                <label for="sub2" class="prof-label">サブ画像（右）を選択</label><input id="sub2" type="file" name="sub2" style='display:none;' class='select-sub-input'>
                <?php echo "<input type='hidden' name='old_sub2' value='$sub2'>" ?>
                <input type="submit" value="変更する" class='cahange-sub-btn'>
                </form>
            </div>
        </div>
        
        <br>
        <br>
        <br>
        
        <?php
        $_GET[]=null;
        ?>
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

