<!DOCTYPE html>
<html>
    <head>
       <meta charset = "UTF-8">
        <title>フォーム</title>
    </head>
    <body>
        <form action="mission_2-1.php" method="post">
            
        名前：<input type="text" name="name"  value="" />   <br>
     コメント： <input type="text" name="comment"  value="" />  <br>
      
       <input type="submit" value="送信" />    
                       
        </form>

<?php
         
    if(isset($_POST['name']) && ($_POST['name'] != "")) {
        if(isset($_POST['comment']) && ($_POST['comment'] != "")){  
     
  
            $filename = 'mission_2-1_sagawa.txt';
          
            $fp = fopen($filename, 'a+');   
             
                     
            $count = count(file($filename))+1;
            $name = $_POST['name'];
            $comment = $_POST['comment'];
            $date = date("Y年m月d日 H:i:s");
            $line = $count.'<>'.$name.'<>'.$comment.'<>'.$date."\n";        
                      
           
            fwrite($fp,$line);
             
 
            $file = file($filename);
             
          
            fclose($fp);
        }
    }
          
?> 

    </body>
</html>