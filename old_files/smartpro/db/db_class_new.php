<?php

include('db_connect.php');
//class starts here
class crudClass {
    var $table;
    var $nCol;
    var $info;
    //this method inserts into db
    public function smartInsert($columns,$values){
        $table = $this->table;
        $values = "'$values'";
        $values = str_replace(",", "','", $values);
        $query = "INSERT INTO $table(".$columns.") VALUES(".$values.")";
        $exeQuery = mysql_query($query);
        if($exeQuery){
            $this->info = "done,".mysql_affected_rows();
        } else{
            $this->info = "error";
        }
        return $this->info;

    }

    //this method selects data from db

    public function smartFetch($table,$where,$order){

        //order part
        if(isset($order)){
            $order = str_replace("="," ", $order);
            $order = "ORDER BY $order";
        } else{
            $order="";
        }

        if(isset($where)){
            $where = "WHERE $where";
            $query = "SELECT * FROM ".$table." ".$where." ".$order;
        } else{
        $query = "SELECT * FROM ".$table." ".$order;
        }
        $exeQuery = mysql_query($query);
        if($exeQuery){
            $this->info = $exeQuery;
        } else{
            $this->info = "error";
        }
        return $this->info;

    }

    public function smartUpdate($table,$specs,$where){

        $specs = "SET $specs";
        if(isset($where)){
            $where = "WHERE $where";
        $query = "UPDATE ".$table." ".$specs." ".$where;
        }else{
            $query = "UPDATE ".$table." ".$specs."";
        }
        $exeQuery = mysql_query($query);
        if($exeQuery){
            $this->info = "done,".mysql_affected_rows();
        }else {
            $this->info = "error";
        }
        return $this->info;
    }

    public function smartDelete($table,$where){
        if(isset($where)){
            $where = "WHERE $where";
            $query = "DELETE FROM ".$table." ".$where;
            $exeQuery = mysql_query($query);
            if($exeQuery){
                $this->info = "done,".mysql_affected_rows();
            } else{
                $this->info = "error";
            }
        }
    }
}
