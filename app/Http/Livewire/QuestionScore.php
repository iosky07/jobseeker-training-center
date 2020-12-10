<?php


namespace App\Http\Livewire;
use Livewire\Component;

class QuestionScore extends Component
{
    public $score;
    public $dataId;

    public function mount ()
    {
//dd($this->dataId);
        if (!!$this->dataId) {
            $score = QuestionScore::findOrFail($this->dataId);
//            dd($question);
            $this->score = [
                "user_id" => $score->user_id,
                "test_id" => $score->test_id,
                "category" => $score->category,
                "score" => $score->score,
            ];
        }
    }

}
