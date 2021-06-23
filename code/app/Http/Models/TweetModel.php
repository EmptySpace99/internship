<?php

require_once(__DIR__ . '/../../libs/Database/Database.php');

class TweetModel{
    
    public function create($data=[]){
        try{
            self::checkConnection();

            $stmt= self::$db->prepare("INSERT INTO tweet VALUES (DEFAULT, ?, DEFAULT,DEFAULT,DEFAULT);");
            $stmt->bind_param("s", $data->$request->get("content"));
            
            if($stmt->execute()){
                $last_id = $stmt->lastInsertId();
                $stmt->close();
                return read($last_id);
            }
            else{
                $stmt->close();
            }
        }
        catch(Exception $e){
            self::$db->close();
            die('Caught exception: '.$e->getMessage());
        }
    }

    public function read($id){
        try{
            self::checkConnection();

            $stmt= self::$db->prepare("SELECT * FROM tweet WHERE id=?");
            $stmt->bind_param("s", $id);
            
            if($stmt->execute()){
                $result =  $stmt->get_result();
                $stmt->close();
                if($result->num_rows==1) return $result->fetch_array(MYSQLI_ASSOC);
            }
            else{
                $stmt->close();
            }
        }
        catch(Exception $e){
            self::$db->close();
            die('Caught exception: '.$e->getMessage());
        }
    }

    public function update($data=[]){
    }

    public function delete($id){
    }
}