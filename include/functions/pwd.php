<?php

function normalizepath($path) {
  $patterns = array('~/{2,}~', '~/(\./)+~', '~([^/\.]+/(?R)*\.{2,}/)~', '~\.\./~');
  $replacements = array('/', '/', '', '');
  return (preg_replace($patterns, $replacements, $path));
}

function func_pwd($params)
{
  echo normalizePath($_ENV['PWD']) . "\n";
  return (1);
}
?>