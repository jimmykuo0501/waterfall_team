<?php 
   if(isset($_GET["Id"])){
        $link = @mysqli_connect("localhost","root","A12345678") 
         or die("無法開啟MySQL資料庫連接!<br/>");
            mysqli_select_db($link, "system");  // 選擇資料庫
            // 建立新增記錄的SQL指令字串
            $sql ="DELETE FROM warehousing WHERE gType=\"".$_GET["Id"]."\";";
            
            echo $sql;
            mysqli_query($link, 'SET NAMES utf8'); 
            if ( mysqli_query($link, $sql) ){ // 執行SQL指令
               echo "資料庫刪除記錄成功, 影響記錄數: ". 
            mysqli_affected_rows($link) . "<br/>";
            }else{
               die("資料庫刪除記錄失敗<br/>");}
            mysqli_close($link);      // 關閉資
      }
header("Location: warehousing.php");  // 轉址
?>