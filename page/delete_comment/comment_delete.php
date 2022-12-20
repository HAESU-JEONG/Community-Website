<?php
require('./../db/db_connect.php');
    session_start();
    $URL = "./../../index.php;";
    if(!isset($_SESSION['userId'])) {
?>
    <script>
            alert("로그인이 필요합니다");
            location.replace("<?php echo $URL?>");
    </script>
<?php
    }
	$comment_number = $_GET['idx']; 
	$sql = $link->query("select * from comment_tbl where idx='$comment_number'");//reply테이블에서 idx가 rno변수에 저장된 값을 찾음
	$reply = $sql->fetch_assoc();
	$reply_id = $reply['id'];

    // $posting_num = $_POST['posting_num'];
    // $sql2 = $link->query("select * from posting_tbl where number='$posting_num';");
    // $posting = $sql->fetch_assoc();

    if($_SESSION['userId'] == $reply_id) {
	    $sql3 = $link->query("delete from comment_tbl where idx='$comment_number';");
?>
<script type="text/javascript">alert("삭제되었습니다.");
// location.replace("./../read_posting/read_text.php?number=<?php echo $posting_num; ?>");
history.back();
</script>
<?PHP
    }
    else {
?>
        <script>
            alert("본인이 작성한 댓글만 삭제 가능합니다.");
            history.back();
        </script>
<?PHP
    }
?>