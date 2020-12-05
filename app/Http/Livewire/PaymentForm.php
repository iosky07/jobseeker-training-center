<?php


namespace App\Http\Livewire;


use App\Models\Payment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class PaymentForm extends Component
{
    use WithFileUploads;
    public $payment;
    public $dataId;
    public $action;
    public $button;
    public $file;

    protected function getRules()
    {
        if ($this->action=="create"){
            $rules=[
                'payment.user_id' => 'required|max:256',
                'payment.user_name' => 'required|max:256',
                'payment.bank' => 'required',
                'payment.thumbnail' => 'required'
            ];
        }else{
            $rules=[
                'payment.user_id' => 'required|max:256',
                'payment.user_name' => 'required|max:256',
                'payment.bank' => 'required',
                'payment.thumbnail' => 'required'
            ];
        }
        return $rules;
    }

    public function create()
    {
        $this->payment['thumbnail'] = md5(rand()).'.'.$this->file->getClientOriginalExtension();
        $this->file->storeAs('public/payment', $this->payment['thumbnail']);
//        unset($this->data['thumbnail_photo']);

        $this->payment['user_id']=Auth::user()->id;
        $this->payment['user_name']=Auth::user()->name;

        Payment::create($this->payment);

        $this->reset('payment');
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

        Payment::query()
            ->where('id', $this->dataId)
            ->update($this->payment);

        $this->emit('saved');
    }

    public function mount ()
    {
        if (!!$this->dataId) {
            $payment = Payment::findOrFail($this->dataId);

            $this->payment = [
                "user_id" => $payment->user_id,
                "user_name" => $payment->user_name,
                "bank" => $payment->bank,
                "thumbnail" => $payment->thumbnail,
            ];
        }
    }

    public function render()
    {
        return view('livewire.payment-form');
    }
}
