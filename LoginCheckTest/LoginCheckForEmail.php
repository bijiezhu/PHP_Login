<?php
class LoginCheckForEmail {
	  
	  var $user;
	  var $password;
	  var $hashedPassword;
	  
	 function __construct($user, $password ) {
     $this->user = $user;
     $this->password = $password[0];
     }
	
	public function password_strength_check(){
		$errors=array();
	    $pwd=$this->password;
        $result=true;
        $results=array();
        $count=0;
        
		if (strlen($pwd) < 8) {
			$errors[$count]= "Password too short! ";
			$count++;
			$result=false;
			}

		if (strlen($pwd) >=30) {
			$errors[$count]= "Password too long!";
			$count++;
			$result=false;
		}


		if (!preg_match("#[0-9]+#", $pwd)) {
			$errors[$count]= "Password must include at least one number!";
			$count++;
			$result=false;
		
		}

		if (!preg_match("#[a-z]+#", $pwd)) {
			$errors[$count]= "Password must include at least one letter!";
			$count++;
			$result=false;
		
		}

		if (!preg_match("#[A-Z]+#", $pwd)) {
			$errors[$count]= "Password must include at least one CAPS!";
			$count++;
			$result=false;
		
		}

	   if (!preg_match("#\W+#", $pwd)) {
			$errors[$count]= "Password must include at least one symbol! ";
			$count++;
			$result=false;
			
		}
		
        $results[0]=$result;
        $results[1]=$errors;
        
        if($errors){   
        	print_r($errors);
        	}
     
       /*if(count($errors) > 0){
      foreach($errors as $e){
        echo $e . "<br />";
    }
       }
       */
    
		
		return $results;

	}
	
		public function password_hash_generation(){
		   //may need to put password hash code into database
			$this->hashedPassword=password_hash($this->password,PASSWORD_BCRYPT);
		
		    return $this->hashedPassword;

	 }
	 
	   
		public function password_and_username_match(){
			//need to modify to get the hashedPassword from the database
			$password_verify_result=password_verify($this->password,$this->hashedPassword);
			return $password_verify_result;
			
	 }

}
?>