<?php

namespace App\Http\Livewire;

use App\Models\Chat;
use Faker\Factory;
use Livewire\Component;
use App\Events\NewMessage;

class ChatForm extends Component
{
    // Estas propiedades son publicas
    // y se pueden utilizar directamente desde la vista
    public $user;
    public $message;

    // Generar datos para pruebas
    private $faker;

    // Mantenemos estos valores actualizados en
    // la barra de direcciones...
    // Ej.: https://your-app.com/?user=Pedro
    protected $updatesQueryString = ['user'];

    // Eventos Recibidos
    protected $listeners = ['requestUser'];

    // Cuando se Inicia el Componente (antes de Render)
    public function mount()
    {
        // Instanciamos Faker
        $this->faker = Factory::create();

        // Obtenemos el valor de user de la barra de direcciones
        // si no existe, generamos uno con Faker
        $this->user = request()->query('user', $this->user) ?? $this->faker->name;

        // Generamos el primer texto de prueba
        $this->message = $this->faker->realtext(20);
    }

    // Cuando el otro componente nos solicitan el user
    public function requestUser()
    {
        // Lo emitimos por evento
        $this->emit('changeUser', $this->user);
    }

    // Cuando actualizamos el nombre de user
    public function updatedUser()
    {
        // Notificamos al otro componente el cambio
        $this->emit('changeUser', $this->user);
    }

    // Se produce cuando se actualiza cualquier dato por Binding
    public function updated($field)
    {
        // Solo validamos el campo que genera el update
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

        // Guardamos el message en la BBDD
        Chat::create([
            "user" => $this->user,
            "message" => $this->message
        ]);

        // Generamos el evento para Pusher
        // Enviamos en la "push" el user y message (aunque en este ejemplo no lo utilizamos)
        // pero nos vale para comprobar en PusherDebug (y por consola) lo que llega...
        event(new NewMessage($this->user, $this->message));

        // Este evento es para que lo reciba el componente
        // por Javascript y muestre el ALERT BOOSTRAP de "enviado"
        $this->emit('enviadoOK', $this->message);

        // Creamos un nuevo texto aleatorio (para el próximo message)
        $this->faker = Factory::create();
        $this->message = $this->faker->realtext(20);

    }

    public function render()
    {
        return view('livewire.chat-form');
    }
}

