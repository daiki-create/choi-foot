


<?php
include '../../component/head.php';

session_start();
$me=$_SESSION['mail'];
$referer=$_SERVER['HTTP_REFERER'];

if ($_FILES['student_prof']){
    if($_FILES['student_prof']['size']==0){
        $error="画像が選択されていません";
        header("Location:./index.php?error=$error");
        exit();
    }
    $ext=pathinfo($_FILES['student_prof']['name'],PATHINFO_EXTENSION);
    if($ext!='png' && $ext!='jpg' && $ext!='jpeg'){
        $error="$ext は選択できません";
        header("Location:./index.php?error=$error");
        exit();
    }
    $img_name=md5(uniqid(rand(),true)).'.jpg';
    $stmt=$pdo->prepare('update students set prof=:prof where mail=:me');
    $params=array(
        ':prof'=>$img_name,
        ':me'=>$me
    );
    $stmt->execute($params);
    $stmt=$pdo->prepare('update message_posts set student_prof=:prof where student=:me');
    $params=array(
        ':prof'=>$img_name,
        ':me'=>$me
    );
    $stmt->execute($params);
    $stmt=$pdo->prepare('update lessons set student_prof=:prof where student=:me');
    $params=array(
        ':prof'=>$img_name,
        ':me'=>$me
    );
    $stmt->execute($params);
    move_uploaded_file($_FILES['student_prof']['tmp_name'], '../../img/'.$img_name);
    $old_student_prof=htmlentities($_POST['old_student_prof']);
    unlink('../../img/'.$old_student_prof);
    header("location: index.php");
    exit();
}
if ($_FILES['coach_prof']){
    if($_FILES['coach_prof']['size']==0){
        $error="画像が選択されていません";
        header("Location:./index.php?error=$error");
        exit();
    }
    $ext=pathinfo($_FILES['coach_prof']['name'],PATHINFO_EXTENSION);
    if($ext!='png' && $ext!='jpg' && $ext!='jpeg'){
        $error="$ext は選択できません";
        header("Location:./index.php?error=$error");
        exit();
    }
    $img_name=md5(uniqid(rand(),true)).'.jpg';
    $stmt=$pdo->prepare('update coaches set prof=:prof where mail=:me');
    $params=array(
        ':prof'=>$img_name,
        ':me'=>$me
    );
    $stmt->execute($params);
    $stmt=$pdo->prepare('update message_posts set coach_prof=:prof where coach=:me');
    $params=array(
        ':prof'=>$img_name,
        ':me'=>$me
    );
    $stmt->execute($params);
    $stmt=$pdo->prepare('update lessons set coach_prof=:prof where coach=:me');
    $params=array(
        ':prof'=>$img_name,
        ':me'=>$me
    );
    $stmt->execute($params);
    move_uploaded_file($_FILES['coach_prof']['tmp_name'], '../../img/'.$img_name);
    $old_coach_prof=htmlentities($_POST['old_coach_prof']);
    unlink('../../img/'.$old_coach_prof);
    header("location: index.php");
    exit();
}


if ($_FILES['movie1']){
    if($_FILES['movie1']['size']==0){
        $message1="動画が選択されていません";
        header("location: $referer?&message1=$message1");
        exit();
    }
    $ext=pathinfo($_FILES['movie1']['name'],PATHINFO_EXTENSION);
    if($ext!='mp4' && $ext!='mov' && $ext!='wmv' && $ext!='mpeg' && $ext!='mpg' && $ext!='avi' && $ext!='MOV'){
        $message1="$ext は選択できません";
        header("location: $referer?&message1=$message1");
        exit();
    }
    $video_name=md5(uniqid(rand(),true)).'.mp4';
    $stmt=$pdo->prepare('update coaches set movie1=:movie1 where mail=:me');
    $params=array(
        ':movie1'=>$video_name,
        ':me'=>$me
    );
    $stmt->execute($params);
    move_uploaded_file($_FILES['movie1']['tmp_name'], '../../video/'.$video_name);
    $message1="変更しました。";
    $old_movie1=htmlentities($_POST['old_movie1']);
    unlink('../../video/'.$old_movie1);
    header("location: edit-sub.php?&message1=$message1");
    exit();
}
if ($_FILES['movie2']){
    if($_FILES['movie2']['size']==0){
        $message2="動画が選択されていません";
        header("location: $referer?&message2=$message2");
        exit();
    }
    $ext=pathinfo($_FILES['movie2']['name'],PATHINFO_EXTENSION);
    if($ext!='mp4' && $ext!='mov' && $ext!='wmv' && $ext!='mpeg' && $ext!='mpg' && $ext!='avi' && $ext!='MOV'){
        $message2="$ext は選択できません";
        header("location: $referer?&message2=$message2");
        exit();
    }
    $video_name=md5(uniqid(rand(),true)).'.mp4';
    $stmt=$pdo->prepare('update coaches set movie2=:movie2 where mail=:me');
    $params=array(
        ':movie2'=>$video_name,
        ':me'=>$me
    );
    $stmt->execute($params);
    move_uploaded_file($_FILES['movie2']['tmp_name'], '../../video/'.$video_name);
    $message2="変更しました。";
    $old_movie2=htmlentities($_POST['old_movie2']);
    unlink('../../video/'.$old_movie2);
    header("location: edit-sub.php?&message2=$message2");
    exit();
}

if ($_FILES['sub1']){
    if($_FILES['sub1']['size']==0){
        $message3="画像が選択されていません";
        header("location: $referer?&message3=$message3");
        exit();
    }
    $ext=pathinfo($_FILES['sub1']['name'],PATHINFO_EXTENSION);
    if($ext!='png' && $ext!='jpg' && $ext!='jpeg'){
        $message3="$ext は選択できません";
        header("location: $referer?&message3=$message3");
        exit();
    }
    $img_name=md5(uniqid(rand(),true)).'.jpg';
    $stmt=$pdo->prepare('update coaches set sub1=:sub1 where mail=:me');
    $params=array(
        ':sub1'=>$img_name,
        ':me'=>$me
    );
    $stmt->execute($params);
    move_uploaded_file($_FILES['sub1']['tmp_name'], '../../img/'.$img_name);
    $message3="変更しました。";
    $old_sub1=htmlentities($_POST['old_sub1']);
    unlink('../../img/'.$old_sub1);
    header("location: edit-sub.php?&message3=$message3");
    exit();
}

if ($_FILES['sub2']){
    if($_FILES['sub2']['size']==0){
        $message4="画像が選択されていません";
        header("location: $referer?&message4=$message4");
        exit();
    }
    $ext=pathinfo($_FILES['sub2']['name'],PATHINFO_EXTENSION);
    if($ext!='png' && $ext!='jpg' && $ext!='jpeg'){
        $message4="$ext は選択できません";
        header("location: $referer?&message4=$message4");
        exit();
    }
    $img_name=md5(uniqid(rand(),true)).'.jpg';
    $stmt=$pdo->prepare('update coaches set sub2=:sub2 where mail=:me');
    $params=array(
        ':sub2'=>$img_name,
        ':me'=>$me
    );
    $stmt->execute($params);
    move_uploaded_file($_FILES['sub2']['tmp_name'], '../../img/'.$img_name);
    $message4="変更しました。";
    $old_sub2=htmlentities($_POST['old_sub2']);
    unlink('../../img/'.$old_sub2);
    header("location: edit-sub.php?&message4=$message4");
    exit();
}

