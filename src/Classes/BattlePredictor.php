<?php

//form - drop down menu w/ all transformer names 

namespace Transformers\Classes;

class BattlePredictor 
{
    public static function predictWinner(array $twoTransformers): string
    {
        if(count($twoTransformers) === 2) 
        {
            asort($twoTransformers);
            $winningArray = array_slice($twoTransformers, 1, 1);
            $winningName = key($winningArray);
        } else 
        {
            $winningName = 'it\'s a draw!';
        }
        return $winningName;
    }
}