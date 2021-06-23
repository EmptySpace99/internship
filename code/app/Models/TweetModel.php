<?php

require_once(__DIR__ . '/../../libs/Database/Database.php');

class TweetModel
{
    public static function create($data=[]){
        if($data->get("content")=="") return;
        self::checkConnection();
        
        $stmt= self::$db->prepare("INSERT INTO tweet VALUES (DEFAULT, ?,DEFAULT,DEFAULT);");
        $stmt->bind_param("s", $data->get("content"));
        
        try{
            if($stmt->execute()){
                $last_id = $stmt->lastInsertId();
                $stmt->close();
                $row = read();
                return $row;
            }
        }
        catch(Exception $e){
            die('Caught exception: '.$e->getMessage());
        }
    }

    public static function read($id){
        self::checkConnection();
        
        $stmt= self::$db->prepare("SELECT * FROM tweet WHERE id=?;");
        $stmt->bind_param("s", $id);
        
        try{
            if($stmt->execute()){
                $result =  $stmt->get_result();
                $row = $result->fetch_array(MYSQLI_ASSOC);
                $stmt->close();
                return $row;
            }
        }
        catch(Exception $e){
            die('Caught exception: '.$e->getMessage());
        }
    }

    public static function update($data=[]){
        
    }

    public static function delete($id){

    }

    public static function readAll(){

    }

    public static function deleteAll(){

    }
}