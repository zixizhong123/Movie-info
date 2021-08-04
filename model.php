<?php
//Name: zixizhong
class DatabaseAdaptor {
    private $DB; // The instance variable used in every method below
    // Connect to an existing data based named 'first'
    public function __construct() {
        $dataBase =
        'mysql:dbname=imdb_small;charset=utf8;host=127.0.0.1';
        $user =
        'root';
        $password =
        ''; // Empty string with XAMPP install
        try {
            $this->DB = new PDO ( $dataBase, $user, $password );
            $this->DB->setAttribute ( PDO::ATTR_ERRMODE,
                PDO::ERRMODE_EXCEPTION );
        } catch ( PDOException $e ) {
            echo ('Error establishing Connection');
            exit ();
        }
    } // . . . continued
    // Create a statement with a prepare message to the PDO object DB
    
    // Use a different database
    public function getAllActors ($subString) {
        $stmt = $this->DB->prepare( "SELECT * FROM actors where first_name like '%".$subString
            ."%' or last_name like '%".$subString."%'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllMovies ($subString) {
        $stmt = $this->DB->prepare( "SELECT * FROM movies where name like '%".$subString."%'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllRoles ($subString) {
        $stmt = $this->DB->prepare( "SELECT * FROM roles where role like '%".$subString."%'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} // End class DatabaseAdaptor
// Test code: Run as CLI console app
$theDBA = new DatabaseAdaptor ();

// Use DB column names as offsets

?>