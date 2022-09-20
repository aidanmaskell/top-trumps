<?php

require_once '../../vendor/autoload.php';

use PHPUnit\Framework\Testcase;
use Transformers\Classes\Transformer;
use Transformers\ViewHelpers\Leaderboard;

class LeaderboardTest extends Testcase 
{

    public function createTransformerMock(string $name, int $rate): Transformer 
    {
        $transformerMock = $this->createMock(Transformer::class);
        $transformerMock->method('getName')->willReturn($name);
        $transformerMock->method('getWinRate')->willReturn($rate);
        return $transformerMock;
    }

    public function testSuccessSortLeaderboard()
    {
        $transformerMock1 = $this->createTransformerMock('barry', 57);
        $transformerMock2 = $this->createTransformerMock('larry', 58);
        $transformerMock3 = $this->createTransformerMock('darry', 59);
        $transformerMock4 = $this->createTransformerMock('carry', 60);
        $transformerMock5 = $this->createTransformerMock('warry', 61);
        $transformerMock6 = $this->createTransformerMock('parry', 56);
        $input = [$transformerMock1, $transformerMock2, $transformerMock3, $transformerMock4, $transformerMock5, $transformerMock6];

        $result = Leaderboard::sortLeaderboard($input);
        $expected = ['warry'=>61, 'carry'=>60, 'darry'=>59, 'larry'=>58, 'barry'=>57];
        $this->assertEquals($expected, $result);
    }

    public function testFailureSortLeaderboard()
    {
        $input = [1, 2, 3, 4, 5, 6];
        $result = Leaderboard::sortLeaderboard($input);
        $expected = [];
        $this->assertEquals($expected, $result);
    }

    public function testMalformSortLeaderboard()
    {
        $input = 20;
        $this->expectException(TypeError::class);
        $case =  Leaderboard::sortLeaderboard($input);
    }

    public function testSuccessSetLeaderboardByWinRatio()
    {
        $input = ['warry'=>61, 'carry'=>60, 'darry'=>59, 'larry'=>58, 'barry'=>57];

        $result = Leaderboard::setLeaderboardByWinRatio($input);
        $expected = '<tr><th>Name</th><th>Win Rate</th></tr><tr><td>warry</td><td>61%</td></tr><tr><td>carry</td>';
        $expected .='<td>60%</td></tr><tr><td>darry</td><td>59%</td></tr><tr><td>larry</td><td>58%</td></tr><tr>';
        $expected .='<td>barry</td><td>57%</td></tr>';
        $this->assertEquals($expected, $result);
    }

    public function testFailureSetLeaderboardByWinRatio()
    {
        $input = [1, 2, 3, 4, 5];
        $result = Leaderboard::SetLeaderboardByWinRatio($input);
        $expected = '';
        $this->assertEquals($expected, $result);
    }

    public function testMalformSetLeaderboardByWinRatio()
    {
        $input = 20;
        $this->expectException(TypeError::class);
        $case =  Leaderboard::SetLeaderboardByWinRatio($input);
    }
}