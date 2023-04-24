<?php
  namespace classes;

  use classes\EnvHandler;
  use mysqli;
  
  /**
   * This class connects to the database and sends query to the database.
   * 
   *   @method userDetails()
   *     This function is used to fetch the details of the user from the
   *     database.
   */
  class Database {

    /**
     *   @var mysqli_object $conn
     *     Stores the object of database connection.
     */
    private $conn;

    /**
     * Constructor is used to connect to the database and store the object of
     * the database in a class variable after successfully connecting.
     * 
     *   @return void
     *     Only stores the object of the database.
     */
    public function __construct() {
      $env = new EnvHandler();
      $envArray = $env->fetchEnvValues();
      $this->conn = new mysqli($envArray["serverName"], $envArray["userName"], $envArray["password"], $envArray["dbName"]);
      if ($this->conn->connect_error) {
        die("Connection failed: " . $this->conn->connect_error);
      }
    }

    /**
     * This function is used to fetch the details of the user from the database.
     * 
     *   @param string $userName
     *     Stores the username of the user.
     * 
     *   @return mixed
     *     Returns an array containing the details of the user if user
     *     exists otherwise NULL.
     */
    public function userDetails(string $emailId) {
      $details = "SELECT * FROM Users WHERE email_id = '$emailId'";
      $result = $this->conn->query($details);
      if ($result && mysqli_num_rows($result) > 0) {
        return $result->fetch_assoc();
      }  
      return NULL;
    }

    /**
     * This function is used to add new player to the database.
     * 
     *   @param string $id
     *     Stores the employee ID.
     *   @param string $name
     *     Stores the employee name.
     *   @param string $type
     *     Stores the type of the player.
     *   @param int $points
     *     Stores the points of the player.
     * 
     *   @return bool
     *     Returns TRUE if the new player is added to the database otherwise
     *     FALSE.
     */
    public function addPlayer(string $id, string $name, string $type, int $points) {
      $add = "INSERT INTO Players (employee_id, employee_name, type, points) VALUES ('$id', '$name', '$type', '$points')";
      return $this->conn->query($add);
    }

    /**
     * This function is used to fetch all the players' details from the
     * database.
     * 
     *   @return array
     *     Returns an associative array containing all the players' details.
     */
    public function fetchPlayerList() {
      $list = "SELECT * FROM Players";
      $result = $this->conn->query($list);
      return $result->fetch_all(MYSQLI_ASSOC);
    }
  }
