<?php

class LoginCheckForEmailTest extends PHPUnit_Framework_TestCase
{


  public function test_check_length(){
  	$user=array("Susan");
  	$password=array("sd23%&AVF");
    //$password=array("123");
  	$login=new LoginCheckForEmail($user,$password);
  	
  	$output=$login->password_strength_check();
  	$errors=$output[1];
  	
  	$hashedoutput=$login->password_hash_generation();
  	
  	$passwordVerify=$login->password_and_username_match();
  	
  	//print_r($errors);
  
  	//$this->assertTrue($output[0]);
  	//$this->assertFalse($hashedoutput);
  	$this->assertTrue($passwordVerify);

}

  	
  }
  
 
