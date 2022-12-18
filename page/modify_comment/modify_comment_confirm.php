<?php
require('./../db/db_connect.php');
?>
<script type="text/javascript" src="./../js/comment.js"></script>
<?PHP
$comment_num = $_POST['comment_num'];//댓글번호
$sql = $link->query("select * from comment_tbl where idx='$comment_num'"); //reply테이블에서 idx가 rno변수에 저장된 값을 찾음
$reply = $sql->fetch_array();

$posting_num = $_POST['posting_num']; //게시글 번호
$sql2 = $link->query("select * from board where number='$posting_num'");//board테이블에서 idx가 bno변수에 저장된 값을 찾음
$board = $sql2->fetch_array();

$update_content = $_POST['content'];
$sql3 = $link->query("update comment_tbl set content='$update_content' where idx = '$comment_num'");//reply테이블의 idx가 rno변수에 저장된 값의 content를 선택해서 값 저장
?> 
<script type="text/javascript">alert('수정되었습니다.'); location.replace("./../read_posting/read_text.php?number=<?php echo $posting_num; ?>");</script>