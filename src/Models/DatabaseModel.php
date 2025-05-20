<?php
namespace Andrefilho\JulianaPrado\Models;
use PDO;

class DatabaseModel{
    private static ?PDO $connection = null;

    private const HOST = 'localhost';
    private const DBNAME = 'juliana_prado';
    private const USER = 'root';
    private const PASS = '';
    private const CHARSET = 'utf8mb4';

    private function __construct() {}
    public static function getConnection(): PDO {
        if (self::$connection === null) {
            $dsn = 'mysql:host=' . self::HOST . ';dbname=' . self::DBNAME . ';charset=' . self::CHARSET;

            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            try {
                self::$connection = new PDO(dsn: $dsn, username: self::USER, password: self::PASS, options: $options);
            } catch (\PDOException $e) {
                die("Erro na conexão com o banco de dados: " . $e->getMessage());
            }
        }

        return self::$connection;
    }
}
