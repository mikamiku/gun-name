<?php

    if(isset($_POST['name']) && ($_POST['name'] != "")) {
    if(isset($_POST['comment']) && ($_POST['comment'] != "")){  
      
         $filename = 'mission_2-1_sagawa.txt';
         $file = file($filename);
         
            $count = count(file($filename))+1;
            $name = $_POST['name'];
            $comment = $_POST['comment'];
            $date = date("Y年m月d日 H:i:s");
            $line = $count."<>".$name."<>".$comment."<>".$date."\n";
            
            if(empty($_POST['editConNum'])){ 
            $fp = fopen($filename, 'a+'); 
            fwrite($fp, $line); 
            fclose($fp); 
                }           
                }
                }
                
?> 
<?php
        if((isset($_POST['delete'])) && ($_POST['delete'] !="")){
            
            $delete = $_POST['delete'];
            
            $filename = 'mission_2-1_sagawa.txt';            
            $file = file($filename);
            $count = 0;
            foreach ($file as $value) {
                $array = explode("<>", $value);
            if($array[0] == $delete){
                unset($file[$count]);
                file_put_contents('mission_2-1_sagawa.txt',$file);              
                  break;
                }            
               $count++;
            }
        }
    ?>   
    <?php
    $edit = $_POST['edit'];  
    if(ctype_digit($edit)){
        $filename = 'mission_2-1_sagawa.txt';
        $fp = fopen($filename, 'r');
        $file = file($filename);
        foreach($file as $line){
            $array = explode("<>", $line);
            if($edit === $array[0]){
                $array1 = $array[0];
                $array2 = $array[1];
                $array3 = $array[2];
            }
        }
        fclose($fp);
    }
?>    
<!DOCTYPE html>
<html>
    <head>
           <meta charset = "UTF-8">
    <title>フォーム</title>
    </head>
    <body>
        <form action="mission_2-4.php" method="post">
                    
    <input type="text" name="name"  placeholder="名前" value = "<?php echo $array2; ?>"/>   <br>
     <input type="text" name="comment"  placeholder="コメント" value = "<?php echo $array3; ?>"/> 
       <input type="hidden" name="editConNum"  value="<?php echo $array1; ?>" /> 
       
       <input type="submit" value="送信" />    
       <br>
       <br>
    <input type="text" name="delete"  placeholder="削除対象番号" />      
    
    <input type="submit" value="削除" /> 
       <br>
       <br>
       <input type="text" name="edit"  placeholder="編集対象番号" /> 
              
    <input type="submit" value="編集" /> 
    </form>
   <br>
    <?php
    if(!empty($_POST['editConNum'])){
        $editConNum = $_POST['editConNum'];
        $filename = 'mission_2-1_sagawa.txt';
        $file = file($filename);
        $fp = fopen($filename, 'w');
        foreach($file as $line){
            $array = explode("<>", $line);
            if($editConNum == $array[0]){
                $array[1] = $_POST['name'];
                $array[2] = $_POST['comment'];
                $newLines = $array[0]."<>".$array[1]."<>".$array[2]."<>".$array[3];
            }else{
                $newLines = $array[0]."<>".$array[1]."<>".$array[2]."<>".$array[3];
            }
            fwrite($fp, $newLines);
        }
        fclose($fp);
    }
?>
        <?php
        
$file_name = "mission_2-1_sagawa.txt";

$ret_array = file($file_name);

for( $i = 0;$i < count($ret_array); ++$i){
    	
    echo($ret_array[$i]."<br />\n");
  }
?>    
            </body>
</html>