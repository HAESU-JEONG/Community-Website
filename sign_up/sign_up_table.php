<?PHP
$host = "localhost";
$user = "haesu0903";
$password = "okbaro400!";
$dbname = "haesu0903";

$link = new mysqli($host, $user, $password);
$link->query("use {$dbname}");

$create_tbl = "create table account_tbl(
    id varchar(100) not null primary key,
    pw varchar(100) not null,
    age tinyint(3) unsigned not null,
    address varchar(100) not null
);";
$link->query($create_tbl);
if (!$link) {
    die ("account_tbl 테이블 생성 실패" . $link->connect_error);
}
else echo "account_tbl 테이블 생성 성공<br>";
?>