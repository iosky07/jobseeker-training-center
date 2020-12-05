<?php


namespace App\Http\Livewire;


use App\Models\Interview;
use Livewire\Component;

class InterviewVerificationForm extends Component
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
                'interview.time' => 'required|time',
                'interview.quota' => 'required',
                'interview.media' => 'required',
                'interview.info' => 'required',
            ];
        }else{
            $rules=[
                'interview.tester_id' => 'required|max:256',
                'interview.tester_name' => 'required|max:256',
                'interview.date' => 'required|date',
                'interview.time' => 'required|time',
                'interview.quota' => 'required',
                'interview.media' => 'required',
                'interview.info' => 'required',
            ];
        }
        return $rules;
    }

//    public function create()
//    {
//        Payment::create($this->interview);
//
//        $this->reset('interview');
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

        Interview::query()
            ->where('id', $this->dataId)
            ->update($this->interview);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!!$this->dataId) {
            $interview = Interview::findOrFail($this->dataId);

            $this->interview = [
                "tester_id" => $interview->tester_id,
                "tester_name" => $interview->tester_name,
                "date" => $interview->date,
                "time" => $interview->time,
                "quota" => $interview->quota,
                "media" => $interview->media,
                "info" => $interview->info,
            ];
        }
    }

    public function render()
    {
        return view('livewire.interview-verification-form');
    }
}
