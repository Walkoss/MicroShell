<?php

function func_env($params)
{
  if (isset($_ENV))
    {
     do
       {
	 echo key($_ENV) . '=' . current($_ENV) . "\n";
       } while (next($_ENV));
    }
    reset($_ENV);
  return (1);
}
?>