<?php
/* ---------------------------------------------------
* Projet synthèse : H2018
* Fait Par : M-A Ramsay
*--------------------------------------------------- */
	class Connection {
		private static $connection;

		public static function getConnection() {
			if (Connection::$connection == null) {
				Connection::$connection = new PDO("oci:dbname=" . DB_ALIAS, DB_USER, DB_PASS);
				Connection::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				Connection::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
			}
			return Connection::$connection;
		}
	}