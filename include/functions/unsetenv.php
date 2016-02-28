<?php

function func_unsetenv($params)
{
  if (count($params) == 1)
    {
      do
	{
	  if ($params[0] == key($_ENV))
	    {
	      unset($_ENV[$params[0]]);
	    }
	} while (next($_ENV));
      reset($_ENV);
    }
  else
    echo "unsetenv: Invalid arguments\n";
  return (1);
}

?>