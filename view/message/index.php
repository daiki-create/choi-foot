



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
        <br><br>
        <div>
            <?php
            session_start();
            $me=$_SESSION['mail'];
            if($_SESSION['student']==true){
                $stmt=$pdo->query("select * from message_posts where student='$me' order by id desc");
                echo "<div class='chat-parent'>";
                
                foreach ($stmt as $row){
                    $coach_name=$row['coach_name'];
                    $coach=$row['coach'];
                    $coach_prof=$row['coach_prof'];
                    echo ("
                    <form name='form1' method='post' action='student-chat.php'>
                        <input type='hidden' value=$coach name='mail'>
                        <button type='submit' class='chat-anchor'>
                            <div class='chat-list'>
                                <div class='chat-icon-parent'><img src='../../img/$coach_prof' class='chat-icon' alt=''></div>
                                <div class='chat-name'>$coach_name</div>
                            </div>
                        </button>
                    </form>
                    ");
                }
                echo "</div>";
            }
            elseif($_SESSION['coach']==true){
                $stmt=$pdo->query("select * from message_posts where coach='$me'");
                echo "<div class='chat-parent'>";
                
                foreach ($stmt as $row){
                    $student_name=$row['student_name'];
                    $student=$row['student'];
                    $student_prof=$row['student_prof'];
                    echo ("
                    <form name='form1' method='post' action='coach-chat.php' class='chat-form'>
                        <input type='hidden' value=$student name='mail'>
                        <button type='submit' class='chat-anchor'>
                            <div class='chat-list'>
                                <div class='chat-icon-parent'><img src='../../img/$student_prof' class='chat-icon' alt=''></div>
                                <div class='chat-name'>$student_name</div>
                            </div>
                        </button>
                    </form>
                    ");
                }
                echo "</div>";
            }
            else{
                echo "<div class='message'><a href='../login'>ログインしてください。</a></div>";
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

