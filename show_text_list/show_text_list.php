<?PHP
require('./../db/db_connect.php');
?>

<!doctype html>
<head>
<meta charset="UTF-8">
<title>커뮤니티</title>
</head>
<body>
<div id="board_area"> 
  <h1>자유게시판</h1>
  <h4>자유롭게 글을 쓸 수 있는 게시판입니다.</h4>
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
          $sql = $link->query("select number, id, title, post_date, view_cnt from posting_tbl order by number desc limit 0,10"); 
            while($posting = $sql->fetch_array())
            {
              //title변수에 DB에서 가져온 title을 선택
              $title=$posting["title"]; 
              if(strlen($title)>30)
              { 
                //title이 30을 넘어서면 ...표시
                $title=str_replace($posting["title"],mb_substr($posting["title"],0,30,"utf-8")."...",$posting["title"]);
              }
        ?>
      <tbody>
        <tr>
          <td width="70"><?php echo $posting["number"]; ?></td>
          <td width="500"><a href="./../read_posting/read_text.php?number=<?php echo $posting["number"];?>"><?php echo $title;?></a></td>
          <td width="120"><?php echo $posting["id"]?></td>
          <td width="100"><?php echo $posting["post_date"]?></td>
          <td width="100"><?php echo $posting["view_cnt"]; ?></td>
        </tr>
      </tbody>
      <?php } ?>
    </table>
    <div id="write_btn">
      <a href="./../write_text/write_text.php"><button>글쓰기</button></a>
    </div>
  </div>
</body>
</html>

