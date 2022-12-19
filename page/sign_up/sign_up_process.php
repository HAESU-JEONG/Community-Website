<?PHP
require('./../db/db_connect.php');

$hashPassword = password_hash($_POST['sign_up_pw'], PASSWORD_DEFAULT);
echo $hashPassword;

$insert_id = $_POST['sign_up_id'];
$insert_age = $_POST['sign_up_age'];
$insert_address = $_POST['sign_up_address'];

$sql = "insert into account_tbl(id, pw, age, address) values('{$insert_id}', '{$hashPassword}', '{$insert_age}', '{$insert_address}')";
echo $sql;
$result = $link->query($sql);

if ($result == false) {
    echo "저장에 문제가 생겼습니다. 관리자에게 문의해주세요.";
    echo mysqli_error($link);
}
else {
?>
    <script>
        alert("회원가입이 완료되었습니다.");
        location.href = "./../../index.php";
    </script>
<?PHP
}
?>