<?php

use Transformers\Classes\BattlePredictor;

session_start();

require_once './vendor/autoload.php';

$transformer1 = $_POST['predict1'];
$transformer2 = $_POST['predict2'];

$transformer1Array = explode('/', $transformer1, 2);
$transformer2Array = explode('/', $transformer2, 2);

$transformerWinRatioArray = [$transformer1Array[0] => $transformer1Array[1], $transformer2Array[0] => $transformer2Array[1]];

$winner = BattlePredictor::predictWinner($transformerWinRatioArray);

$_SESSION['winner'] = $winner;

header('Location: index.php');

