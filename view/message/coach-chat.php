



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
<div class="main">
    <div class="left ws-normal" >
        <div class='message-parent'>
            <?php
            echo htmlentities($_GET['error']);
            session_start();
            $student=htmlentities($_POST['mail']);
            $me=$_SESSION['mail'];
            $stmt=$pdo->query("select name,prof from coaches where mail='$me'");
            foreach ($stmt as $row){
                $my_name=$row['name'];
                $coach_prof=$row['prof'];
            }
            $stmt=$pdo->query("select prof from students where mail='$student'");
            foreach ($stmt as $row){
                $student_prof=$row['prof'];
            }
            echo "<div id='my_name' hidden>$my_name</div>
                <div id='coach_prof' hidden>$coach_prof</div>";
            echo "<div class='messages' id='messages'>";
            $stmt=$pdo->query("select * from messages where (sender='$student' and receiver='$me') or (sender='$me' and receiver='$student')");
            foreach ($stmt as $row){
                $content=$row['content'];
                $sender=$row['sender'];
                $sender_name=$row['sender_name'];
                if ($sender===$me){
                    echo ("<br><div class='my-message'>
                                    <div>
                                        <span><img src='../../img/$coach_prof' alt='' class='message-icon'></span>
                                        <span>$sender_name</spsn>
                                    </div>
                                    <div class='message-content'>
                                        <p class='ws-pw'>$content</p>
                                    </div>
                                </div>");
                }
                if($sender===$student){
                    echo ("<br><div class='coach-message'>
                                    <div>
                                        <span><img src='../../img/$student_prof' alt='' class='message-icon'></span>
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

        <form class="message-form">
            <?php
            echo ("<input type='hidden' value='$student' id='student'>")
            ?>
            <textarea class="message-item" id="content" maxlength="400" required></textarea>
            <button type='button' onclick="send()" class="message-btn">送信</button>
        </form>
    </div>
    <div class="right">
        <?php include('../../component/pr.php');  ?>
    </div>
</div>
<?php
include ('../../component/nav2.php');?>
<script>
    function send(){
        $.ajax({
            type:"post",
            url:"send-coach-message.php",
            dataType:"json",
            data:{content:$('#content').val(),
                mail:$('#student').val()},
            done:function(){
                console.log("done");
            },
            fail:function () {
                console.log("fail");
            }
        });
        var coach_prof=$('#coach_prof').text();
        var sender_name=$('#my_name').text();
        var content=$('#content').val();

        $('#messages').append("<br><div class='my-message'><div><img src='../../img/"+coach_prof+"' alt='' class='message-icon'><span>"+sender_name+"</spsn></div><div class='message-content'><p>"+content+"</p></div></div>");
        $('#content').val('');
    }
</script>



</body>
</html>
