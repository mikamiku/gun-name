<!DOCTYPE html>
<html>
    <head>
       <meta charset = "UTF-8">
        <title>フォーム</title>
    </head>
    <body>
        <form action="mission_1-6.php" method="post">
            
        <input type="text" name="comment"  value="コメント" />
        <input type="submit" value="送信" />    
                       
        </form>
   <?php
   
   if( isset($_POST['comment']) === true ) {
    
    $comment = $_POST['comment'];
    
    $filename = 'mission_1-6_sagawa.txt';
    
    $fp = fopen($filename,'a');
    
    fwrite($fp, $comment."\n");
    
    fclose($fp);
       
    if($comment === '完成！'){
        echo'おめでとう！';
    }elseif($comment){
        echo'ご入力ありがとうございます。'.'<br>'.
        date("Y年m月d日 H時i分s秒").'に'.$_POST['comment'].'を受け付けました。';
    }
}
 
     ?>    
    </body>
</html>