<?php

function func_cat($params)
{
  if (count($params) == 1)
    {
      if (!file_exists($params[0]))
	echo "cat: $params[0]: No such file or directory\n";
      else if (is_dir($params[0]))
	echo "cat: $params[0]: Is a directory\n";
      else if (!is_readable($params[0]))
	echo "cat: $params[0]: Permission denied\n";
      else if ($handle = fopen($params[0], "r") == FALSE)
	echo "cat: $params[0]: Cannot open file\n";
      else
	{
	  $text = file_get_contents($params[0]);
	  echo ($text) . "\n";
	  return (1);
	}
    }
  else
    echo "cat: Invalid arguments\n";
  return (1);
}

?>