<?php
trait HomeModel
{
    public function ModelHotProduct()
    {

        $conn = Connection::getInstance();
        $query = $conn->query("select * from product where not discount= ' '");
        $results = $query->fetchAll();
        return $results;
    }
}
