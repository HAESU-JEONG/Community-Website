<?PHP
require('./../db/db_connect.php');
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
</body>
</html>