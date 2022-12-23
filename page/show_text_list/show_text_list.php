<?PHP
require('./../db/db_connect.php');
?>

<!doctype html>
<head>
<meta charset="UTF-8">
<title>커뮤니티</title>
<link rel="stylesheet" type="text/css" href="./../../css/style.css" />
</head>
<body>
<div id="board_area"> 
  <h1>자유게시판</h1>
  <h4>자유롭게 글을 작성할 수 있습니다</h4>
    <table class="list-table">
      <thead>
          <tr>
              <th width="70">번호</th>
                <th width="500">제목</th>
                <th width="120">글쓴이</th>
                <th width="100">작성일</th>
                <th width="100">조회수</th>
            </tr>
        </thead>
        <?php
        // posting_tbl 테이블에서 idx를 기준으로 내림차순해서 10개까지 표시
          $sql = $link->query("select number, id, title, post_date, view_cnt from posting_tbl order by number desc"); 
            while($posting = $sql->fetch_array())
            {
              //title변수에 DB에서 가져온 title을 선택
              $title=$posting["title"]; 
              if(strlen($title)>30)
              { 
                //title이 30을 넘어서면 ...표시
                $title=str_replace($posting["title"],mb_substr($posting["title"],0,30,"utf-8")."...",$posting["title"]);
              }
              //댓글 수 카운트
              $posting_num = $posting["number"];
              $sql2 = $link->query("select * from comment_tbl where number='$posting_num'"); //reply테이블에서 con_num이 board의 idx와 같은 것을 선택
              $rep_count = mysqli_num_rows($sql2); //num_rows로 정수형태로 출력
        ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $posting["number"]; ?></td>
          <td width="500">
            <a href="./../read_posting/read_text.php?number=<?php echo $posting["number"];?>">
              <?php echo $title;?>
              <span class="re_ct">[<?php echo $rep_count; ?>]</span>
            </a>
          </td>
          <td width="120"><?php echo $posting["id"]?></td>
          <td width="100"><?php echo $posting["post_date"]?></td>
          <td width="100"><?php echo $posting["view_cnt"]; ?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <div id="write_btn">
    <a href="./../../index.php"><button id="option-btn">HOME</button></a>
      <a href="./../write_text/write_text.php"><button id="option-btn">글쓰기</button></a>
    </div>
  </div>
</body>
</html>

