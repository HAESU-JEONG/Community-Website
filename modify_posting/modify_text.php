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
    $posting_num = $_GET["number"];
    $sql = $link->query("select * from posting_tbl where number='$posting_num';");
	$posting = $sql->fetch_assoc();
    $posting_id = $posting['id'];

    if($_SESSION['userId'] == $posting_id) {
?>
        <!doctype html>
        <head>
        <meta charset="UTF-8">
        <title>게시판</title>
        <link rel="stylesheet" href="/css/style.css" />
        </head>
        <body>
            <div id="board_write">
                <h1><a href="/">자유게시판</a></h1>
                <h4>글을 수정합니다.</h4>
                    <div id="write_area">
                        <form action="./modify_text_confirm.php?number=<?php echo $posting_num; ?>" method="post">
                            <div id="in_title">
                                <textarea name="title" id="utitle" rows="1" cols="55" placeholder="제목" maxlength="100" required><?php echo $posting['title']; ?></textarea>
                            </div>
                            <div class="wi_line"></div>
                            <div id="in_name">
                            <td><input type="hidden" name="name" value="<?=$_SESSION['userId']?>"> 
                                <?=$_SESSION['userId']?>
                        </td>
                            </div>
                            <div class="wi_line"></div>
                            <div id="in_content">
                                <textarea name="contents" id="ucontent" placeholder="내용" required><?php echo $posting['contents']; ?></textarea>
                            </div>
                            <div class="bt_se">
                                <button type="submit">글 수정</button>
                            </div>
                        </form>
                    </div>
                </div>
            </body>
        </html>
<?PHP
    }
    else {
?>
        <script>
            alert("본인이 작성한 게시글만 수정이 가능합니다.");
            location.replace("<?php echo $URL?>");
        </script>
<?PHP
    }
?>