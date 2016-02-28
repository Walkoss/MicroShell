<?php

require_once('pwd.php');

function swappwd()
{
  $temp = $_ENV['PWD'];
  $_ENV['PWD'] = $_ENV['OLDPWD'];
  $_ENV['OLDPWD'] = $temp;
  chdir($_ENV['PWD']);
  normalizePath($_ENV['PWD']);
  echo ($_ENV['PWD']) . "\n";
}

function cdabsolute($params)
{
  $_ENV['OLDPWD'] = $_ENV['PWD'];
  $_ENV['PWD'] = $params;
  normalizePath($_ENV['PWD']);
  chdir($params);
}

function cd2($params)
{
  if (!file_exists($params))
    echo "cd: $params: No such file or directory\n";
  else if (!is_dir($params))
    echo "cd: $params: Not a directory\n";
  else if (!is_readable($params))
    echo "cd: $params: Permission denied\n";
  else if ($handle = opendir($params) === FALSE)
    echo "cd: $params: Cannot open directory\n";
  else
    {
      if ($params[0] == "/")
	cdabsolute($params);
      else if ($params == ".")
	chdir('.');
      else
	{
	  $_ENV['OLDPWD'] = $_ENV['PWD'];
	  $_ENV['PWD'] .= "/" . $params . "/";
	  chdir($params);
	}
    }
  return (1);
}

function func_cd($params)
{
  if (count($params) == 1)
    {
      if ($params[0] == '-')
	swappwd();
      else
	cd2($params[0]);
    }
  else if (count($params) == 0)
    {
      $_ENV['OLDPWD'] = $_ENV['PWD'];
      $_ENV['PWD'] = $_ENV['HOME'];
      chdir($_ENV['HOME']);
    }
  return (1);
}

?>