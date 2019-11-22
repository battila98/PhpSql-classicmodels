<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $blog = new adatbazis(); //class létrehozása
            $blog->kapcsolodas(); //metódus meghívás
            $blog->kilistazas();
            
            $blog->kapcsolatbontas(); //kommunikáció vége metódus
        
            class adatbazis{
                public $servername = "localhost: 3307";
                public $username = "root";
                public $password = "";
                public $dbname = "classicmodels";
                public $conn = NULL;
                public $sql = NULL;
                public $result = NULL;
                public $row = NULL;
                
                public function kapcsolodas(){
                    //Create connection
                    $this->conn = new mysqli(
                            $this->servername, 
                            $this->username,
                            $this->password,
                            $this->dbname);
                    if ($this->conn->connect_error) {
                        die("Connection failed: ".$this->conn->connect_error);
                    }        
                    $this->conn->query("SET NAMES 'UTF8';");
                }
                public function kilistazas(){
                    //echo "asd";
                    $this->sql = "SELECT *"
                            . "FROM `products` "
                            . "WHERE `buyPrice` "
                            . "BETWEEN 90 AND 100 ";
                    $result = $this->conn->query($this->sql);

                     while($row = $result->fetch_assoc()) {
                        echo $row["productName"] . " " . $row["productDescription"];
                        }
                    
                }

                

                public function kapcsolatbontas(){
                    $this->conn->close();
                }
            }
        
        
        
        ?>
    </body>
</html>
