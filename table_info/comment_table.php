<?PHP
require('./../db/db_connect.php');

$create_tbl = "create table comment_tbl(
    idx int(10) primary key,
    number int(10) not null,
    id char(20) not null,
    comment varchar(1000) not null,
    date datetime not null,
    foreign key(number) reference posting_tbl(number) on update cascade on delete cascade,
    foreign key(id) reference account_tbl(id) on update cascade on delete cascade
);";
$link->query($create_tbl);
if (!$link) {
    die ("comment_tbl 테이블 생성 실패" . $link->connect_error);
}
else echo "comment_tbl 테이블 생성 성공<br>";
?>