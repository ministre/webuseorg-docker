<?

	$cfg->mysql_host="db";
    $cfg->mysql_user = getenv('MYSQL_USER') ?: 'root';
    $cfg->mysql_pass = getenv('MYSQL_PASSWORD') ?: 'webuse';
    $cfg->mysql_base = getenv('MYSQL_DATABASE') ?: 'webuse';
	$cfg->theme="bootstrap";	
	
?>