<?php
  //연결
  $link = mysqli_connect("localhost", "root", "rootroot", "dbp");
  $filtered = array(
    'name' => mysqli_real_escape_string($link, $_POST['name']),
    'profile' => mysqli_real_escape_string($link, $_POST['profile'])
  );
  $query = "
    INSERT INTO author
      (name, profile)
      VALUE (
        '{$filtered['name']}',
        '{$filtered['profile']}'
        )
  ";

  $result = mysqli_query($link, $query);
  //결과 출력
  if ($result == false) {
      echo '저장하는 과정에서 문제가 발생했습니다. 관리자에게 문의하세요.';
      error_log(mysql_error($link));
  } else {
      header('Location: author.php');
  }
