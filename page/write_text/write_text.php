<?php
require('./../db/db_connect.php');
    session_start();
    $URL = "./../../index.php";
    if(!isset($_SESSION['userId'])) {
?>

    <script>
            alert("로그인이 필요합니다");
            location.replace("<?php echo $URL?>");
    </script>
<?php
        }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./../../css/style.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
</head>

<body>
<form method = "post" action = "./write_action.php">
<table align = center border=0 cellpadding=2 >
        <tr>
        <td height=20 align= center bgcolor=#ccc><font color=white> 글쓰기</font></td>
        </tr>
        <tr>
        <td bgcolor=white>
        <table id = "board_write">
                <tr>
                <td>작성자</td>
                <td><input type="hidden" name="name" value="<?=$_SESSION['userId']?>"> 
                        <?=$_SESSION['userId']?>
                </td>
                </tr>

                <div id="in_title">
                        <tr>
                        <td>제목</td>
                        <div id="textarea"><td><input type = text name ="title" size=60></td></div>
                        </tr>
                </div>

                <div id="in_content">
                        <tr>
                        <td>내용</td>
                        <div id="textarea"><td><textarea name ="content" cols=85 rows=15></textarea></td></div>
                        </tr>
                </div>

                </table>
                    <center>
                    <!-- <a href="./../../index.php"><button id="option-btn">HOME</button></a> -->
                        <input type = "submit" value="작성">
                </center>
        </td>
        </tr>
        </table>
</form>
</body>

</html>