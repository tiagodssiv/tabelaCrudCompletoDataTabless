<?php

	/*abstract class Connection
	{
		private static $conn;

		public static function getConn()
		{
			if (self::$conn == null) {
				self::$conn = new PDO('mysql: host=localhost; dbname=leilao;', 'root', '');
			}
			
			return self::$conn;
		}
	}*/
try {
    $conexao = new PDO('mysql: host=localhost; dbname=celke;', 'root', '');
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
} catch (PDOException $erro) {
    echo "Erro na conexão:" . $erro->getMessage();
}?>