<?php

class Config
{
    private $HOSTNAME = "localhost";
    private $USERNAME = "root";

    private $PASSWORD = "";
    private $DB_DATA = "railway";

    private $pasangertable = "pasangertable";


    private $connection;

    public function connect()
    {
        $this->connection = mysqli_connect($this->HOSTNAME, $this->USERNAME, $this->PASSWORD, $this->DB_DATA);
        return $this->connection;
    }
    public function railwayticketbooking($TrainNumber, $TrainName, $EmailId)
    {
        $this->connect();
        $query = "INSERT INTO railwayticketbooking (TrainNumber,TrainName,EmailId) VALUES ('$TrainNumber',$TrainName,'$EmailId');";
        return mysqli_query($this->connection, $query);

    }

    public function updaterailwayticketbooking($TrainNumber, $TrainName, $EmailId,$id)
    {
        $this->connect();
        $query = "UPDATE railwayticketbooking SET TrainNumber='$TrainNumber',TrainName='$TrainName',EmailId='$EmailId',$id;";
        return mysqli_query($this->connection, $query);
    }

    public function fetchallrailwayticketbooking()
    {
        $this->connect();
        $query = "SELECT * FROM railwayticketbooking;";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }

    public function fetchsinglerailwayticketbooking($id)
    {

        $this->connect();
        $query = "SELECT * FROM railwayticketbooking WHERE Id = $id;";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }

    public function deleterailwayticketbooking($id)
    {
        $this->connect();
        $query = "DELETE FROM railwayticketbooking WHERE id = $id;";
        $res = mysqli_query($this->connection, $query);
        return $res;
    }




    // public function fetchsinglepassanger($id)
    // {
    //     $this->connect();
    //     $query = "SELECT *FROM $this->pasangertable WHERE id=$id;";
    //     $res = mysqli_query($this->connection, $query);
    //     $result = mysqli_fetch_assoc($res);
    //     if ($result) {
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

    // public function insertpassanger($PassengerName, $ClassType, $Gender, $passanger_id)
    // {
    //     $this->connect();
    //     $isPassanger = $this->fetchsinglepassanger($passanger_id);
    //     if ($isPassanger) {
    //         $query = "INSERT INTO $this->pasangertable(PassengerName,ClassType,Gender,passanger_id) VALUES ('$PassengerName','$ClassType','$Gender',$passanger_id);";
    //         return mysqli_query($this->connection, $query);

    //     } else {
    //         return false;
    //     }
    // }

}

?>