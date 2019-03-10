<?php
/**
 * Created by PhpStorm.
 * User: Thomas
 * Date: 15-2-2019
 * Time: 17:38
 */

namespace App\Services;


use App\Party;
use App\PartyAnswer;
use App\Question;

class ResultService
{

    function calculateResult(Array $answers) {
        $parties = Party::all();
        $questions = Question::all();

        //dd($answers);
        $result = Array();
        foreach ($questions as $question) {
            foreach ($parties as $party) {
                if(!isset($result[$party->id])) {
                    $result[$party->id] = 0;
                }
                $result[$party->id] += $this->scoreQuestion($question->id, $party->id, $answers[$question->id][0], $answers[$question->id][1]);
            };
        }
        return $result;
    }

    function scoreQuestion($questionId, $partyId, $userAnswerId, $userImportance) {
        $partyAnswer = PartyAnswer::where(['questionId' => $questionId, 'partyId' => $partyId])->first();
        if($partyAnswer->answerId == $userAnswerId) {
            if($userImportance == 1) {
                return 0.5;
            }
            else if($userImportance == 2) {
                return 1;
            }
            else {
                return 1.5;
            }
        }
        else {
            if($userImportance == 1) {
                return 0;
            }
            else if($userImportance == 2) {
                return -0.2;
            }
            else {
                return -0.5;
            }
        }
    }
}