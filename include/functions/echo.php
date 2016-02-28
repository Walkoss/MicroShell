<?php

function bypass($params)
{
$params = str_replace('\'', '', $params);
$params = str_replace("\"", "", $params);
return ($params);
}

function func_echo($params)
{
  if (isset($params[0]))
    {
      $i = 0;
      while (isset($params[$i]))
	{
	  if ($params[$i] != "")
	    {
	      if (array_key_exists("\"", $params))
		{
		  $params = bypass($params);
		  if (($params[$i][0] == "$") && (array_key_exists(str_replace("$", "", $params[$i]), $_ENV)))
		    echo $_ENV[str_replace("$", "", $params[$i])];
		  else
		    echo $params[$i] . " ";
		}
	      else
		{
		  $params = str_replace(" ", "", $params);
		  $params = bypass($params);
		  if (($params[$i][0] == "$") && (array_key_exists(str_replace("$", "", $params[$i]), $_ENV)))
		    echo $_ENV[str_replace("$", "", $params[$i])];
		  else
		    echo $params[$i] . " ";
		}
	    }
	  $i++;
	}
    }
  echo "\n";
  return (1);
}
?>