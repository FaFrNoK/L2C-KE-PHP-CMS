<?php

require_once dirname(__FILE__).'/config/database.php';

$schema_path = dirname(__FILE__).'/resourses/database.sql';

exec("c:\xampp\mysql\bin\mysql.exe -u{$database['user']} -p{$database['pass']} -h{$database['host']} -D{$database['name']} < {$schema_path}");

?>