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

$file_name = "mission_1-6_sagawa.txt";

$ret_array = file($file_name);

for( $i = 0;$i < count($ret_array); ++$i){
	
	echo($ret_array[$i]."<br />\n");
}
?>
    </body>
</html>