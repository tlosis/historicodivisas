<?php
/**
 * Proyecto Datos historicos Dolaytoday
 *
 * @package			php
 * @author			Tomas Losis<tlosis@gmail.com>
 * @since			Version 1.0 septiembre 2019
 * @description		clases de manejo de base de datos mysql
 */


// My database Class called myDBC
class myDBC {

// our mysqli object instance
public $mysqli = null;

// Class constructor override
public function __construct() {
 
require_once "config.php";        
       
$this->mysqli = 
   new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

if ($this->mysqli->connect_errno) {
    echo "Error MySQLi: ("&nbsp. $this->mysqli->connect_errno 
    . ") " . $this->mysqli->connect_error;
    exit();
 }
   $this->mysqli->set_charset("utf8"); 
}

// Class deconstructor override
public function __destruct() {
   $this->CloseDB();
 }

// runs a sql query
    public function runQuery($qry) {
        $result = $this->mysqli->query($qry);
        return $result;
    }

// runs multiple sql queres
    public function runMultipleQueries($qry) {
        $result = $this->mysqli->multi_query($qry);
        return $result;
    }

// Close database connection
    public function CloseDB() {
        $this->mysqli->close();
    }

// Escape the string get ready to insert or update
    public function clearText($text) {
        $text = trim($text);
        return $this->mysqli->real_escape_string($text);
    }

// Get the last insert id 
    public function lastInsertID() {
        return $this->mysqli->insert_id;
    }

// Gets the total count and returns integer
public function totalCount($fieldname, $tablename, $where = "") 
{
$q = "SELECT count(".$fieldname.") FROM " 
. $tablename . " " . $where;
        
$result = $this->mysqli->query($q);
$count = 0;
if ($result) {
    while ($row = mysqli_fetch_array($result)) {
    $count = $row[0];
   }
  }
  return $count;
}

}

?>
