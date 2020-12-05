<div class="mt-3">

    <h3><strong>Last 5 messages</strong></h3>

    <div class="card">
        <div class="card-body">
            @foreach($messages as $message)
                <div>

                    @if($message["received"])
                        <div class="alert alert-warning" style="margin-right: 50px;">
                            <strong>{{$message["user"]}}</strong><small class="float-right">{{$message["date"]}}</small>
                            <br><span class="text-muted">{{$message["message"]}}</span>
                        </div>
                    @else
                        <div class="alert alert-success" style="margin-left: 50px;">
                            <strong>{{$message["user"]}}</strong><small class="float-right">{{$message["date"]}}</small>
                            <br><span class="text-muted">{{$message["message"]}}</span>
                        </div>
                    @endif

                </div>
            @endforeach
        </div>
    </div>

    <script>
        document.addEventListener('livewire:load', function () {

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('{{env('PUSHER_APP_KEY')}}', {
                cluster: '{{env('PUSHER_APP_CLUSTER')}}',
                forceTLS: true
            });

            var channel = pusher.subscribe('chat-channel');

            channel.bind('chat-event', function (data) {
                window.livewire.emit('messageReceived', data);
            });

            setTimeout(function () {
                window.livewire.emit('requestUser');
            }, 100);

        });
    </script>

</div>
