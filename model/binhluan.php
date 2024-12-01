<?php
    function insert_reviews($noidung, $User_id, $Product_id, $Created_at) {
        $sql = "insert into reviews(noidung, User_id, Product_id, Created_at) values('$noidung', '$User_id', '$Product_id', '$Created_at')";
        pdo_execute($sql);
    }
    function loadall_reviews($Product_id) {
        $sql = "select * from reviews where 1";
        if($Product_id > 0)
        $sql.=" AND Product_id= '".$Product_id."'";
        $sql.=" order by id desc";
        $listbl = pdo_query($sql);
        return $listbl;
    }
    function delete_reviews($id) {
        $sql = "delete from reviews where id =".$id;
        pdo_execute($sql);
    }
?>