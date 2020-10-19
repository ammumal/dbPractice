<?php
    $link = mysqli_connect("localhost", "admin", "admin", "employees");

    if(mysqli_connect_error()) {
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    $number = $_GET['number'];
    //$filtered_number = mysqli_real_escape_string($link, $_GET['number']);

    $query = "
        SELECT dept_name, first_name, last_name, from_date, to_date 
        FROM departments
        INNER JOIN dept_emp ON departments.dept_no = dept_emp.dept_no
        INNER JOIN employees ON dept_emp.emp_no = employees.emp_no
        ORDER BY dept_name DESC LIMIT " .$number. ""
        ;

    $result = mysqli_query($link, $query);

    $article = '';
    while ($row = mysqli_fetch_array($result)) {
        $article .= '<tr><td>';
        $article .= $row['dept_name'];
        $article .= '</td><td>';
        $article .= $row['first_name'];
        $article .= '</td><td>';
        $article .= $row['last_name'];
        $article .= '</td><td>';
        $article .= $row['from_date'];
        $article .= '</td><td>';
        $article .= $row['to_date'];
        $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 연봉 정보 </title>
    <style>
        body{
            font-family: Consolas, monospace;
            font-family: 12px;
        }
        table{
            width: 100%;
        }
        th,td{
            padding: 10px;
            border-bottom: 1px solid #dadada;
        }
    </style>
</head>
<body>
        <h2><a href="index.php"> 직원 관리 시스템 </a> | 부서 정보 </h2>
        <table>
            <tr>
                <th>dept_name</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>from_date</th>
                <th>to_date</th>
            </tr>
            <?= $article ?>
        </table>
</body>
</html>