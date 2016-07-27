<?php
error_reporting(E_ALL ^ E_NOTICE);
if($_SERVER['HTTP_REFERER']==""){
	session_start();
	session_destroy();
	header("location: seguridad/session.php");
}
include("seguridad/security_system.php");

$directorio = opendir("backups"); //ruta actual
	while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
	{
	    if (!is_dir($archivo))//verificamos si es o no un directorio
	    {
	        unlink('backups/'.$archivo);
	    }
	}

/**/
backup_tables('localhost','root','','solicitudes');

/* backup the db OR just a table */
function backup_tables($host,$user,$pass,$name,$tables = '*'){
	
	include("includes/cnx.php");
	
	//get all of the tables
	if($tables == '*')
	{
		$tables = array();
		$result = mysqli_query($link, 'SHOW TABLES');
		while($row = mysqli_fetch_row($result))
		{
			$tables[] = $row[0];
		}
	}
	else
	{
		$tables = is_array($tables) ? $tables : explode(',',$tables);
	}
	
	//cycle through
	$return="";
	foreach($tables as $table)
	{
		$result = mysqli_query($link, 'SELECT * FROM '.$table);
		$num_fields = mysqli_num_fields($result);
		
		$return.= 'DROP TABLE '.$table.';';
		$row2 = mysqli_fetch_row(mysqli_query($link, 'SHOW CREATE TABLE '.$table));
		$return.= "\n\n".$row2[1].";\n\n";
		
		for ($i = 0; $i < $num_fields; $i++) 
		{
			while($row = mysqli_fetch_row($result))
			{
				$return.= 'INSERT INTO '.$table.' VALUES(';
				for($j=0; $j<$num_fields; $j++) 
				{
					$row[$j] = addslashes($row[$j]);
					$row[$j] = str_replace ("\n","\\n",$row[$j]);
					if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
					if ($j<($num_fields-1)) { $return.= ','; }
				}
				$return.= ");\n";
			}
		}
		$return.="\n\n\n";
	}
	//save file
	$handle = fopen('backups/db-backup-'.time().'-'.(md5(implode(',',$tables))).'.sql','w+');
	fwrite($handle,$return);
	fclose($handle);
	$directorio = opendir("backups"); //ruta actual
	while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
	{
	    if (!is_dir($archivo))//verificamos si es o no un directorio
	    {
	    	$leer= 'backups/'.$archivo;
	        header("Location: $leer");
	    }
	}
}
?>