<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use App\Events\NewMessage;
use Faker\Factory;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatList extends Component
{
    public $user;
    public $messages;
    protected $lastId;
    protected $listeners = ['messageReceived', 'changeUser', 'requestUser'];

    public $userform;
    public $message;
    private $faker;
    protected $updatesQueryString = ['user'];
//    protected $listeners = ['requestUser'];

    public function mount()
    {
        $lastId = 0;
        $this->messages = [];

        $this->user = request()->query('user', $this->user) ?? "";

        $this->faker = Factory::create();
        $this->userform = request()->query('userform', $this->userform) ?? $this->faker->name;
        $this->message = $this->faker->realtext(20);

        $messages = Chat::orderBy("created_at", "asc")->get();
        $this->messages = [];
        foreach($messages as $message)
        {
            if($this->lastId < $message->id)
            {
                $this->lastId = $message->id;

                $item = [
                    "id" => $message->id,
                    "user" => $message->user,
                    "message" => $message->message,
                    "received" => ($message->user != Auth::user()->name),
                    "date" => $message->created_at->diffForHumans()
                ];

                array_unshift($this->messages, $item);
                //array_push($this->messages, $item);
            }

        }
        $this->emit('scroll');

    }



    public function requestUser()
    {
        $this->emit('changeUser', $this->userform);
    }
    public function updatedUser()
    {
        $this->emit('changeUser', $this->userform);
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
            "user" => Auth::user()->name,
            "message" => $this->message
        ]);

        event(new NewMessage($this->userform, $this->message));

        $this->emit('enviadoOK', $this->message);

        $this->emit('scroll');
        $this->faker = Factory::create();
        $this->message = $this->faker->realtext(20);

    }



    public function  messageReceived($data)
    {
        $this->updateMessages();
    }

    public function changeUser($user)
    {
        $this->user = $user;
    }

    public function updateMessages()
    {
            $messages = Chat::orderBy("created_at", "asc")->get();
            $this->messages = [];
            foreach($messages as $message)
            {
                if($this->lastId < $message->id)
                {
                    $this->lastId = $message->id;

                    $item = [
                        "id" => $message->id,
                        "user" => $message->user,
                        "message" => $message->message,
                        "received" => ($message->user != Auth::user()->name),
                        "date" => $message->created_at->diffForHumans()
                    ];

                    array_unshift($this->messages, $item);
                    //array_push($this->messages, $item);
                }

            }
//            typeOf($messages);
//            array_reverse($messages);

//            if(count($this->messages) > 5)
//            {
//                array_pop($this->messages);
//            }
//        }
//        else
//        {
//            $this->emit('requestUser');
//        }
    }

    public function resetMessages()
    {
        $this->messages = [];
        $this->updateMessages();
    }
//
//    public function dydrate()
//    {
//        if($this->user == "")
//        {
//            $this->emit('requestUser');
//        }
//    }

    public function render()
    {
        return view('livewire.chat-list');
    }
}
