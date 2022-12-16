<?PHP
require('./../db/db_connect.php');
session_start();
    $URL = "./../index.php";
    if(!isset($_SESSION['userId'])) {
?>

    <script>
            alert("로그인이 필요합니다");
            location.replace("<?php echo $URL?>");
    </script>
<?php
        }
?>
<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<!-- <link rel="stylesheet" type="text/css" href="/css/style.css" /> -->
</head>
<body>
	<?php
		$posting_num = $_GET["number"]; /* bno함수에 idx값을 받아와 넣음*/
		$view_result = $link->query("select * from posting_tbl where number ='{$posting_num}'");
		$view = $view_result->fetch_assoc();
		$view_cnt = $view["view_cnt"] + 1;
		$fet = $link->query("update posting_tbl set view_cnt = '{$view_cnt}' where number = '{$posting_num}'");
		$sql = $link->query("select * from posting_tbl where number='{$posting_num}'"); /* 받아온 idx값을 선택 */
		$posting = $sql->fetch_assoc();
	?>
<!-- 글 불러오기 -->
<div id="board_read">
	<h2><?php echo $posting["title"]; ?></h2>
		<div id="user_info">
			<?php echo $posting["id"]; ?> <?php echo $posting["post_date"]; ?> 조회:<?php echo $posting["view_cnt"]; ?>
				<div id="bo_line"></div>
			</div>
			<div id="bo_content">
                <?php echo nl2br("$posting[contents]"); ?>
			</div>
	<!-- 목록, 수정, 삭제 -->
	<div id="bo_ser">
		<ul>
			<li><a href="/">[목록으로]</a></li>
			<li><a href="./../modify_posting/modify_text.php?number=<?echo $posting["number"]; ?>">[수정]</a></li>
			<li><a href="./../delete_posting/delete_text.php?number=<?php echo $posting["number"]; ?>">[삭제]</a></li>
		</ul>
	</div>
</div>
<!--- 댓글 불러오기 -->
<div class="reply_view">
	<h3>댓글목록</h3>
		<?php
			$comment_sql = $link->query("select * from comment_tbl where number='{$posting_num}' order by idx desc");
			while($reply = $comment_sql->fetch_assoc()){ 
		?>
		<div class="dap_lo">
			<div><b><?php echo $reply["id"];?></b></div>
			<div class="dap_to comt_edit"><?php echo nl2br("$reply[comment]"); ?></div>
			<div class="rep_me dap_to"><?php echo $reply['date']; ?></div>
			<div class="rep_me rep_menu">
				<a class="dat_edit_bt" href="#">수정</a>
				<a class="dat_delete_bt" href="#">삭제</a>
			</div>
		</div>
	<?php } ?>

	<!--- 댓글 입력 폼 -->
	<div class="dap_ins">
		<form action="./../comment_write/comment_confirm.php?number=<?php echo $posting_num; ?>" method="post">
			<input type="hidden" name="comment_id" id="comment_id" value="<?=$_SESSION['userId']?>"><?=$_SESSION['userId']?>
			<div style="margin-top:10px; ">
				<textarea name="content" class="reply_content" id="re_content" ></textarea>
				<button id="rep_bt" class="re_bt">댓글 작성하기</button>
			</div>
		</form>
	</div>
</div><!--- 댓글 불러오기 끝 -->
</body>
</html>