<?php 

/*将 2017-04-15 17:16:18 输出成以下格式：
1) 2017-04-15 （输出年月日）
2) 04-15	（输出月日）
3) 2017-04-20 00:00:00	（日期加5天）*/

$times=strtotime('2017-04-15');
var_dump(date('Y-m-d',$times));//1

echo '<hr>';
var_dump(date('m-d',$times));

var_dump(date('Y-m-d H:i:s',strtotime('+5 day',$times)));





 ?>