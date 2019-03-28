<?php
	 class database
    {
        function __construct($conn)
        {
            $this->connection = $conn;
        }

        function getData()
        {
            $sql="SELECT * FROM list";
			$result=mysqli_query($this->connection,$sql);
			while($row = mysqli_fetch_array($result)) $rows[] = $row;
			return $rows;
        }

        function insertdata($data){
        	$sql = "INSERT INTO list (name) VALUES ('".$data->item."')";
           	if (mysqli_query($this->connection, $sql)) {
               $data=$this->getData();
               return $data;
            } else {
               return false;
            }
        }
        function delete($data){
            $sql = "DELETE FROM list WHERE id='".$data->item."'";
            if (mysqli_query($this->connection, $sql)) {
               $data=$this->getData();
               return $data;
            } else {
               return false;
            }
        }
    } 
?>