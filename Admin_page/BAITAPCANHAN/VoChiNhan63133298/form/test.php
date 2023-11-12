<?php
// $list = array("CNTT" => array("KTPM" =>array("Hang","Minh","Ngoan","Hung","Thinh"),
//                                 "HTTT"=>array("Thuy","Son","Nga"),
//                                 "MMT"=>array("Nam","Phuong","Huy","Tuan Anh")),
//                 "NN"=> array("BPD" => array("Binh", "Thuan", "Hoa"),
//                             "DL"=> array("Quynh","Khanh")));
                            
// foreach($list as $khoa => $mon)
// {
//     echo "<h1>$khoa<h2><ul>";

//     foreach($mon as $tenmon => $gv)
//     {
//         echo "<h3> $tenmon <h3> <li> <ul>";
//         foreach($gv as $tengv)
//         {
//             echo "<li> $tengv <li>";
//         }
//         echo "</ul> </li>";
//     }
//     echo "</ul>";
// }

    $s1 = "Sun-Mon-Tue-Wed-Thu-Fri-Sat";
    $arr=explode("-",$s1);
    echo "<pre>";
    var_dump($arr);
    echo "<pre>";

    echo "<br>";

    $s2=implode(",",$arr);
    var_dump($s2);

?>