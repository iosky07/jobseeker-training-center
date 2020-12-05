<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use Livewire\Component;

class ChatList extends Component
{
    public $user;
    public $messages;
    protected $lastId;

    protected $listeners = ['messageReceived', 'changeUser'];

    public function mount()
    {
        $lastId = 0;
        $this->messages = [];

        $this->user = request()->query('user', $this->user) ?? "";
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
        if($this->user != "")
        {
            // El contenido de la Push
            //$data = \json_decode(\json_encode($data));

            $messages = Chat::orderBy("created_at", "desc")->take(5)->get();
            //$this->messages = [];

            foreach($messages as $message)
            {
                if($this->lastId < $message->id)
                {
                    $this->lastId = $message->id;

                    $item = [
                        "id" => $message->id,
                        "user" => $message->user,
                        "message" => $message->message,
                        "received" => ($message->user != $this->user),
                        "date" => $message->created_at->diffForHumans()
                    ];

                    array_unshift($this->messages, $item);
                    //array_push($this->messages, $item);
                }

            }

            if(count($this->messages) > 5)
            {
                array_pop($this->messages);
            }
        }
        else
        {
            $this->emit('requestUser');
        }
    }

    public function resetMessages()
    {
        $this->messages = [];
        $this->updateMessages();
    }

    public function dydrate()
    {
        if($this->user == "")
        {
            // Le pedimos el uisuario al otro componente
            $this->emit('requestUser');
        }
    }

    public function render()
    {
        return view('livewire.chat-list');
    }
}
