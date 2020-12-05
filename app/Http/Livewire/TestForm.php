<?php


namespace App\Http\Livewire;


use App\Models\Question;
use App\Models\Test;
use Illuminate\Support\Str;
use Livewire\Component;

class TestForm extends Component
{
    public $test;
    public $dataId;
    public $action;
    public $button;

    protected function getRules()
    {
        if ($this->action=="create"){
            $rules=[
                'test.title' => ' required|max:256',
                'test.category' => 'required|max:256',
                'test.time_limit' => 'required|max:256',
            ];
        }else{
            $rules=[
                'test.title' => ' required|max:256',
                'test.category' => 'required|max:256',
                'test.time_limit' => 'required|max:256',
            ];
        }
        return $rules;
    }

    public function create()
    {

        Test::create($this->test);

        $this->reset('test');
        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
    }

    public function update()
    {
        $this->resetErrorBag();
        $this->validate();

        Test::find($this->dataId)->update($this->test);
//        dd($this->question-detail);

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil masuk',
            'timeout' => 3000,
            'icon'=>'success'
            ]);
    }

    public function mount ()
    {
        if (!!$this->dataId) {
            $test = Test::findOrFail($this->dataId);

            $this->test = [
                "title" => $test->title,
                "category" => $test->category,
                "time_limit" => $test->time_limit,
            ];
        }
    }

    public function render()
    {
        return view('livewire.test-form');
    }
}
