<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../CSS_folder/insert.css">
    <body>
        <?php
        if(isset($_POST["type"])){
        $link = @mysqli_connect("localhost","root","A12345678") 
         or die("無法開啟MySQL資料庫連接!<br/>");
            mysqli_select_db($link, "system");  // 選擇資料庫
            // 建立新增記錄的SQL指令字串
            $sql ="INSERT INTO warehousing (gType,num ";
            $sql.=") VALUES ('";
            $sql.=$_POST["type"]."','". $_POST["number"]."')";
            
            mysqli_query($link, 'SET NAMES utf8'); 
            if ( mysqli_query($link, $sql) ){ // 執行SQL指令
                echo "資料庫新增記錄成功"."<br/>";
                header("Location: warehousing.php");
            }else{
                die("資料庫新增記錄失敗<br/>");}
            mysqli_close($link);      // 關閉
        }

        ?>
        <form action="warehousing_insert.php" method="post">
            <label for="type">type:</label>
            <input type="text" name="type" id="type" /><br>
            <label for="number">number:</label>
            <input type="number" name="number" id="number"/><br>
            <input type="submit" data-role="button" id="button" value="submit"></input>
    </form>
    </body>
</html>