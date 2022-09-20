<?php

namespace Transformers\ViewHelpers;

use Transformers\Classes\Transformer;

class Leaderboard
{
    public static function createWinRatioArray(array $transformers): array
    {
        $winRatioArray = [];
        
        foreach($transformers as $transformer) {
            if($transformer instanceof Transformer) {
                $winRatioArray[$transformer->getName()] = $transformer->getWinRate();
            }
        }
        return $winRatioArray;
    }

    public static function sortLeaderboard(array $transformers): array
    {
        $sortedWinRatioArray = self::createWinRatioArray($transformers);
        asort($sortedWinRatioArray);
        return array_reverse(array_slice($sortedWinRatioArray, -5));
    }

    public static function setLeaderboardByWinRatio(array $transformerTop5): string
    {
        $table = '<tr><th>Name</th><th>Win Rate</th></tr>';
        foreach($transformerTop5 as $key => $winRate)
        {
            if(is_string($key)){
                $table.='<tr><td>' . $key . '</td><td>' . $winRate . '%</td></tr>';
            } else {
                $table = '';
            }
        }
        return $table;
    }
}