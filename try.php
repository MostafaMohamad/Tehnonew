<?php
$str_arr = explode( ",", $_GET[ "op" ] );
echo($str_arr[0]);
echo($str_arr[1]);
echo($str_arr[2]);
?>


//SELECT subc_name FROM `recommended` WHERE user_id = 1 GROUP BY subc_name ORDER BY COUNT(subc_name) DESC 
//SELECT Keyword FROM `recommended` WHERE user_id = 1 GROUP BY Keyword ORDER BY COUNT(Keyword) DESC 
//SELECT * FROM products WHERE (products.product_name LIKE '%ace%' OR product_name LIKE '%acer%' OR product_name LIKE '%cer%') AND products.subc_id IN (5,4,2,1)