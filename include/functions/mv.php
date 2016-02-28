<?php

function func_mv($params)
{
  rename($params[0], $params[1]);
  return (1);
}

?>