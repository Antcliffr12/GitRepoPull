<?php

class API {
    private $conn;
    private $table = 'repos';

    public $id;
    public $name;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    //gets data that is inserted in database ording by highest stars
    function read(){
       $query = "SELECT id, name, url, created_date, last_push_date, description, number_stars FROM " . $this->table . " ORDER BY number_stars DESC";

       $stmt = $this->conn->prepare($query);

         // execute query
         $stmt->execute();
    
         return $stmt;
    }

 


    function create(){
        //insert data into table ignores same keys incase it gets ran twice, no unique ids in this. 
        $query = "INSERT IGNORE INTO
        " . $this->table . "
        SET
        id=:id, name=:name, url=:URL, created_date=:created_date, last_push_date=:last_push_date, description=:description, number_stars=:number_stars";
        $stmt = $this->conn->prepare($query);

        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->URL=htmlspecialchars(strip_tags($this->url));
        $this->created_date=htmlspecialchars(strip_tags($this->created_date));
        $this->last_push_date=htmlspecialchars(strip_tags($this->last_push_date));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->number_stars=htmlspecialchars(strip_tags($this->number_stars));

        // bind values
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":URL", $this->URL);
        $stmt->bindParam(":created_date", $this->created_date);
        $stmt->bindParam(":last_push_date", $this->last_push_date);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":number_stars", $this->number_stars);

           // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;

    }

    public function update(){
        //update query from Update.php and index.php hits the page every 5 seconds for updated record, could be dealyed cuz of GIT API and Mysql not realtime. 
        //create query
        $query = "UPDATE
        " . $this->table . "
        SET
        id=:id, name=:name, url=:URL, created_date=:created_date, last_push_date=:last_push_date, description=:description, number_stars=:number_stars WHERE id = :id";
        $stmt = $this->conn->prepare($query);

          // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->URL=htmlspecialchars(strip_tags($this->url));
        $this->created_date=htmlspecialchars(strip_tags($this->created_date));
        $this->last_push_date=htmlspecialchars(strip_tags($this->last_push_date));
        $this->description=htmlspecialchars(strip_tags($this->description));
        $this->number_stars=htmlspecialchars(strip_tags($this->number_stars));

        // bind values
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":URL", $this->URL);
        $stmt->bindParam(":created_date", $this->created_date);
        $stmt->bindParam(":last_push_date", $this->last_push_date);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":number_stars", $this->number_stars);


              // execute query
              if($stmt->execute()){
                return true;
            }
        
            return false;

        }



  
}



