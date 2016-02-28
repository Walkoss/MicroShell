<?php

function isreadable($file, $text, $i)
{
  if (is_dir($file))
      echo "redirection: $file: Is a directory\n";
  else if (!is_readable($file))
    echo "redirection: $file: Permission denied\n";
  else
    {
      if ($i == 1)
	{
	  $handle = fopen("{$file}", "w");
	  if ($handle == 0)
	    echo "redirection {$file}: Cannot open file\n";
	  else
	    fwrite($handle, $text);
	}
      else if ($i == 2)
	{
	  $handle = fopen("{$file}", "a+");
	  if ($handle == 0)
	    echo "redirection {$file}: Cannot open file\n";
	  else
	    fwrite($handle, "\n" . $text);
	}
    }
}

function redirection($file, $text, $i)
{
  if (file_exists($file))
    isreadable($file, $text, $i);
  else
    {
      $handle = fopen("$file", "w");
      fwrite($handle, "$text");
      isreadable($file, $text, $i);
    } 
}

function redirectionmain($s, $cmd, $function)
{
  if (in_array(">", $cmd))
    {
      if ($function == "func_echo")
	$s = substr($s, 0, strpos($s, ">"));
      $s = rtrim($s, "\n");
      $i = array_search(">", $cmd);
      $cmd[$i + 1] = trim($cmd[$i + 1], "/");
      redirection($cmd[$i + 1], $s, 1);
    }
  else if (in_array(">>", $cmd))
    {
      if ($function == "func_echo")
	$s = substr($s, 0, strpos($s, ">>"));
      $s = rtrim($s, "\n");
      $i = array_search(">>", $cmd);
      $cmd[$i + 1] = trim($cmd[$i + 1], "/");
      redirection($cmd[$i + 1], $s, 2);
    }
  else
    echo $s;
}

?>