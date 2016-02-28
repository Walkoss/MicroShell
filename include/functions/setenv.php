<?php

function func_setenv($params)
{
  if (count($params) == 2)
    $_ENV[$params[0]] = $params[1];
  else
    echo "setenv: Invalid arguments\n";
  return (1);
}

?>