<?php
class Database
{
	public static function Conn()
	{
		$conn = new PDO('mysql:host=localhost;dbname=rse','root','');
		$conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $conn;
	}
}
?>