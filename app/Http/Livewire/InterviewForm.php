<?php


namespace App\Http\Livewire;

use Validator;
use App\Models\Interview;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class InterviewForm extends Component
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
                'interview.tester_name' => 'required|max:256',
                'interview.date' => 'required|date',
                'interview.time' => 'required',
                'interview.media' => 'required',
                'interview.info' => 'required',
            ];
        }else{
            $rules=[
                'interview.tester_id' => 'required|max:256',
                'interview.tester_name' => 'required|max:256',
                'interview.date' => 'required|date',
                'interview.time' => 'required',
                'interview.media' => 'required',
                'interview.info' => 'required',
            ];
        }
        return $rules;
    }

    public function mount ()
    {
        $this->interview['date']='';
        $this->interview['time']='';
        $this->interview['info']='';
        if (!!$this->dataId) {
            $interview = Interview::findOrFail($this->dataId);

            $this->interview = [
                "tester_id" => $interview->tester_id,
                "tester_name" => $interview->tester_name,
                "date" => $interview->date,
                "time" => $interview->time,
                "media" => $interview->media,
                "info" => $interview->info,
            ];
        }
    }

    public function create()
    {
//        dd($this->interview);
//        dd($interview);
//        $a = Auth::user()->id;
//        $b = Auth::user()->name;

        $this->interview['tester_id']=Auth::user()->tester->id;
        $this->interview['tester_name']=Auth::user()->tester->name;
//        $interview['date']=$this->interview['date'];
//        $interview['time']=$this->interview['time'];

        Interview::create($this->interview);

        $this->reset('interview');

        $this->interview['info']='';
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

        Interview::find($this->dataId)->update($this->interview);

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil update',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
        $this->emit('redirect');
    }

    public function render()
    {
        return view('livewire.interview-form');
    }

}
