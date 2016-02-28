<?php

function ls2($params = '.')
{
  $ls = scandir($params);
  $i = 0;

  while (isset($ls[$i]))
    {
      if ($ls[$i][0] != '.')
	{
	  if (is_dir($ls[$i]))
	    echo "\e[36m" . $ls[$i] . "/" . "\e[0m" . "\n";
	  else if (is_link($ls[$i]))
	    echo "\e[91m" . $ls[$i] . "@" . "\e[0m" . "\n";
	  else if (is_executable($ls[$i]))
	    echo "\e[93m" . $ls[$i] . "*" . "\e[0m" . "\n";
	  else
	    echo $ls[$i] . "\n";
	}
      $i++;
    }
}

function func_ls($params)
{
  if (count($params) == 1)
    {
      if (!file_exists($params[0]))
	echo "ls: $params[0]: No such file or directory\n";
      else if (!is_dir($params[0]))
	echo "ls: $params[0]: Not a directory\n";
      else if (!is_readable($params[0]))
	echo "ls: $params[0]: Permission denied\n";
      else if ($handle = fopen($params[0], "r") == FALSE)
	echo "ls: $params[0]: Cannot open file\n";
      else
	{
	  ls2($params[0]);
	  return (1);
	}
    }
  else
   	ls2();
  return (1);
}

?>