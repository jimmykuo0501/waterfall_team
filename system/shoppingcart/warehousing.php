<!DOCTYPE html>
<html>  
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../CSS_folder/warehousing.css">
<title>shoppingcart.php</title>
<?php
function each(&$array) {
   $res = array();
   $key = key($array);
   if($key !== null){
       next($array); 
       $res[1] = $res['value'] = $array[$key];
       $res[0] = $res['key'] = $key;
   }else{
       $res = false;
   }
   return $res;
}
?>
</head>
<body bgcolor="#FFFCD6" text="blue">
   <div data-role="header" class="head">
            <h1>家具租賃系統 倉儲</h1>
        </div>
<table border="0" class="t1">
  <tr bgcolor="#C7AE75">
   <td>function</td><td>type</td><td>number</td></tr>
<?php
   // 建立MySQL的資料庫連接 
   $link = mysqli_connect("localhost","root",
                          "A12345678","system")
        or die("無法開啟MySQL資料庫連接!<br/>");
   // 建立SQL指令字串
   $sql = "SELECT * FROM warehousing";
   // 執行SQL查詢
   $result = mysqli_query($link, $sql);
   $data=$result->fetch_all();
   $total_number = mysqli_num_rows($result);
   
     //$price = 0;
     //$quantity = 0; // 顯示選購的商品資料
      $i=0;
   
   while ( $i<$total_number) {
      echo "<tr bgcolor='#E6C987'>";
      echo "<td><a href='warehousing_delete.php?Id=".$data[$i][0]."' method=\"get\" name=\"id\" id=\"id\">";
      echo "刪除</a><a href='warehousing_change.php?Id=".$data[$i][0]."' method=\"get\" name=\"id\" id=\"id\">更改</a></td>";
      echo "<td>" . $data[$i][0] . "</td>";
      echo "<td>" . $data[$i][1] . "</td>";
      
      echo "</tr>";
      $i=$i+1;
   }
     

 mysqli_close($link);      // 關閉

?>
</table>
<hr/>
<div class="block">
<div  class="t1"> | <a href="shoppingcart.php" class="shoppingcart-link">物流</a>| <a href="warehousing.php">倉儲</a>|<a href="warehousing_insert.php">新增</a>|
<div class="image-container">
    <img src="../images/small-truck.jpg" class="hover-image">
    <img src="../images/boxes.jpg" class="default-image">
   </div>
</div>
</div>
</body>
</html>