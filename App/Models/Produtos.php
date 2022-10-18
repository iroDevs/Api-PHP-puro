<?php

namespace App\Models;

class Produtos
    {
        private static $table = 'produtos';

        public static function get(int $id)
            {
                $connPdo = new \PDO(DBDRIVE.': host='.DBHOST.'; dbname='.DBNAME,DBUSER,DBPASSWORD);

                $sql = "SELECT * FROM".self::$table.' WHERE id = :id';
                $stmt = $connPdo->prepare($sql);
                $stmt->bindValue(":id",$id);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    return $stmt->fetch(\PDO::FETCH_ASSOC);
                }else {
                    throw new \Exception("Nenhum usuario encontardo");
                }
            }

    }