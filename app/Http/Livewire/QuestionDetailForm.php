<?php


namespace App\Http\Livewire;


use App\Models\Question;
use App\Models\QuestionDetail;
use Illuminate\Support\Str;
use Livewire\Component;

class QuestionDetailForm extends Component
{
    public $testId;
    public $question;
    public $dataId;
    public $action;
    public $button;

    protected function getRules()
    {
        if ($this->action=="create"){
            $rules=[
                'question.quest' => 'required|max:256',
                'question.a' => 'required|max:256',
                'question.b' => 'required|max:256',
                'question.c' => 'required|max:256',
                'question.d' => 'required|max:256',
                'question.e' => 'required|max:256',
                'question.value' => 'required|max:256',
            ];
        }else{
            $rules=[
                'question.quest' => 'required|max:256',
                'question.a' => 'required|max:256',
                'question.b' => 'required|max:256',
                'question.c' => 'required|max:256',
                'question.d' => 'required|max:256',
                'question.e' => 'required|max:256',
                'question.value' => 'required|max:256',
            ];
        }
        return $rules;
    }

    public function create()
    {
        $this->question['test_id'] = $this->testId;
//        dd($this->question);
        QuestionDetail::create($this->question);

//        $this->reset('question');
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
        return redirect(route('admin.test.show', $this->testId));
    }

    public function update()
    {
        $this->resetErrorBag();
        $this->validate();

        QuestionDetail::find($this->dataId)->update($this->question);
//        dd($this->question-detail);

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
//        return redirect(route('admin.test.show', compact('id')));
    }

    public function mount ()
    {
//dd($this->dataId);
        $this->question['quest'] = '';
        $this->question['a'] = '';
        $this->question['b'] = '';
        $this->question['c'] = '';
        $this->question['d'] = '';
        $this->question['e'] = '';
        if (!!$this->dataId) {
            $question = QuestionDetail::findOrFail($this->dataId);
//            dd($question);
            $this->question = [
                "quest" => $question->quest,
                "a" => $question->a,
                "b" => $question->b,
                "c" => $question->c,
                "d" => $question->d,
                "e" => $question->e,
                "value" => $question->value,
            ];
        }
    }

    public function render()
    {
        return view('livewire.question-detail-form');
    }

}
