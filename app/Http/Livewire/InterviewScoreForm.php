<?php

namespace App\Http\Livewire;

use App\Models\Interview;
use App\Models\InterviewScore;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class InterviewScoreForm extends Component
{
    public $interview;
    public $dataId;
    public $action;
    public $button;

    protected function getRules()
    {
        if ($this->action=="create"){
            $rules=[
                'interview.tester_id' => 'required|max:256',
                'interview.user_id' => 'required|max:256',
                'interview.name' => 'required|max:256',
                'interview.date' => 'required|date',
                'interview.time' => 'required',
                'interview.character' => 'required',
                'interview.talent' => 'required',
                'interview.advantage' => 'required',
                'interview.weakness' => 'required',
                'interview.recommendation' => 'required',
            ];
        }else{
            $rules=[
                'interview.tester_id' => 'required|max:256',
                'interview.user_id' => 'required|max:256',
                'interview.name' => 'required|max:256',
                'interview.date' => 'required|date',
                'interview.time' => 'required',
                'interview.character' => 'required',
                'interview.talent' => 'required',
                'interview.advantage' => 'required',
                'interview.weakness' => 'required',
                'interview.recommendation' => 'required',
            ];
        }
        return $rules;
    }

    public function mount ()
    {
//        $this->interview['date']='';
//        $this->interview['time']='';
        if (!!$this->dataId) {
            $interview = InterviewScore::findOrFail($this->dataId);

            $this->interview = [
                "tester_id" => $interview->tester_id,
                "user_id" => $interview->user_id,
                "name" => $interview->name,
                "date" => $interview->date,
                "time" => $interview->time,
                "character" => $interview->character,
                "talent" => $interview->talent,
                "advantage" => $interview->advantage,
                "weakness" => $interview->weakness,
                "recommendation" => $interview->recommendation,

            ];
        }
    }

    public function update()
    {
//        $this->resetErrorBag();
//        $this->validate();

        InterviewScore::find($this->dataId)->update($this->interview);

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil update',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
//        $this->emit('redirect');
        return redirect(route('admin.interview-score.index', $this->id));
    }

    public function render()
    {
        return view('livewire.interview-score-form');
    }
}
