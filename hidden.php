<?php

require_once './vendor/autoload.php';

use Transformers\Classes\TransformerChosen;
use Transformers\Hydrators\TransformerHydrator;
use Transformers\Utilities\DB;

$db = DB::getDB();
$winnerID = $_POST['id'];
$transformers = TransformerHydrator::getTransformers($db);

foreach($transformers as $transformer) {
    if($transformer->getId() == $winnerID) {
        TransformerChosen::addOneToWinner($db, $transformer);
    }
}

header('Location: index.php');