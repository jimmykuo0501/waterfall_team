<?php 
   if(isset($_GET["Id"])){
        $link = @mysqli_connect("localhost","root","A12345678") 
         or die("無法開啟MySQL資料庫連接!<br/>");
            mysqli_select_db($link, "system");  // 選擇資料庫
            // 建立新增記錄的SQL指令字串
            $sql ="DELETE FROM deliver_goods WHERE gID=".$_GET["Id"].";";
            $sq2 ="DELETE FROM goods WHERE gID=".$_GET["Id"].";";
            echo $sql;
            mysqli_query($link, 'SET NAMES utf8'); 
            if ( mysqli_query($link, $sql) ){ // 執行SQL指令
               echo "資料庫刪除記錄成功, 影響記錄數: ". 
            mysqli_affected_rows($link) . "<br/>";
            }else{
               die("資料庫刪除記錄失敗<br/>");}
            if ( mysqli_query($link, $sq2) ){ // 執行SQL指令
               echo "資料庫刪除記錄成功, 影響記錄數: ". 
            mysqli_affected_rows($link) . "<br/>";
            }else{
               die("資料庫刪除記錄失敗<br/>");}
            mysqli_close($link);      // 關閉資
      }
header("Location: shoppingcart.php");  // 轉址
?>