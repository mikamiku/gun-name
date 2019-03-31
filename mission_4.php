<?php
$dsn = 'データベース名';
$user = 'ユーザー名';
$password = 'パスワード';
$pdo = new PDO($dsn,$user,$password);
     
    $sql = "CREATE TABLE mission_4" //データベース内にテーブル作成コマンド("CREATE TABLE")で、テーブルを作成する。
    ."("
    ."id INT,"
    ."name char(32),"
    ."comment TEXT,"
    ."date TEXT,"
    ."password varchar(20)"
    .")";
    $stmt = $pdo -> query($sql);
     
    //編集したいカラムの表示
    if(!empty($_POST['edit'])){
        if(!empty($_POST['password_e']) && $_POST['password_e'] == "g36c"){
             
            $edit = $_POST['edit'];
            $password_e = $_POST['password_e'];
                         
            $sql = 'SELECT * FROM mission_4 ORDER BY id';  //入力したデータをSELECTによって表示する。
            $result = $pdo -> query($sql);
             
            foreach($result as $row){
                if($row['id'] == $edit){
                    $array2 = $row['name'];
                    $array3 = $row['comment'];
                }
            }
        }
    } 
 
?>
 <!DOCTYPE html>
<html>
    <head>
           <meta charset = "UTF-8">
    <title>フォーム</title>
    </head>
    <body>
        <form action="mission_4.php" method="post">
                    
    <input type="text" name="name"  placeholder="名前" value = "<?php echo $array2; ?>"/>  
     <br>
     <input type="text" name="comment"  placeholder="コメント" value = "<?php echo $array3; ?>"/> 
      <input type="hidden" name="editConNum"  value="<?php echo $edit; ?>" /> 
     <br>
    <input type="text" name="password"  placeholder="パスワード" value = ""/>     
    
       <input type="submit" value="送信" />    
       <br>
       <br>
    <input type="text" name="delete"  placeholder="削除対象番号" />      
	<br>
	<input type="text" name="password_d"  placeholder="パスワード" value = ""/>  
	    
    <input type="submit" value="削除" /> 
       <br>
       <br>
       <input type="text" name="edit"  placeholder="編集対象番号" /> 
     <br>
     <input type="text" name="password_e"  placeholder="パスワード" value = ""/>  
         
    <input type="submit" value="編集" /> 
    </form>
 <?php 
    //新規投稿
    if(!empty($_POST['name']) && !empty($_POST['comment']) &&
    empty($_POST['editConNum'])){  
        if(!empty($_POST['password']) && $_POST['password'] == "g36c"){  /*名前とコメントが入力された時、編集番号が未入力である時、そしてパスワード"intern"が入力された時に、下記の動作を行う*/
             
            $sql = 'SELECT * FROM mission_4 ORDER BY id';
            $result = $pdo -> query($sql);
            $count=0;
            $id=0;
            foreach($result as $row){
                $count = $row['id'];
            }
            $id = $count + 1;
             
            $sql = $pdo -> prepare("INSERT INTO mission_4(id, name, comment, date, password) VALUES(:id, :name, :comment, :date, :password)");  //作成したテーブルにINSERTを行ってデータを入力する。
            $sql -> bindValue(':id', $id, PDO::PARAM_INT);
            $sql -> bindParam(':name', $name, PDO::PARAM_STR);
            $sql -> bindParam(':comment', $comment, PDO::PARAM_STR);
            $sql -> bindParam(':date', $date, PDO::PARAM_STR);
            $sql -> bindParam(':password', $password, PDO::PARAM_STR);
             
            $name = $_POST['name'];
            $comment = $_POST['comment'];
            $date = date("Y年m月d日 H:i:s");
            $password = $_POST['password'];
            $sql -> execute();
        }
    }
     
    // カラムの編集
    if(!empty($_POST['editConNum'])){
        $id = $_POST['editConNum'];
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $date = date("Y年m月d日 H:i:s");
        $password_e = $_POST['password'];
         
        $sql = 'SELECT * FROM mission_4 ORDER BY id';
        $result = $pdo -> query($sql);
         
        foreach($result as $row){
            if($row['id'] == $id && $row['password'] == $password_e){
                $sql = "UPDATE mission_4 set name='$name', comment='$comment', date='$date' where id=$id ";
                $result = $pdo -> query($sql);
            }
        }
    }
    
    // カラムの削除
    if(!empty($_POST['delete'])){
        if(!empty($_POST['password_d']) && $_POST['password_d'] == "g36c"){            
            $id = $_POST['delete'];  //削除フォームの番号        
            $sql = "DELETE from mission_4 where id = $id";  //カラムを削除フォームの番号（$id）に基づき、DELETEによって削除する。
            $result = $pdo -> query($sql);                
        }
    }
     
    $sql = 'SELECT * FROM mission_4 ORDER BY id';  //新規投稿・削除・編集などを行なったデータを、SELECT * FROM〜で表示する。
    $result = $pdo -> query($sql);
    foreach($result as $row){
        echo $row['id'].' ';
        echo $row['name'].' ';
        echo $row['comment'].' ';
        echo $row['date'].'<br>';
    }
 
?>    
 
        </body>
</html>