<?php
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="uft-8">
    <title>트럼프 트윗 분석</title>
</head>
<body>
    <h1>도날드 트럼프 트윗 분석</h1>
    <form action="tweet_keyword.php" method="GET">
        키워드 검색
        <input type="text" name="keyword" placeholder="ex) vote, Trump">
        <input type="submit" value="검색"> <br> <br>
    </form>
    <form action="retweet.php" method="GET">
        리트윗 순위
        <input type="text" name="retweet" placeholder="숫자로만 입력해주세요">
        <input type="submit" value="검색"> <br> <br>
    </form>
    <form action="heart.php" method="GET">
        마음 순위
        <input type="text" name="heart" placeholder="숫자로만 입력해주세요">
        <input type="submit" value="검색"> <br> <br>
    </form>
    
</body>
</html>
