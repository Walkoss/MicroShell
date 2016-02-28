<?php

function func_rm($param)
{
  $i = 0;

  while (isset($param[$i]))
    {
      unlink($param[$i]);
      $i++;
    }
  return (1);
}

?>