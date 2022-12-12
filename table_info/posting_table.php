<?PHP
require('./../db/db_connect.php');

$create_tbl = "create table posting_tbl(
    number int(10) primary key,
    id char(20) not null,
    title varchar(100) not null,
    contents varchar(4000) not null,
    post_date date not null,
    view_cnt int(10) unsigned not null,
    foreign key(id) reference account_tbl(id) on update cascade on delete cascade
);";
$link->query($create_tbl);
if (!$link) {
    die ("posting_tbl 테이블 생성 실패" . $link->connect_error);
}
else echo "posting_tbl 테이블 생성 성공<br>";
?>