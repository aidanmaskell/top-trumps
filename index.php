<?php

session_start();

require_once './vendor/autoload.php';

use Transformers\ViewHelpers\Card;
use Transformers\ViewHelpers\Leaderboard;
use Transformers\Classes\TransformerChosen;
use Transformers\Hydrators\TransformerHydrator;
use Transformers\Utilities\DB;
use Transformers\ViewHelpers\Dropdown;

$db = DB::getDB();

$transformers = TransformerHydrator::getTransformers($db);
shuffle($transformers);
$twoTransformers = array_slice($transformers, 0, 2);
foreach($twoTransformers as $transformer){
    TransformerChosen::addOneToChosen($db, $transformer);

$cardsToDisplay = Card::setContents($twoTransformers);

$transformerTop5 = Leaderboard::sortLeaderboard($transformers);
$leaderboardToDisplay = Leaderboard::setLeaderboardByWinRatio($transformerTop5);

$transformersWinRatioArray = Leaderboard::createWinRatioArray($transformers);
$predictDropdown = Dropdown::createDropdown($transformersWinRatioArray);

if(isset($_SESSION['winner'])){
    $predictionWinner = $_SESSION['winner'];
} else {
    $predictionWinner = '';
}

}

?>

<!DOCTYPE html>
<html lang="en-gb">
<head>
	<title>Transformers</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link href="style.css" type="text/css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="container">
    <header class="row d-flex justify-content-center mt-2">
        <h1 class="col-12 col-md-8 col-lg-6 text-center bg-black">Top Trumps</h1>
    </header>
    <div class="card-div row d-flex justify-content-between">
        <?php echo $cardsToDisplay ?>
    </div>
    <div class="predictor my-4">
        <div>
            <h2 class="text-center pt-4">Win Predictor</h2>
        </div>
        <form action="hiddenpredictor.php" method="post" class="row d-flex justify-content-around">
            <div class="d-flex justify-content-around py-3">
                <div class="col-5 d-flex flex-column align-items-center">
                    <label for="predict1">Select a Transformer:</label>
                    <select class ="form-select" id="predict1" name="predict1">
                        <option value="">--Select a Transformer</option>
                        <?php echo $predictDropdown ?>
                    </select>
                </div>
                <div class="col-5 d-flex flex-column align-items-center">
                    <label for="predict2">Select a Transformer:</label>
                    <select class ="form-select" id="predict2" name="predict2">
                        <option value ="">--Select a Transformer</option>
                        <?php echo $predictDropdown ?>
                    </select>
                </div>
            </div>
            <div class="col-4 pt-2 pb-5">
                <input class="btn btn-warning" type="submit" value="SUBMIT" />
            </div>
        </form>
        <div>
            <h4 class="text-center predict-winner"><?= $predictionWinner ?></h4>
        </div>
    </div>
    <div class="leaderboard mb-5">
        <div class="row">
            <h2 class="col text-center pt-4">Leaderboard</h2>
        </div>
        <div class="row d-flex justify-content-center py-3">
            <div class="col-10 col-lg-8">
                <table class="table">   
                    <?php echo $leaderboardToDisplay ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>