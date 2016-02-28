<?php

function command()
{
  if (!($readline = fgets(STDIN)))
    return (0);
  $params = trim(preg_replace('/\t/', ' ', $readline));
  $params = explode(' ', $params);
  return ($params);
}
?>