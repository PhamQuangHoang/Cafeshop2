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
	public function changetitle($name){
		echo'  <script type="text/javascript">
        function codeAddress() {
           	document.getElementById("title").innerHTML = "'.$name.'";
        }
        window.onload = codeAddress;
        </script>';
	}
	function strlim($len,$in){
		$out = strlen($in) > $len ? substr($in,0,$len)."..." : $in;
		return $out;
	}
	function alert($msg,$location) {
    echo "<script type='text/javascript'>alert('$msg');
							window.location = '".$location."'; 

    		</script>";

}	
	function confirm($msg,$location) {
    echo " <script  type='text/javascript'>
				$(document).ready(function(){
				    $('.send').click(function(){
				        $('.popup').removeClass('hidden');
				        $('.mess').html('".$msg."');
				    });
				    $('.confirm').click(function(){
				        $('.popup').addClass('hidden');
				       	window.location = '".$location."'; 
				    });
				});
			</script>";
}


	function __destruct(){
		mysqli_close($this->conn);
	}












}




 ?>