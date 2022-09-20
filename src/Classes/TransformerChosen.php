<?php
namespace Transformers\Classes;

use DbException;

class TransformerChosen
{
    public static function addOneToWinner (\PDO $db, Transformer $transformer): void
    {
        $value = $transformer->getWinner();
        $value++;
        $query = $db->prepare("UPDATE `characters` SET `winner` = $value WHERE `id` = :id ;");
        $id = $transformer->getId();
        $query->bindParam(':id', $id);
        if(!$query->execute()) {
            throw new DbException('Database not updated');
        }
    }

    public static function addOneToChosen (\PDO $db, Transformer $transformer): void
    {
        $value = $transformer->getChosen();
        $value++;
        $query = $db->prepare("UPDATE `characters` SET `chosen` = $value WHERE `id` = :id ;");
        $id = $transformer->getId();
        $query->bindParam(':id', $id);
        if(!$query->execute()) {
            throw new DbException('Database not updated');
        }
    }
}