<?php
function loadall_sanpham($kyw,$iddm=0){
    $sql="select * from sanpham where 1"; 
        if ($kyw!="") {
            $sql.=" and name like '%".$kyw."'";
        }
        if ($iddm>0) {
            $sql.=" and iddm = '".$iddm."%'";
        }
        $sql.=" order by id desc";
        $listsanpham=pdo_query($sql);
        return $listsanpham;
}

?>