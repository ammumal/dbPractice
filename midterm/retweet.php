<?php
    $link = mysqli_connect("localhost", "admin", "admin", "TrumpTweets");

    if(mysqli_connect_error()) {
        echo "MariaDB 접속에 실패했습니다. 관리자에게 문의하세요.";
        echo "<br>";
        echo mysqli_connect_error();
        exit();
    }

    $number = $_GET['retweet'];
    //$filtered_number = mysqli_real_escape_string($link, $_GET['number']);

    $query = "
        SELECT content, date, retweets, favorites, mentions, hashtags 
        FROM TrumpTweets
        ORDER BY retweets DESC LIMIT " .$number. ""
        ;

    $result = mysqli_query($link, $query);

    $article = '';
    while ($row = mysqli_fetch_array($result)) {
        $article .= '<tr><td>';
        $article .= $row['content'];
        $article .= '</td><td>';
        $article .= $row['date'];
        $article .= '</td><td>';
        $article .= $row['retweets'];
        $article .= '</td><td>';
        $article .= $row['favorites'];
        $article .= '</td><td>';
        $article .= $row['mentions'];
        $article .= '</td><td>';
        $article .= $row['hashtags'];
        $article .= '</td></tr>';
    }

    mysqli_free_result($result);
    mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> 트럼프 트윗 분석 </title>
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
        <h2><a href="index.php"> 트럼프 트윗 분석 </a> | 리트윗 순위 </h2>
        <table>
            <tr>
                <th>content</th>
                <th>date</th>
                <th>retweets</th>
                <th>favorites</th>
                <th>mentions</th>
                <th>hashtags</th>
            </tr>
            <?= $article ?>
        </table>
</body>
</html>
