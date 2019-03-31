<?php
$filename='mission_1-2_sagawa.txt';
$fp=fopen($filename,'w');
fwrite($fp,'test');
fclose($fp);
?>