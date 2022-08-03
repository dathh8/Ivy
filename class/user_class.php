<?php
define('__ROOT1__', dirname(dirname(__FILE__)));
//$filepath = realpath(dirname(__FILE__));
require_once(__ROOT1__."../lib/database.php");
require_once(__ROOT1__."../helper/format.php");
?>
<?php
class user {
    private $db;
    public function __construct(){
        $this -> db = new Database();
    }
}

?>