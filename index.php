<?php
session_start();
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>커뮤니티</title>
    <link rel="stylesheet" type="text/css" href="./../../css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Gowun+Batang:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="menu">
    <?php
        if (isset($_SESSION['userId'])) {
            echo "{$_SESSION['userId']}님 환영합니다  ";
    ?>
            <!-- <li class="nav-item">
                <a class="nav-link" href="./page/account/update_sign_up_info.php">회원 정보 수정</a>
            </li> -->
            <li class="nav-item d-flex align-items-center" onclick="logout()">
                <a href='./page/login/logout_process.php'>로그아웃</a>
            </li>
    <?php
        } else {
    ?>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./page/sign_up/sign_up_input.php">회원가입 </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="./page/login/login.php">로그인</a>
            </li>

    <?php
        }
    ?>
    <script>
        function logout() {
            console.log("hello");
            const data = confirm("로그아웃 하시겠습니까?");
            if (data) {
                location.href = "./page/login/logout_prcoess.php";
            }

        }
    </script>
    <li class="nav-item">
        <a class="nav-link active" href="./page/write_text/write_text.php">글 쓰기</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="./page/show_text_list/show_text_list.php">전체 글 보기</a>
    </li>
    </div>
</body>
</html>