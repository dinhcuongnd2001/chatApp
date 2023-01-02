<?php

class Connect{
    private $localhost = 'localhost';
    private $username = 'root';
    private $password = '';
    private $database = 'tuVanDinhDuong';

    private function Conn(){
        $conn = mysqli_connect($this->localhost, $this->username, $this->password, $this->database);
        mysqli_set_charset($conn, 'utf8');
        return $conn;
    }

    public function select($sql){
        $connect = $this->Conn();
        $result = mysqli_query($connect, $sql);
        mysqli_close($connect);
        return $result;
    }

    public function excute($sql){
        $conn = $this->conn();
        mysqli_query($conn, $sql);
        mysqli_close($conn);
    }

    public function selectById($sql){
        $conn = $this->Conn();
        $result = mysqli_fetch_array(mysqli_query($conn, $sql));
        mysqli_close($conn);
        return $result;
    }
}