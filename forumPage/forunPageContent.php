<?php
$host = "localhost";
$database = "DBlog";
$user = "mysql";
$password = "mysql";
$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
$url = $_SERVER['REQUEST_URI'];
$url = explode('?', $url)[1];
$user_id = $_SESSION['id'];
$comment_text = $_POST['comment_text'];
$child_comment_text = $_POST['child_comment_text'];
$query_name = "SELECT forum.`name`, forum.`text`, user.`name`, forum.`date` FROM `forum` inner join `user` on forum.`user_id` = user.`user_id` WHERE forum.`forum_id`='$url'";
$result_name = mysqli_query($link, $query_name) or die("Ошибка " . mysqli_error($link));
$query_comment = "SELECT comment.`comment`, user.`name`, comment.`date`, user.`admin`, comment.`comment_id` FROM `comment` inner join `user` on comment.`user_id` = user.`user_id` WHERE comment.`forum_id`='$url' order by comment.`date`";
$result_comment = mysqli_query($link, $query_comment) or die("Ошибка " . mysqli_error($link));
$query_comment = "INSERT INTO `comment`(`forum_id`, `user_id`, `comment`) VALUES ('$url', '$user_id','$comment_text')";
if (isset($_POST['comment_submit'])) {
    mysqli_query($link, $query_comment) or die("Ошибка " . mysqli_error($link));
}
if ($result_name) {
    $rows = mysqli_num_rows($result_name);
    for ($i = 0; $i < $rows; ++$i) {
        $row = mysqli_fetch_row($result_name);
    }
    echo "<div class='forum_headline'>";
    echo $row[0];
    echo "</div>";
    echo "<div class='forum_question'>";
    echo $row[1];
    echo "</div>";
    echo "<div class='forum_question_info'>";
    echo "<div class='forum_question_info_author'>";
    echo $row[2];
    echo "</div>";
    echo "<div class='forum_question_info_date'>";
    echo $row[3];
    echo "</div>";
    echo "</div>";
    echo "<div class='forum_comments_block'>";
    echo "<h2>Ответы</h2>";
    if ($result_comment) {
        $rows_comment = mysqli_num_rows($result_comment);
        for ($j = 0; $j < $rows_comment; ++$j) {
            $row_comment = mysqli_fetch_row($result_comment);
            $comment = $row_comment[4];
            echo "<div class='forum_comment'>";
            echo "<div class='forum_comment_image'>";
            if ($row_comment[3] == 1) {
                echo "<img src='https://img.icons8.com/ios/100/000000/businessman-filled.png'/>";
            } else {
                echo "<img src='https://img.icons8.com/ios/100/000000/guest-male-filled.png'/>";
            }
            echo "</div>";
            echo "<div class='forum_comment_content'>";
            echo "<div class='forum_comment_content_user'>";
            echo "<div class='forum_comment_content_user_name'>";
            echo $row_comment[1];
            echo "</div>";
            echo "<div class='forum_comment_content_user_date'>";
            echo $row_comment[2];
            echo "</div>";
            echo "<div class='forum_comment_content_user_answer'>";
            echo "<span id='answer_button$comment'>Ответить</span>";
            echo "</div>";
            echo "</div>";
            echo "<div class='forum_comment_content_answer'>";
            echo $row_comment[0];
            echo "</div>";
            echo "</div>";
            echo "</div>";
            $query_child_comment = "SELECT child_comment.`child_comment_text`, user.`name`, child_comment.`date`, user.`admin` FROM `child_comment` inner join `user` on child_comment.`user_id` = user.`user_id` WHERE child_comment.`comment_id`=$comment";
            $result_child_comment = mysqli_query($link, $query_child_comment) or die("Ошибка " . mysqli_error($link));
            $child_query_comment = "INSERT INTO `child_comment`(`comment_id`, `user_id`, `child_comment_text`) VALUES ('$comment', '$user_id','$child_comment_text')";
          
            if (isset($_POST['child_comment_submit'])) {
                mysqli_query($link, $child_query_comment) or die("Ошибка " . mysqli_error($link));
            }
            if ($result_child_comment) {
                $rows_child_comment = mysqli_num_rows($result_child_comment);
                for ($l = 0; $l < $rows_child_comment; ++$l) {
                    $row_child_comment = mysqli_fetch_row($result_child_comment);
                    echo "<div class='forum_child_comment'>";
                    echo "<div class='forum_child_comment_image'>";
                    if ($row_child_comment[3] == 1) {
                        echo "<img src='https://img.icons8.com/ios/100/000000/businessman-filled.png'/>";
                    } else {
                        echo "<img src='https://img.icons8.com/ios/100/000000/guest-male-filled.png'/>";
                    }
                    echo "</div>";
                    echo "<div class='forum_child_comment_content'>";
                    echo "<div class='forum_child_comment_content_user'>";
                    echo "<div class='forum_child_comment_content_user_name'>";
                    echo $row_child_comment[1];
                    echo "</div>";
                    echo "<div class='forum_child_comment_content_user_date'>";
                    echo $row_child_comment[2];
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='forum_child_comment_content_answer'>";
                    echo $row_child_comment[0];
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                }
                if ($_SESSION['login'] == !'') {
                    echo "<div class='forum_child_comment_form' id='answer_form$comment'>";
                    echo "<form method='POST'><textarea id='child_comment' name='child_comment_text'></textarea>";
                    echo "<input type='submit' name='child_comment_submit' value='Отправить' class='forum_child_comment_form_button'/></form>";
                    echo "</div>";
                }
            }
        }
    }
    echo "</div>";
}
if ($_SESSION['login'] == !'') {
    echo "<div class='forum_comment_form'>";
    echo "<form method='POST'><textarea id='comment' name='comment_text'></textarea>";
    echo "<span id='code' class='forum_comment_form_button'><Код></span>";
    echo "<input type='submit' name='comment_submit' value='Отправить' class='forum_comment_form_button'/></form>";
    echo "</div>";
}
?>
<script>
    $('.forum_comments_block').load(document.URL + ' .forum_comments_block');
    var text = document.getElementById('comment');
    $(document).on("click", "#code", function() {
        code();
    });
    function code() {
        if (text.selectionStart != undefined) {
            var startPos = text.selectionStart;
            var endPos = text.selectionEnd;
            var selectedText = text.value.substring(startPos, endPos)
            console.log(selectedText)
        }
        if (selectedText) {
            var v = text.value.substring(0, startPos);
            v += "<xmp>" + selectedText + "</xmp>";
            v += text.value.substring(endPos);
            text.value = v;
        }
    }
    $(function() {
        $('#comment').keyup(function(e) {
            if (e.keyCode == 13) {
                var curr = getCaret(this);
                var val = $(this).val();
                var end = val.length;
                $(this).val(val.substr(0, curr) + '<br>' + val.substr(curr, end));
            }
        })
    });
    function getCaret(el) {
        if (el.selectionStart) {
            return el.selectionStart;
        } else if (document.selection) {
            el.focus();
            var r = document.selection.createRange();
            if (r == null) {
                return 0;
            }
            var re = el.createTextRange(),
                rc = re.duplicate();
            re.moveToBookmark(r.getBookmark());
            rc.setEndPoint('EndToStart', re);
            return rc.text.length;
        }
        return 0;
    }
    
</script> 