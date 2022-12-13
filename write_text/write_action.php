<?php
    require('./../db/db_connect.php');

    $id = $_POST["name"];                      //Writer
    $title = $_POST["title"];                  //Title
    $content = $_POST["content"];              //Content
    $date = date('Y-m-d H:i:s');            //Date

    $URL = './../index.php';                   //return URL


    $query = "insert into posting_tbl (number, id, title, contents, post_date, view_cnt) 
            values(null, '{$id}', '{$title}', '{$content}', '{$date}', 0)";


    $result = $link->query($query);
    if($result){
?>      <script>
            alert("<?php echo "글이 등록되었습니다."?>");
            location.replace("<?php echo $URL?>");
        </script>
<?php
    }
    else{
        echo "FAIL";
        echo mysqli_error($link);
    }
?>
 