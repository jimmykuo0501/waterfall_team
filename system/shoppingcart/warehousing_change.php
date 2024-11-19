<!-- 程式範例：delete.php -->
<!DOCTYPE html>
<html>  
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../CSS_folder/change.css">
<title>shoppingcart.php</title>
<?php 
//echo var_dump($_GET);
   if(isset($_GET["number"])){
        $link = @mysqli_connect("localhost","root","A12345678") 
         or die("無法開啟MySQL資料庫連接!<br/>");
            mysqli_select_db($link, "system");  // 選擇資料庫
            // 建立新增記錄的SQL指令字串
            $sql ="UPDATE warehousing SET num=".$_GET["number"]." WHERE gType=\"".$_GET["type"]."\";";
            
            echo $sql;
            mysqli_query($link, 'SET NAMES utf8'); 
            if ( mysqli_query($link, $sql) ){ // 執行SQL指令
               echo "資料庫更新記錄成功, 影響記錄數: ". 
            mysqli_affected_rows($link) . "<br/>";
            }else{
               die("資料庫更新記錄失敗<br/>");}
            mysqli_close($link);      // 關閉
            header("Location: warehousing.php");  // 轉址
      }else{
         echo "<form action=\"warehousing_change.php\" method=\"get\">";
         echo "<label for=\"type\">type:</label>";
         echo "<input type=\"text\" name=\"type\" id=\"type\"  value=\"".$_GET["Id"]."\" readonly><br>";
         echo "<label for=\"number\">number:</label>";
         echo "<input type=\"number\" name=\"number\" id=\"number\"/><br>";
         echo "<input type=\"submit\" data-role=\"button\" id=\"button\" value=\"submit\"></input>";
         echo "</form>";
      }

?>
</head>
