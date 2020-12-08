<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use Faker\Factory;
use Livewire\Component;
use App\Events\NewMessage;

class ChatForm extends Component
{
    public $user;
    public $message;
    private $faker;
    protected $updatesQueryString = ['user'];
    protected $listeners = ['requestUser'];


    public function mount()
    {

        $this->faker = Factory::create();
        $this->user = request()->query('user', $this->user) ?? $this->faker->name;
        $this->message = $this->faker->realtext(20);
    }

    public function requestUser()
    {
        $this->emit('changeUser', $this->user);
    }

    public function updatedUser()
    {
        $this->emit('changeUser', $this->user);
    }

    public function updated($field)
    {
        $validatedData = $this->validateOnly($field, [
            'user' => 'required',
            'message' => 'required',
        ]);
    }

    public function sendMessage()
    {
        $validatedData = $this->validate([
            'user' => 'required',
            'message' => 'required',
        ]);

        Chat::create([
            "user" => $this->user,
            "message" => $this->message
        ]);

        event(new NewMessage($this->user, $this->message));

        $this->emit('enviadoOK', $this->message);

        $this->faker = Factory::create();
        $this->message = $this->faker->realtext(20);

    }

    public function render()
    {
        return view('livewire.chat-form');
    }
}

