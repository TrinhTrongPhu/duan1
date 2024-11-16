<?php
function getProductDetail($id)
{
    $sql = "SELECT * FROM sanpham where id='$id'";
    $sp = pdo_query_one($sql);
    return $sp;
}
