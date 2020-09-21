<?php
  //연결
  $link = mysqli_connect("localhost", "root", "rootroot", "dbp");
  settype($_GET['id'], "int");
  $filtered = array(
    'id' => mysqli_real_escape_string($link, $_GET['id'])
  );
  $query = "
    DELETE
      FROM topic
      WHERE
        id = '{$filtered['id']}'
  ";

  $result = mysqli_multi_query($link, $query);
  //결과 출력
  if($result == false) {
    echo '삭제하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
    error_log(mysql_error($link));
  } else {
    echo '성공했습니다. <a href="index.php">돌아가기</a>';
  }
 ?>
