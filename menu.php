<?php
header('P3P: CP="NOI CURa ADMa DEVa TAIa OUR DELa BUS IND PHY ONL UNI COM NAV INT DEM PRE"');
session_start();
// echo $_SESSION['userId'];
//         if (isset($_SESSION['userId'])) {
//             // echo "{$_SESSION['userId']}님 환영합니다  ";
//             echo "님 환영합니다  ";
/*     ?>
             <!-- <li class="nav-item">
//                 <a class="nav-link" href="./page/account/update_sign_up_info.php">회원 정보 수정</a>
//             </li> -->
<!-- //             <li class="nav-item d-flex align-items-center" onclick="logout()">
//                 <a href='./page/login/logout_process.php'>로그아웃</a>
//             </li> -->
//     <?php
//         } else {
//     ?>
//             <li class="nav-item">
//                 <a class="nav-link active" aria-current="page" href="./page/sign_up/sign_up_input.php" target="content">회원가입 </a>
//             </li>

//             <li class="nav-item">
//                 <a class="nav-link" href="./page/login/login.php" target="content">로그인</a>
//             </li>

//     <?php
//         }
//     ?>
//     <script>
//         function logout() {
//             const data = confirm("로그아웃 하시겠습니까?");
//             if (data) {
//                 location.href = "./page/login/logout_prcoess.php";
//             }

//         }
//     </script>*/
?>
    <li class="nav-item">
        <a class="nav-link active" href="./page/write_text/write_text.php" target="content">글 쓰기</a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="./page/show_text_list/show_text_list.php" target="content">전체 글 보기</a>
    </li>