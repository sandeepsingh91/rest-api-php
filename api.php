<?php
require_once("Rest.php");

class API extends REST
{

    public $data = "";

    const DB_SERVER = "127.0.0.1";
    const DB_USER = ""; // username here
    const DB_PASSWORD = ""; // password here
    const DB = ""; // db name here

    private $db = NULL;

    public function __construct()
    {
        parent::__construct();                // Init parent contructor
        $this->dbConnect();                    // Initiate Database connection
    }

    /*
         *  Database connection
        */
    private function dbConnect()
    {
        $this->db = mysqli_connect(self::DB_SERVER, self::DB_USER, self::DB_PASSWORD);
        if ($this->db)
            mysqli_select_db($this->db, self::DB);
    }

    /*
         * Public method for access api.
         * This method dynmically call the method based on the query string
         *
         */
    public function processApi()
    {

        $func = strtolower(trim(str_replace("/", "", $_REQUEST['rquest'])));

        if ((int)method_exists($this, $func) > 0) {
            $this->$func();
        } else {
            // If the method not exist with in this class, response would be "Page not found".
            $this->response('Method not found', 404);
        }
    }

    /*
         *    Simple login API
         *  Login must be POST method
         *
         */

    private function login()
    {
        // Cross validation if the request method is POST else it will return "Not Acceptable" status

        if ($this->get_request_method() != "POST") {
            $this->response('', 406);
        }

        $username = $this->_request['username'];
        $password = $this->_request['password'];

        // Input validations

        $sql = $this->db->query("SELECT * FROM Users WHERE username = '$username' AND password = '$password' LIMIT 1");

        if (mysqli_num_rows($sql) > 0) {

            $emparray = array();

            while ($row = mysqli_fetch_assoc($sql)) {
                $emparray[] = $row;
            }
            $this->response($this->json($emparray), 200);
        } else {
            $this->response('No Data found', 204);
        }
    }


    /*
         *    Encode array into JSON
        */
    private function json($data)
    {
        if (is_array($data)) {
            return json_encode($data);
        }
    }
}

// Initiiate Library
$api = new API;
$api->processApi();
