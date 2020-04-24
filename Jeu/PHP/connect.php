<?php
	define('SERVERNAMEMAP', "localhost");
	define('USERNAMEMAP', "root");
	define('PASSWORDMAP', "");
	define('DBNAMEMAP', "MapsJam");

	function connectBDD() {
		$dsn = "mysql:host=".SERVERNAMEMAP.";dbname=".DBNAMEMAP;
        try{
            $conn = new PDO($dsn, USERNAMEMAP, PASSWORDMAP);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
        }

        return $conn;
	}
	
	// Create connection
?> 