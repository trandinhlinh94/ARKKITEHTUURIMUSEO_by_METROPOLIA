<?php 

class DB {
    // The database connection
    public $connection;
    protected $_dbhost;
    protected $_db;
    protected $_dbuser;
    protected $_dbpass;

    public function __construct(){
        $this->connect();
    }

    public function connect(){
        // Load configuration as an array. Use the actual location of your configuration file
        $config = parse_ini_file('../config.ini');  
        
        $_dbhost = $config['dbhost'];
        $_dbname = $config['dbname'];
        $_dbuser = $config['dbuser'];
        $_dbpass = $config['dbpass'];
        
        // Opens a connection to a MySQL server.
        $this->connection = mysqli_connect($_dbhost, $_dbuser, $_dbpass, $_dbname);
        var_dump($this->connection);
        // If connection was not successful, handle the error
        if($this->connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
            return false;
        }
        return $this->connection;
    }

    public function disconnect(){
        // TODO 
    }

    /**
     * Query the database
     *
     * @param $query The query string
     * @return mixed The result of the mysqli::query() function
     */
    public function query($query) {
        try{
        // Connect to the database
        // $connection = $this -> connect();

        // Query the database
        $result = mysqli_query($this->connect(), $query);

        return $result;
        } catch(Exception $exception) {
            print_r("query error!");
        }
    }

    /**
     * Fetch rows from the database 
     *
     * @param $query The query string
     * @return bool False on failure / array Database rows on success
     */
    
    public function fetch_array($result) {
    
        return mysqli_fetch_array($result);
    
    }

    /**
     * Fetch the last error from the database
     * 
     * @return string Database error message
     */
    public function error() {
        $connection = $this -> connect();
        return $connection -> error;
    }

    /**
    *  Prepare the input before inserting into database. This is to prevent SQL injection
    *
    */
    public function escape_value($string) { 
    $escaped_string = mysqli_real_escape_string($this->connect(), $string);
    return $escaped_string;
    }

}
?>