<?php 
class Connect{
	private $username; 
	private $password; 
	private $db; 
	private $servername;
	public $conn;
	function __construct($db){
			$this->username="root";
			$this->password="";
			$this->servername="localhost";
			$this->db=$db;
			$this->conn = mysqli_connect($this->servername,$this->username, $this->password,$this->db);
			mysqli_set_charset($this->conn,"utf8");
			// Check connection
			if (!$this->conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}else{
				//echo "Connected successfully";
		
			}
		}
	public function insert($sql){
			if ($this->conn->query($sql) === TRUE) {
				   return true;
				} else {
					return false;
				}
		}
	public function select($sql){
			$result = $this->conn->query($sql);
			if ($result->num_rows > 0) {
			   while($row = $result->fetch_assoc()){
					     $return[] = $row;
					}
					return $return;
				} else {
				    return 0;
				}
	//                 for($i = 0 ;$i<sizeof($row);$i++){
	//                    print_r($row[$i]['user_pass']);
	//                 }
		}
		

            // Encrypt cookie
      public  function encryptCookie( $value ) {
         $key = 'private';
         $newvalue = base64_encode( mcrypt_encrypt( MCRYPT_RIJNDAEL_256, md5( $key ), $value, MCRYPT_MODE_CBC, md5( md5( $key ) ) ) );
         return( $newvalue );
        }
        //encrypt cookie
   	public function decryptcookie($val){
         $key = 'private';
         $newvalue = rtrim( mcrypt_decrypt( MCRYPT_RIJNDAEL_256, md5( $key ), base64_decode( $val), MCRYPT_MODE_CBC, md5( md5( $key ) ) ), "\0");
         return( $newvalue );
   		 }
	


	function __destruct(){
		mysqli_close($this->conn);
	}












}




 ?>