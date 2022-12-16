<?php
require('./../db/db_connect.php');

    $posting_num = $_GET['number'];
    $comment_id = $_POST["comment_id"];
    $comment_content = $_POST["content"];
    $comment_date = date('Y-m-d H:i:s');
    
    if($posting_num && $_POST['comment_id']){
        $sql = $link->query("insert into comment_tbl(idx, number, id, comment, date) values(null, '$posting_num','$comment_id','$comment_content','$comment_date')");
        echo "<script>alert('댓글이 작성되었습니다.'); 
        location.href='./../read_posting/read_text.php?number=$posting_num';</script>";
    }else{
        echo "<script>alert('댓글 작성에 실패했습니다.'); 
        history.back();</script>";
    }
	
?>