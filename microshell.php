#!/usr/bin/env php
<?php

require_once("include/include.php");
require_once("include/redirection.php");

echo "\e[1;1H\e[2J";
$stop = 1;
newenv();
while ($stop)
  {
    $_ENV['PWD'] = getcwd();
    prompt();
    $cmd = command();
    if (isset($cmd[0]))
      {
	$function = "func_" . $cmd[0];
	$function = str_replace('\'', '', $function);
	$function = str_replace("\"", "", $function);
	if (function_exists($function))
	  {
	    array_shift($cmd);
	    ob_start();
	    $stop = $function($cmd);
	    $s = ob_get_clean();
	    redirectionmain($s, $cmd, $function);
	  }
	else if ($cmd[0] == "")
	  echo $cmd[0] . "Type something ! Retry !\n";
	else
	  echo $cmd[0] . ": Command not found\n";
      }
  }
?>