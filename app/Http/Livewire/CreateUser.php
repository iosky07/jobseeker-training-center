<?php

namespace App\Http\Livewire;

use App\Models\Tester;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class CreateUser extends Component
{
    public $user;
    public $tester;
    public $userId;
    public $action;
    public $button;

    protected function getRules()
    {
        if ($this->action=="createUser"){
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
//                'user.quotes' => ' required|max:256'
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
//                'user.quotes' => ' required|max:256'
            ];
        }
        return $rules;
    }

    public function createUser ()
    {
//        dd($this->tester);
//        dd($this->user);
        $this->resetErrorBag();
        $this->validate();

        $user=User::create($this->user);
//        dd($user);

            if ($user->role==2){

                $data['name']=$user->name;
                $data['user_id']=$user->id;
                $data['email']=$user->email;
                $data['nik']=$user->nik;
                $data['age']=$this->tester['age'];
                $data['company']=$this->tester['company'];
                $data['address']=$this->tester['address'];
                $data['created_at']=$user->created_at;
                $data['updated_at']=$user->updated_at;
                Tester::create($data);

//                $this->reset('user');
                $this->emit('swal:alert', [
                    'type'    => 'success',
                    'title'   => 'Data berhasil masuk',
                    'timeout' => 3000,
                    'icon'=>'success']);
            }else{
                $this->reset('user');
                $this->emit('swal:alert', [
                    'type'    => 'success',
                    'title'   => 'Data berhasil masuk',
                    'timeout' => 3000,
                    'icon'=>'success']);
            }


//        $password = $this->user['password'];
//
//        if ( !empty($password) ) {
//            $this->user['password'] = Hash::make($password);
//        }
//
//        User::create($this->user);
//
//        $this->emit('saved');
//        $this->reset('user');
    }

    public function updateUser ()
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

//        $this->resetErrorBag();
//        $this->validate();
//
//        $d = User::query()
//            ->where('id', $this->userId)
//            ->update($this->user);
//
//        $this->emit('saved');
//        dd($d);
    }

    public function mount ()
    {
        $this->user['role']=1;
        $this->user['jenis_kelamin']='Laki-laki';
        $this->user['riwayat_pendidikan']='SMA/SMK';

        if (!!$this->userId) {
            $user = User::findOrFail($this->userId);
            $this->user = [
                "name" => $user->name,
                "email" => $user->email,
                'password' => $user->password,
                'role' => $user->role,
                'nik' => $user->nik,
                'domisili' => $user->domisili,
                'nomor_hp' => $user->nomor_hp,
                'jenis_kelamin' => $user->jenis_kelamin,
                'riwayat_pendidikan' => $user->riwayat_pendidikan,
                'quotes' => $user->quotes
            ];
        }

        $this->button = create_button($this->action, "User");
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
