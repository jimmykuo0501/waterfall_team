<!DOCTYPE html>
<html>
    <body>
        <?php
        session_start();  // 啟用交談期
        if ( isset($_SESSION["ID"]) ) {
            $id = $_SESSION["ID"]; // 取得Session變數
            $name = $_SESSION["Name"];
            $price = $_SESSION["Price"];
            $quantity = $_SESSION["Quantity"];   
        
        }
        $link = @mysqli_connect("localhost","root","A12345678") 
         or die("無法開啟MySQL資料庫連接!<br/>");
            mysqli_select_db($link, "travel");  // 選擇資料庫
            // 建立新增記錄的SQL指令字串
            $sql ="INSERT INTO order_details (order_no, route_no, people_total, coupon, ";
            $sql.="price_total) VALUES ('";
            $sql.=$_SESSION["ID"]."','".$_SESSION["route"]."','";
            $sql.=$_SESSION["Quantity"]."','".$_SESSION["coupon"]."','".$_SESSION["Price"]."')";
            echo "<b>SQL指令: $sql</b><br/>";
            //送出UTF8編碼的MySQL指令
            mysqli_query($link, 'SET NAMES utf8'); 
            if ( mysqli_query($link, $sql) ) // 執行SQL指令
                echo "資料庫新增記錄成功, 影響記錄數: ". 
                    mysqli_affected_rows($link) . "<br/>";
            else
                die("資料庫新增記錄失敗<br/>");
            mysqli_close($link);      // 關閉資
                header("Location: savecart.php");  // 轉址

        ?>
    </body>
</html>