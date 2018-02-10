<?php
/****************************** START CONFIGURATION ******************************/

//To allow proxying any URL, set $whitelistPatterns to an empty array (the default).
//To only allow proxying of specific URLs (whitelist), add corresponding regular expressions
//to the $whitelistPatterns array. Enter the most specific patterns possible, to prevent possible abuse.
//You can optionally use the "getHostnamePattern()" helper function to build a regular expression that
//matches all URLs for a given hostname.
$whitelistPatterns = array(
  //Usage example: To support any URL at example.net, including sub-domains, uncomment the
  //line below (which is equivalent to [ @^https?://([a-z0-9-]+\.)*example\.net@i ]):
  //getHostnamePattern("example.net")
);

//To enable CORS (cross-origin resource sharing) for proxied sites, set $forceCORS to true.
$forceCORS = false;

//Set to false to report the client machine's IP address to proxied sites via the HTTP `x-forwarded-for` header.
//Setting to false may improve compatibility with some sites, but also exposes more information about end users to proxied sites.
$anonymize = true;

//Start/default URL that that will be proxied when miniProxy is first loaded in a browser/accessed directly with no URL to proxy.
//If empty, miniProxy will show its own landing page.
$startURL = "";

//When no $startURL is configured above, miniProxy will show its own landing page with a URL form field
//and the configured example URL. The example URL appears in the instructional text on the miniProxy landing page,
//and is proxied when pressing the 'Proxy It!' button on the landing page if its URL form is left blank.
$landingExampleURL = "https://unblockit.co/";

// Loading Different Files

  // Proxy Bar File
  $proxy_bar_file = file_get_contents("bar.php");

// Cookie Settings
$cookie_name = "_fe"; // _fe is default
$cookie_domain = ".".$_SERVER['HTTP_HOST'];

/****************************** END CONFIGURATION ******************************/

?>
