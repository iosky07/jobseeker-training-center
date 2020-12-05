<?php


namespace App\Http\Livewire;


use App\Models\User;
use Livewire\Component;

class UserPremiumForm extends Component
{
    public $user;
    public $dataId;
    public $action;
    public $button;

    protected function getRules()
    {
        if ($this->action=="create"){
            $rules=[
                'user.name' => ' required|max:256',
                'user.email' => ' required|max:256',
                'user.password' => ' required|max:256',
                'user.role' => ' required|max:256',
                'user.nik' => ' required|max:256',
                'user.domisili' => ' required|max:256',
                'user.nomor_hp' => ' required|max:256',
                'user.jenis_kelamin' => ' required|max:256',
                'user.riwayat_pendidikan' => ' required|max:256',
                'user.quotes' => ' required|max:256'
            ];
        }else{
            $rules=[
                'user.name' => ' required|max:256',
                'user.email' => ' required|max:256',
                'user.password' => ' required|max:256',
                'user.role' => ' required|max:256',
                'user.nik' => ' required|max:256',
                'user.domisili' => ' required|max:256',
                'user.nomor_hp' => ' required|max:256',
                'user.jenis_kelamin' => ' required|max:256',
                'user.riwayat_pendidikan' => ' required|max:256',
                'user.quotes' => ' required|max:256'
            ];
        }
        return $rules;
    }

    public function create()
    {

        User::create($this->user);

        $this->reset('user');
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

        User::find($this->dataId)->update($this->user);

        $this->emit('swal:alert', [
            'type'    => 'success',
            'title'   => 'Data berhasil update',
            'timeout' => 3000,
            'icon'=>'success'
        ]);
        $this->emit('redirect');
    }

    public function mount ()
    {
        if (!!$this->dataId) {
            $user_hrd = User::findOrFail($this->dataId);

            $this->user = [
                'name' => $user_hrd->name,
                'email' => $user_hrd->email,
                'password' => $user_hrd->password,
                'role' => $user_hrd->role,
                'nik' => $user_hrd->nik,
                'domisili' => $user_hrd->domisili,
                'nomor_hp' => $user_hrd->nomor_hp,
                'jenis_kelamin' => $user_hrd->jenis_kelamin,
                'riwayat_pendidikan' => $user_hrd->riwayat_pendidikan,
                'quotes' => $user_hrd->quotes
            ];
        }
    }

    public function render()
    {
        return view('livewire.user-premium-form');
    }
}
