<?php
require '../public.php';
/**
 * 定义一个函数,根据传入二维数组,生成一个表格
 *
 */
function table($arr){
    $str = "<table border='1'>";
    $hang = count($arr);
    for($i=0;$i<$hang;$i++){
        $str .= "<tr>";//$srt = $str."<tr>";
        $lie = count($arr[$i]);
        for($j=0;$j<$lie;$j++){
            $str .= "<td>";
            $str .= $arr[$i][$j];
            $str .= "</td>";
        }
        $str .= "</tr>";
    }
    $str .= "</table>" ;
    return $str;
}
$arr = [
    ['李白','杜甫','王维'],
    ['苏轼','韩愈','陆游']
];
echo table($arr);