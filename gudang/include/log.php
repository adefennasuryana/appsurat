<?php
/* ----------------------------------------------
	ADD LOG
---------------------------------------------- */
function add_log($user_id, $product_id, $type, $text)
{
	global $database;
	$user_id		=	safety_filter($user_id);
	$product_id		=	safety_filter($product_id);
	$type			=	safety_filter($type);
	$text			=	safety_filter($text);
	$date			=	date("Y-m-d H:i:s");
	
	mysql_query("INSERT INTO $database->log 
	(date, user_id, product_id, type, text)
	VALUES
	('$date', '$user_id', '$product_id', '$type', '$text')");
	if(mysql_affected_rows() > 0)
	{
		return true;	
	}
	else
	{
		echo mysql_error();
		return false;	
	}
}



?>