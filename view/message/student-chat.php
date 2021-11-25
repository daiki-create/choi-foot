



<!DOCTYPE html>
<html lang="en">
<head>
<script type="text/javaScript">
function Jump() {
    location.href = "#jumpto";
    }
</script>
    <?php include('../../component/head.php');  ?>
</head>
<body onload="Jump()">
<?php
include ('../../component/nav.php')
?>
<div class="main" id="main">
    <div class="left ws-normal">
        <div class="message-parent">
            <?php
            echo htmlentities($_GET['error']);
            session_start();
            $coach=htmlentities($_POST['mail']);
            $me=$_SESSION['mail'];
            $stmt=$pdo->query("select prof from coaches where mail='$coach'");
            foreach ($stmt as $row){
                $coach_prof=$row['prof'];
            }
            $stmt=$pdo->query("select name,prof from students where mail='$me'");
            foreach ($stmt as $row){
                $my_name=$row['name'];
                $student_prof=$row['prof'];
            }
            echo "<div id='my_name' hidden>$my_name</div>
                <div id='student_prof' hidden>$student_prof</div>";
            echo "<div class='messages' id='messages'>";
            $stmt=$pdo->query("select * from messages where (sender='$coach' and receiver='$me') or (sender='$me' and receiver='$coach')");
            foreach ($stmt as $row){
                $content=$row['content'];
                $sender=$row['sender'];
                $sender_name=$row['sender_name'];
                if ($sender===$me){
                    echo ("<br><div class='my-message'>
                                    <div>
                                        <span><img src='../../img/$student_prof' alt='' class='message-icon'></span>
                                        <span>$sender_name</spsn>
                                    </div>
                                    <div class='message-content'>
                                        <p class='ws-pw'>$content</p>
                                    </div>
                                </div>");
                }
                if($sender===$coach){
                    echo ("<br><div class='coach-message'>
                                    <div>
                                        <span><img src='../../img/$coach_prof' alt='' class='message-icon'></span>
                                        <span>$sender_name</spsn>
                                    </div> 
                                    <div class='message-content'>
                                        <p class='ws-pw'>$content</p>
                                    </div>                                
                                </div>");
                }
            }
            echo "</div>";
            ?>
        </div>

        <a name="jumpto"></a>

        <form class="message-form" name="message-form">
            <?php
            echo ("<input type='hidden' value='$coach' id='coach'>")
            ?>
            <textarea class="message-item" id="content" maxlength="400" required></textarea>
            <button type='button' id='message-btn' class="message-btn">送信</button>
        </form>
    </div>
    <div class="right">
        <?php include('../../component/pr.php');  ?>
    </div>
</div>
<?php
include ('../../component/nav2.php');?>
<script>
    $('#message-btn').on('click',function(){
        $.ajax({
            type:"post",
            url:"send-student-message.php",
            dataType:"json",
            data:{content:$('#content').val(),
                mail:$('#coach').val()},
            done:function(){
                console.log("done");
            },
            fail:function () {
                console.log("fail");
            }
        });
        var student_prof=$('#student_prof').text();
        var sender_name=$('#my_name').text();
        var content=$('#content').val();

        $('#messages').append("<br><div class='my-message'><div><img src='../../img/"+student_prof+"' alt='' class='message-icon'><span>"+sender_name+"</spsn></div><div class='message-content'><p>"+content+"</p></div></div>");
        $('#content').val('');
    })
</script>


</body>
</html>
