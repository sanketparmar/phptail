<?php
// full path to log file
define("LOG_PATH", "/var/tmp/");
// Get the path from url request
$log_file = $_GET["file"];

require 'PHPTail.php';
$tail = new PHPTail(LOG_PATH, $log_file);

/**
 * We're getting an AJAX call
 */
if(isset($_GET['ajax']))  {
        echo $tail->getNewLines($_GET['lastsize'], $_GET['grep'], $_GET['invert']);
        die();
}

$tail->generateGUI();
?>
