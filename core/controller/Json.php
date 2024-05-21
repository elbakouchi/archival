<?php

class Json{
    public static function load($query){
           /* $cnt = 0;
            $array = array();
            while($r = $query->fetch_array()){
                $array[$cnt] = $r;
                $cnt++;
            }*/
            header('Content-Type: application/json');
            echo json_encode($query);
        }
}