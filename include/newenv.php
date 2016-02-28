<?php

function newenv()
{
  if (!isset($_ENV["USER"]))
    $_ENV["USER"] = "YourLogin";
  if (!isset($_ENV["HOME"]))
    $_ENV["HOME"] = getenv('HOME');
  if (!isset($_ENV["PWD"]))
    $_ENV["PWD"] = getcwd();
}

?>