<?php

  /*
    This fork of https://github.com/joshdick/miniProxy
    This is simply a Heavily modified version by Tristan Schlarman (https://github.com/schlarmanorg)
  */

  // Include Config file
  include_once("config.php");

  // MD5 Key Generation (https://stackoverflow.com/questions/637278/what-is-the-best-way-to-generate-a-random-key-within-php#637322)
  function rand_md5($length) {
    $max = ceil($length / 32);
    $random = "";
    for ($i = 0; $i < $max; $i ++) {
      $random .= md5(microtime(true).mt_rand(10000,90000));
    }
    return substr($random, 0, $length);
  }

  /* ======= Managing Keys ======= */

  // Check if cookies
  if(isset($_COOKIE[$cookie_name])) {
    echo $_COOKIE[$cookie_name]; // This is just testing
  } else {
    // If cookie isn't set (New user of old cookie expired), set new one
    setcookie($cookie_name, rand_md5(35), time()+86400, "/", $cookie_domain);
    /*
      $cookie_name & cookie_domain are located in the config.php file
      time()+86400 sets cookie expiration to 24 hours
      rand_md5(35) creates a 35 character md5 key
    */
  }

  /* ======= End of Key Management ======= */

  /* ======= Handling proxy requests ======= */
  if(isset($_POST['url'])) {
    $url = $_POST['url'];
    $curl_handle = curl_init();
    curl_setopt( $curl_handle, CURLOPT_URL, $url );
    curl_setopt( $curl_handle, CURLOPT_RETURNTRANSFER, true ); // Fetch the contents too
    $html = curl_exec( $curl_handle ); // Execute the request
    curl_close( $curl_handle );
  }



  // Create Page
  echo "
    <form action='' method='POST'>
      <input type='text' name='url' placeholder='Enter URL'/>
      <input type='submit' name='submit' value='Submit'/>
    </form>
  ";

?>
