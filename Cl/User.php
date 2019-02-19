<?php
class Cl_User
{
	/**
	 * @var will going contain database connection
	 */
	protected $_con;

	/**
	 * it will initalize DBclass
	 */
	public function __construct()
	{
		$db = new Cl_DBclass();
		$this->_con = $db->con;
	}

	/**
	 * this will handles user registration process
	 * @param array $data
	 * @return boolean true or false based success
	 */


	public function registration( array $data )
	{
		if( !empty( $data ) ){

			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);



			// escape variables for security
			$name = mysqli_real_escape_string( $this->_con, $trimmed_data['name'] );
			$password = mysqli_real_escape_string( $this->_con, $trimmed_data['password'] );
			$cpassword = mysqli_real_escape_string( $this->_con, $trimmed_data['confirm_password'] );


			// Check for an email address:
			if (filter_var( $trimmed_data['email'], FILTER_VALIDATE_EMAIL)) {
				$email = mysqli_real_escape_string( $this->_con, $trimmed_data['email']);
			} else {
				throw new Exception( "Please enter a valid email address!" );
			}


			if((!$name) || (!$email) || (!$password) || (!$cpassword) ) {
				throw new Exception( FIELDS_MISSING );
			}
			if ($password !== $cpassword) {
				throw new Exception( PASSWORD_NOT_MATCH );
			}
			$password = md5( $password );
			$query = "INSERT INTO host (host_id, name, email, password, created) VALUES (NULL, '$name', '$email', '$password', CURRENT_TIMESTAMP)";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			};
		} else{
			throw new Exception( USER_REGISTRATION_FAIL );
		}
	}

	public function homestayadd( array $data )
	{
		$host_id = $_SESSION["host_id"];
	  if( !empty( $data ) ){
	    // Trim all the incoming data:
	    $trimmed_data = array_map('trim', $data);
	    // escape variables for security
			  $homestay_name = mysqli_real_escape_string( $this->_con, $trimmed_data['homestay_name'] );
	    $host_name = mysqli_real_escape_string( $this->_con, $trimmed_data['host_name'] );
	    $regular_price = mysqli_real_escape_string( $this->_con, $trimmed_data['regular_price'] );
	    $discount = mysqli_real_escape_string( $this->_con, $trimmed_data['discount'] );
	    //$ssales_date = mysqli_real_escape_string( $this->_con, $trimmed_data['ssales_date'] );
	    //$esales_date = mysqli_real_escape_string( $this->_con, $trimmed_data['esales_date'] );
	    $address = mysqli_real_escape_string( $this->_con, $trimmed_data['address'] );
	    $guest = mysqli_real_escape_string( $this->_con, $trimmed_data['guest'] );
	    $room = mysqli_real_escape_string( $this->_con, $trimmed_data['room'] );
	    $bedroom = mysqli_real_escape_string( $this->_con, $trimmed_data['bedroom'] );
			$food = mysqli_real_escape_string( $this->_con, $trimmed_data['food'] );
	    $detail = mysqli_real_escape_string( $this->_con, $trimmed_data['detail'] );


	    if((!$homestay_name) || (!$host_name) || (!$regular_price) || (!$discount) || (!$address) || (!$guest) || (!$room) || (!$bedroom) || (!$food) || (!$detail) ) {
	      throw new Exception( FIELDS_MISSING );
	    }
	    if ($regular_price == $discount) {
	      throw new Exception( PASSWORD_NOT_MATCH );
	    }

 $query = "INSERT INTO homestay (id, homestay_name, host_name, detail, regular_price, discount, homestay_address, guest, room, bedroom, food, host_id) VALUES (NULL, '$homestay_name', '$host_name', '$detail', '$regular_price', '$discount', '$address', '$guest', '$room', '$bedroom', '$food', '$host_id');";


 $uploads_dir = 'uploads';
foreach ($_FILES["images"]["error"] as $key => $error) {
	 if ($error == UPLOAD_ERR_OK) {
			 $tmp_name = $_FILES["images"]["tmp_name"][$key];
			 // basename() may prevent filesystem traversal attacks;
			 // further validation/sanitation of the filename may be appropriate
			 $name = basename($_FILES["images"]["name"][$key]);
			 move_uploaded_file($tmp_name, "$uploads_dir/$name");
			 $query .= "INSERT INTO homestay_gallery (homestaygallery_id, homestay_id, album) VALUES (NULL, (SELECT MAX(id) FROM homestay), '$name');";
	 }
}


	    if(mysqli_multi_query($this->_con, $query)){
	      mysqli_close($this->_con);
	      return true;
	    };
	  } else{
	    throw new Exception( USER_REGISTRATION_FAIL );
	  }
	}

	public function booking( array $data )
	{
		if (isset($data['checkin'])) {
		$checkin = $data['checkin'];
		$checkout = $data['checkout'];
		$status = $data['status'];
		$cd = strip_tags($data['customer_id']);
		$hd = strip_tags($data['homestay_id']);
		$p = strip_tags($data['payment']);
		echo $checkin;
		$query = "INSERT INTO booking (booking_id, customer_id, check_in, check_out, homestay_id, payment, status) VALUES (NULL, '$cd', '$checkin', '$checkout', '$hd', '$p', '$status')";
		if(mysqli_query($this->_con, $query)){
			mysqli_close($this->_con);
			return true;
		};
		}
		else {
			 throw new Exception( USER_REGISTRATION_FAIL );
		}



	}

	public function registrations( array $data )
	{
		if( !empty( $data ) ){

			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);



			// escape variables for security
			$name = mysqli_real_escape_string( $this->_con, $trimmed_data['name'] );
			$password = mysqli_real_escape_string( $this->_con, $trimmed_data['password'] );
			$cpassword = mysqli_real_escape_string( $this->_con, $trimmed_data['confirm_password'] );


			// Check for an email address:
			if (filter_var( $trimmed_data['email'], FILTER_VALIDATE_EMAIL)) {
				$email = mysqli_real_escape_string( $this->_con, $trimmed_data['email']);
			} else {
				throw new Exception( "Please enter a valid email address!" );
			}


			if((!$name) || (!$email) || (!$password) || (!$cpassword) ) {
				throw new Exception( FIELDS_MISSING );
			}
			if ($password !== $cpassword) {
				throw new Exception( PASSWORD_NOT_MATCH );
			}
			$password = md5( $password );
			$query = "INSERT INTO customer (customer_id, name, email, password, created) VALUES (NULL, '$name', '$email', '$password', CURRENT_TIMESTAMP)";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			};
		} else{
			throw new Exception( USER_REGISTRATION_FAIL );
		}
	}
	/**
	 * This method will handle user login process
	 * @param array $data
	 * @return boolean true or false based on success or failure
	 */
	public function login( array $data )
	{
		$_SESSION['logged_in'] = false;
		$_SESSION['logged_ins'] = false;
		if( !empty( $data ) ){

			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);

			// escape variables for security
			$email = mysqli_real_escape_string( $this->_con,  $trimmed_data['email'] );
			$password = mysqli_real_escape_string( $this->_con,  $trimmed_data['password'] );

			if((!$email) || (!$password) ) {
				throw new Exception( LOGIN_FIELDS_MISSING );
			}
			$password = md5( $password );
			$query = "SELECT customer_id, name, email, created FROM customer where email = '$email' and password = '$password' ";
			$result = mysqli_query($this->_con, $query);
			$data = mysqli_fetch_assoc($result);
			$count = mysqli_num_rows($result);

			$query2 = "SELECT host_id, name, email, created FROM host where email = '$email' and password = '$password' ";
			$result2 = mysqli_query($this->_con, $query2);
			$data2 = mysqli_fetch_assoc($result2);
			$count2 = mysqli_num_rows($result2);
			mysqli_close($this->_con);
			if( $count == 1){
				$_SESSION = $data;
				$_SESSION['logged_in'] = true;
				return true;
			}
			elseif ($count2 == 1) {
				$_SESSION = $data2;
				$_SESSION['logged_ins'] = true;
				return true;
			}
			else{
				throw new Exception( LOGIN_FAIL );
			}
		} else{
			throw new Exception( LOGIN_FIELDS_MISSING );
		}
	}

	public function hostdata()
	{
		$host_id = $_SESSION['host_id'];
		$sql = "SELECT * from host WHERE host_id = '$host_id'";
		$query = mysqli_query($this->_con,$sql);
		$hd = mysqli_fetch_assoc($query);
	return $hd;
	}

	public function bookno()
	{
		$id = $_SESSION['host_id'];
		$sql = "SELECT count(*) AS no from booking join homestay on booking.homestay_id = homestay.id WHERE booking.status = 'reserved' AND homestay.host_id = '$id'";
		$query = mysqli_query($this->_con,$sql);
		$bn = mysqli_fetch_assoc($query);
	return $bn;
	}

	public function bookingdata()
	{
		$id = $_GET['id'];
		$query = "SELECT * FROM booking where homestay_id = '$id'";
		$results = mysqli_query($this->_con, $query)  or die(mysqli_error());
return $results;

		mysqli_close($this->_con);

	}

	public function bookingdatas()
	{
		$id = $_GET['id'];
		$query = "SELECT * FROM booking where homestay_id = '$id'";
		$results = mysqli_query($this->_con, $query)  or die(mysqli_error());
		$bds = array();
		while ( $result = mysqli_fetch_assoc($results) ) {
			$bds[$result['booking_id']] = $result['check_out'];
		}
		mysqli_close($this->_con);
		return $bds;
	}

	public function customerdata()
	{
		$id = $_SESSION['customer_id'];
		$sql = "SELECT * from customer WHERE customer_id = '$id'";
		$query = mysqli_query($this->_con,$sql);
		$cd = mysqli_fetch_assoc($query);
	return $cd;
	}



	public function homestayhost()
	{
		$id = $_SESSION['host_id'];
		$sql = "SELECT * from homestay join homestay_gallery on homestay.id = homestay_gallery.homestay_id WHERE host_id = '$id' group by (homestay.id)";
		$result = mysqli_query($this->_con,$sql);
		return $result;

	}

	public function bookingcustomer()
	{
		$id = $_SESSION['customer_id'];
		$sql = "SELECT * from booking join homestay on booking.homestay_id = homestay.id WHERE booking.customer_id = '$id' order by booking.check_in DESC";
		$result = mysqli_query($this->_con,$sql);
		return $result;

	}

	public function homestaydata()
	{
		$id = $_GET['id'];
		$sql = "SELECT * from homestay join host on homestay.host_id = host.host_id join homestay_gallery on homestay.id = homestay_gallery.homestay_id WHERE homestay.id = '$id'";
		$query = mysqli_query($this->_con,$sql);
		$hsd = mysqli_fetch_array($query);
	return $hsd;
	}



	public function homestaygallery()
	{
		$id = $_GET['id'];
		$query = "SELECT * FROM homestay_gallery where homestay_id = '$id'";
		$results = mysqli_query($this->_con, $query)  or die(mysqli_error());
		$hsg = array();
		while ( $result = mysqli_fetch_assoc($results) ) {
			$hsg[$result['homestaygallery_id']] = $result['album'];
		}
		mysqli_close($this->_con);
		return $hsg;
	}

	public function hostupdate( array $data )
{
$host_id = $_SESSION['host_id'];
	if( !empty( $data ) ){
		// Trim all the incoming data:
		$trimmed_data = array_map('trim', $data);

		// escape variables for security
		$name = mysqli_real_escape_string( $this->_con, $trimmed_data['name'] );
		$gender = mysqli_real_escape_string( $this->_con, $trimmed_data['gender'] );
		$email = mysqli_real_escape_string( $this->_con, $trimmed_data['email'] );
$date = mysqli_real_escape_string( $this->_con, $trimmed_data['date'] );
$phone_no = mysqli_real_escape_string( $this->_con, $trimmed_data['phone_no'] );
$address = mysqli_real_escape_string( $this->_con, $trimmed_data['address'] );

		// Check for an email address:
		if (filter_var( $trimmed_data['email'], FILTER_VALIDATE_EMAIL)) {
			$email = mysqli_real_escape_string( $this->_con, $trimmed_data['email']);
		} else {
			throw new Exception( "Please enter a valid email address!" );
		}


		if((!$name) || (!$email) || (!$phone_no) || (!$address) ) {
			throw new Exception( FIELDS_MISSING );
		}
		//*** Read file BINARY ***'
		$fp = fopen($_FILES["filUpload"]["tmp_name"],"r");
		$ReadBinary = fread($fp,filesize($_FILES["filUpload"]["tmp_name"]));
		fclose($fp);
		$FileData = addslashes($ReadBinary);
		if (!empty($FileData)) {
		$query = "UPDATE host SET picture = '".$FileData."', name = '$name', gender = '$gender', phone_no = '$phone_no', email = '$email', birthday = '$date', address = '$address' WHERE host_id = '$host_id'";
}
		if(mysqli_query($this->_con, $query)){
			mysqli_close($this->_con);
			return true;
		};
	} else{
		throw new Exception( USER_REGISTRATION_FAIL );
	}

			mysqli_close($this->_con);
}



public function customerupdate( array $data )
{
$customer_id = $_SESSION['customer_id'];
if( !empty( $data ) ){
	// Trim all the incoming data:
	$trimmed_data = array_map('trim', $data);

	// escape variables for security
	$name = mysqli_real_escape_string( $this->_con, $trimmed_data['name'] );
	$gender = mysqli_real_escape_string( $this->_con, $trimmed_data['gender'] );
	$email = mysqli_real_escape_string( $this->_con, $trimmed_data['email'] );
$date = mysqli_real_escape_string( $this->_con, $trimmed_data['date'] );
$phone_no = mysqli_real_escape_string( $this->_con, $trimmed_data['phone_no'] );
$address = mysqli_real_escape_string( $this->_con, $trimmed_data['address'] );

	// Check for an email address:
	if (filter_var( $trimmed_data['email'], FILTER_VALIDATE_EMAIL)) {
		$email = mysqli_real_escape_string( $this->_con, $trimmed_data['email']);
	} else {
		throw new Exception( "Please enter a valid email address!" );
	}


	if((!$name) || (!$email) || (!$phone_no) || (!$address) ) {
		throw new Exception( FIELDS_MISSING );
	}
	//*** Read file BINARY ***'
	$fp = fopen($_FILES["filUpload"]["tmp_name"],"r");
	$ReadBinary = fread($fp,filesize($_FILES["filUpload"]["tmp_name"]));
	fclose($fp);
	$FileData = addslashes($ReadBinary);
	if (!empty($FileData)) {
	$query = "UPDATE customer SET picture = '".$FileData."', name = '$name', gender = '$gender', phone_no = '$phone_no', email = '$email', birthday = '$date', address = '$address' WHERE customer_id = '$customer_id'";
}
	if(mysqli_query($this->_con, $query)){
		mysqli_close($this->_con);
		return true;
	};
} else{
	throw new Exception( USER_REGISTRATION_FAIL );
}

		mysqli_close($this->_con);
}

	/**
	 * This will shows account information and handles password change
	 * @param array $data
	 * @throws Exception
	 * @return boolean
	 */

	public function account( array $data )
	{
		if( !empty( $data ) ){
			// Trim all the incoming data:
			$trimmed_data = array_map('trim', $data);

			// escape variables for security
			$password = mysqli_real_escape_string( $this->_con, $trimmed_data['password'] );
			$cpassword = $trimmed_data['confirm_password'];
			$user_id = mysqli_real_escape_string( $this->_con, $trimmed_data['user_id'] );

			if((!$password) || (!$cpassword) ) {
				throw new Exception( FIELDS_MISSING );
			}
			if ($password !== $cpassword) {
				throw new Exception( PASSWORD_NOT_MATCH );
			}
			$password = md5( $password );
			$query = "UPDATE users SET password = '$password' WHERE user_id = '$user_id'";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				return true;
			}
		} else{
			throw new Exception( FIELDS_MISSING );
		}
	}

	/**
	 * This handle sign out process
	 */
	public function logout()
	{
		session_unset();
		session_destroy();
		session_start();
		$_SESSION['success'] = LOGOUT_SUCCESS;
		header('Location: index.php');
	}

	/**
	 * This reset the current password and send new password to mail
	 * @param array $data
	 * @throws Exception
	 * @return boolean
	 */
	public function forgetPassword( array $data )
	{
		if( !empty( $data ) ){

			// escape variables for security
			$email = mysqli_real_escape_string( $this->_con, trim( $data['email'] ) );

			if((!$email) ) {
				throw new Exception( FIELDS_MISSING );
			}
			$password = $this->randomPassword();
			$password1 = md5( $password );
			$query = "UPDATE users SET password = '$password1' WHERE email = '$email'";
			if(mysqli_query($this->_con, $query)){
				mysqli_close($this->_con);
				$to = $email;
				$subject = "New Password Request";
				$txt = "Your New Password ".$password;
				$headers = "From: admin@smarttutorials.net" . "\r\n" .
						"CC: admin@smarttutorials.net";

				mail($to,$subject,$txt,$headers);
				return true;
			}
		} else{
			throw new Exception( FIELDS_MISSING );
		}
	}

	/**
	 * This will generate random password
	 * @return string
	 */

	private function randomPassword() {
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); //remember to declare $pass as an array
		$alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
		for ($i = 0; $i < 8; $i++) {
			$n = rand(0, $alphaLength);
			$pass[] = $alphabet[$n];
		}
		return implode($pass); //turn the array into a string
	}
}
