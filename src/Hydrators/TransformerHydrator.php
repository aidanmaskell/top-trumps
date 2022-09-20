<?php

namespace Transformers\Hydrators;

use Transformers\Classes\Transformer;

class TransformerHydrator
{
    public static function getTransformers(\PDO $db)
    {
        $query = $db->prepare("SELECT 
                        `id`,
                        `name`,
                        `size`,
                        `speed`,
                        `power`,
                        `disguise`,
                        `top_trumps_rating`,
                        `type`,
                        `img_url`,
                        `winner`,
                        `chosen`
                        FROM `characters`;");
        $query->setFetchMode(\PDO::FETCH_CLASS, Transformer::class);
        $query->execute();
        return $query->fetchAll();
    }
} 