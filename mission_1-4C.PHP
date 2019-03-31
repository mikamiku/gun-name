<?php
 $msg = $_POST["msg"];
 $today = date('Y年m月d日 H時i分s秒');
 ?>
 
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>フォーム</title>
    </head>
    <body>
        <form action="mission_1-4C.PHP" method="post">
            
        <input type="text" name= "msg" value = "コメント">
        <input type="submit" value="送信" > <br>    
       
       <?php 
       print("ご入力ありがとうございます。<br>". $today . 
       "に" . $msg . "コメントを受け付けました。");
     ?>
    </body>
</html>