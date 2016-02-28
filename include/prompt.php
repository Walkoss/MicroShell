<?php

require_once('functions/pwd.php');

function prompt()
{
  if (!isset($_ENV['USER']) && isset($_ENV['PWD']))
    echo "\e[1m\e[32m" . "NoName" .
      "\e[0m | \e[94m" . normalizePath($_ENV['PWD']) . " > \e[0m";
  else
    echo "\e[1m\e[32m" . $_ENV['USER'] .
      "\e[0m | \e[94m" . normalizePath($_ENV['PWD']) . " > \e[0m";
}

?>