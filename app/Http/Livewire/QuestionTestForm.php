<?php


namespace App\Http\Livewire;


use App\Models\QuestionDetail;
use App\Models\QuestionSubmit;
use App\Models\Test;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class QuestionTestForm extends Component
{
//    public $testId;
    public $question_test;
    public $question;
    public $dataId;
    public $action;
    public $button;

    protected function getRules()
    {
        if ($this->action=="create"){
            $rules=[
                'question_test.answer' => ' required|max:256',
            ];
        }else{
            $rules=[
                'question_test.answer' => ' required|max:256',
            ];
        }
        return $rules;
    }

//    public function create()
//    {
//        $this->question_test['user_id'] = Auth::user()->id;
//        $this->question_test['question_detail_id'] = ;
//        QuestionSubmit::create($this->question_test);
//
//        $this->reset('question_test');
//        $this->emit('swal:alert', [
//            'type'    => 'success',
//            'title'   => 'Data berhasil masuk',
//            'timeout' => 3000,
//            'icon'=>'success'
//        ]);
//    }

    public function update()
    {
        $this->resetErrorBag();
        $this->validate();

//        QuestionSubmit::find($this->dataId)->update($this->question_test);
//        dd($this->question-detail);
        $this->question_test['user_id'] = Auth::user()->id;
        $this->question_test['question_detail_id'] = QuestionSubmit::find();
        QuestionSubmit::create($this->question_test);

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
    }

    public function mount ()
    {
//dd($this->dataId);
//        dd($this->dataId);
        if (!!$this->dataId) {
//            $question = Test::find($this->dataId)->questionDetails;
//            dd($this->dataId);
            $question_test = QuestionDetail::whereTestId($this->dataId)->firstOrFail();
//dd($question);
            $this->question_test = [
                "type" => $question_test->type,
                "quest" => $question_test->quest,
                "a" => $question_test->a,
                "b" => $question_test->b,
                "c" => $question_test->c,
                "d" => $question_test->d,
                "e" => $question_test->e,
                "value" => $question_test->value,
            ];
//            dd($this->question);
        }
    }

    public function render()
    {
        return view('livewire.question-test-form');
    }

}
