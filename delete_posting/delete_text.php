<?php
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
	$posting_num = $_GET['number'];
    $sql = $link->query("select * from posting_tbl where number='$posting_num';");
	$posting = $sql->fetch_assoc();
    $posting_id = $posting['id'];

    if($_SESSION['userId'] == $posting_id) {
	    $sql = $link->query("delete from posting_tbl where number='$posting_num';");
?>
<script type="text/javascript">alert("삭제되었습니다.");</script>
<meta http-equiv="refresh" content="0 url=./../show_text_list/show_text_list.php" />
<?PHP
    }
    else {
?>
        <script>
            alert("본인이 작성한 게시글만 삭제 가능합니다.");
            location.replace("<?php echo $URL?>");
        </script>
<?PHP
    }
?>