<!DOCTYPE html>
<html>  
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../CSS_folder/shoppingcart.css">
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
            <h1>家具租賃系統 物流</h1>
        </div>
<table border="0" class="t1">
  <tr bgcolor="#C7AE75">
   <td>function</td><td>ID</td><td>startDate</td><td>arriveDate</td>
   <td>destinstion</td><td>type</td><td>price</td><td>number</td></tr>
<?php
   // 建立MySQL的資料庫連接 
   $link = mysqli_connect("localhost","root",
                          "A12345678","system")
        or die("無法開啟MySQL資料庫連接!<br/>");
   // 建立SQL指令字串
   $sql = "SELECT deliver_goods.dID, deliver_goods.gID, deliver_goods.d_starDate,deliver_goods.d_arriveDate,deliver_goods.destination, goods.gID, goods.gType, goods.gPrice, goods.gNum
FROM deliver_goods
INNER JOIN goods ON deliver_goods.gID = goods.gID;";
   // 執行SQL查詢
   $result = mysqli_query($link, $sql);
   $data=$result->fetch_all();
   $total_number = mysqli_num_rows($result);
   /*echo "<td><a href='delete.php?Id=".$arr."'>";
   echo "刪除</a></td>";*/
     //$price = 0;
     //$quantity = 0; // 顯示選購的商品資料
     $i=0;
     
     while ( $i<$total_number) {
      echo "<tr bgcolor='#E6C987'>";
      echo "<td><a href='delete.php?Id=".$data[$i][0]."' method=\"get\" name=\"id\" id=\"id\">";
      echo "刪除</a></td>";
        echo "<td>" . $data[$i][0] . "</td>";
        
        echo "<td>" . $data[$i][2] . "</td>";
        echo "<td>" . $data[$i][3] . "</td>";
        echo "<td>" . $data[$i][4] . "</td>";
        echo "<td>" . $data[$i][6] . "</td>";
        echo "<td>" . $data[$i][7] . "</td>";
        echo "<td>" . $data[$i][8] . "</td>";
        echo "</tr>";
        $i=$i+1;
      }

?>
</table>
<hr/>
<div  class="t1"> | 
   <a href="shoppingcart.php">物流</a>|
   <a href="warehousing.php" class="warehouse-link">倉儲</a>|                    
<div class ="image-container">
    <img src="../images/small-truck.jpg" class="default-image">
    <img src="../images/boxes.jpg" class="hover-image">
</div>
</div>    

</body>
</html>