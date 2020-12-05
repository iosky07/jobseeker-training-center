<?php


namespace App\Http\Livewire;


use App\Models\Payment;
use Livewire\Component;

class PaymentVerificationForm extends Component
{
    public $payment;
    public $paymentId;
    public $dataId;
    public $action;
    public $button;

    protected function getRules()
    {
        if ($this->action=="create"){
            $rules=[
                'payment.user_id' => 'required',
                'payment.paket' => 'required|max:256',
                'payment.bank' => 'required|max:256'
            ];
        }else{
            $rules=[
                'payment.user_id' => 'required',
                'payment.paket' => ' required|max:256',
                'payment.bank' => 'required|max:256'
            ];
        }
        return $rules;
    }

    public function create()
    {
//        $this->payment['user_id']=$this->paymentId;
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
                "paket" => $payment->paket,
                "bank" => $payment->bank
            ];
        }
    }

    public function render()
    {
        return view('livewire.payment-verification-form');
    }
}
