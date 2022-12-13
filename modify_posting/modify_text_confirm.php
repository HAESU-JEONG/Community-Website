<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
require('./../db/db_connect.php');

$posting_num = $_GET["number"];
$username = $_POST["name"];
// $userpw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
$title = $_POST["title"];
$content = $_POST["contents"];
$date = date('Y-m-d H:i:s');
$sql = $link->query("update posting_tbl set title='{$title}', contents='{$content}', post_date='{$date}' where number='{$posting_num}'"); 
if ($sql) {
?>
    <script type="text/javascript">alert("수정되었습니다."); </script>
    <meta http-equiv="refresh" content="0 url=./../show_text_list/show_text_list.php">
<?PHP
}
else {
    echo "fail<br>";
}
?>