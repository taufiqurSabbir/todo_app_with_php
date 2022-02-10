<?php
include'database.php';
class Task extends database{

    public function res($username,$password,$email,$image){
        $query = "INSERT INTO user(username,password,email,image) value('$username','$password','$email','$image')";
        $this->data_write($query);
    }

    public function login($email,$password){
        $query = "SELECT * FROM user where email = '$email' and password = '$password'";
       $result = $this -> data_read($query);
        return $result;
    }

    public function task_add($title,$date,$userid){
        $query = "INSERT INTO task(date ,title,user_id,task_con) value ('$date','$title','$userid','False')";
        $this->data_write($query);
    }


    public function task_com($task_id,$user_id){
        $query = " UPDATE task SET task_con = 'True'WHERE id = '$task_id' and user_id ='$user_id'";
        $this->data_write($query);
    }

    public function task_reverse($task_id,$user_id){
        $query = " UPDATE task SET task_con = 'False' WHERE id = '$task_id' and user_id ='$user_id'";
        $this->data_write($query);
    }

    public function pending_task_read($user_id){
        $query = "SELECT * FROM task where  user_id	= '$user_id' and task_con ='False'";
        return $this->data_read($query);
    }

    public function edit_task($task_id,$user){
        $query = "SELECT * FROM task where  id	= '$task_id' and user_id ='$user'";
        return $this->data_read($query);
    }


    public function edit_update($title,$date,$task_id,$user){
        $query = " UPDATE task SET title = '$title',date='$date'WHERE id = '$task_id' and user_id ='$user' ";
        $this->data_write($query);
    }


    public function com_task_read($user_id){
        $query = "SELECT * FROM task where  user_id	= '$user_id' and task_con ='True'";
        return $this->data_read($query);
    }


    public function delete($task_id){
        $query = "DELETE FROM task where id='$task_id'";
        $this->data_write($query);
    }


}

?>