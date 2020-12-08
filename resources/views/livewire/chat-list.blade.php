<div class="mt-10">
    <div class="col-12 col-sm-10 col-lg-12 col-md-12">
        <div class="card chat-box" id="mychatbox">
            <div class="card-header">
                <h4>FORUM JOBSEEKER</h4>
            </div>
            <div class="card-body chat-content col-md-12" id="myMessageContainer" style="overflow-y: auto;">
                @foreach(array_reverse($messages) as $message)
                    <div>
                        @if($message["received"])
                            <div class="alert alert-warning" style="margin-right: 10px;">
                                <strong style="color: #4e555b">{{$message["user"]}}</strong><small
                                    class="float-right">{{$message["date"]}}</small>
                                <br><span class="text-light-all">{{$message["message"]}}</span>
                            </div>
                        @else
                            <div class="alert" style="margin-left: 10px; background-color: #66FF66;">
                                <strong style="color: #4e555b">{{$message["user"]}}</strong><small
                                    class="float-right">{{$message["date"]}}</small>
                                <br><span class="text-light-all">{{$message["message"]}}</span>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            <div class="card-footer chat-form" style="color: #4e555b">
                {{--                <form id="chat-form">--}}
                <input type="text" wire:model="user" class="form-control" id="user" placeholder="User" hidden>
                <input type="text" wire:model="message" wire:keydown.enter="sendMessage" class="form-control"
                       id="message">
                {{--                    <input type="text" class="form-control" placeholder="Type a message">--}}
                <button class="btn btn-primary">
                    <button class="btn btn-primary" wire:click="sendMessage" wire:loading.attr="disabled"><i
                            class="far fa-paper-plane"></i></button>
                    {{--                        <button class="btn btn-primary" wire:click="sendMessage" wire:loading.attr="disabled" wire:offline.attr="disabled">Send Message</button>--}}
                </button>
                {{--                </form>--}}
            </div>
        </div>
    </div>
    <script>


    </script>
    <script>

        document.addEventListener('livewire:load', function () {
            // $.fn.scrollBottom = function() {
            //     return $(document).height() - this.scrollTop() - this.height();
            // };
            $( document ).ready(function() {
                $('#myMessageContainer').stop().animate({
                    scrollTop: $('#myMessageContainer')[0].scrollHeight
                    // scrollTop: $('#myMessageContainer')[0].scrollBottom()
                });
            });
            window.livewire.on('scroll', function () {


                console.log('asd')
                $('#myMessageContainer').stop().animate({
                    scrollTop: $('#myMessageContainer')[0].scrollHeight
                });
            });

            window.livewire.on('enviadoOK', function () {
                // $("#noticeSuccess").fadeIn("slow");
                // setTimeout(function () {
                //     $("#noticeSuccess").fadeOut("slow");
                // }, 3000);
            });

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
            // const messages = document.getElementById('messages');
            //
            // function appendMessage() {
            //     const message = document.getElementsByClassName('message')[0];
            //     const newMessage = message.cloneNode(true);
            //     messages.appendChild(newMessage);
            // }
            //
            // function getMessages() {
            //     // Prior to getting your messages.
            //     shouldScroll = messages.scrollTop + messages.clientHeight === messages.scrollHeight;
            //     /*
            //      * Get your messages, we'll just simulate it by appending a new one syncronously.
            //      */
            //     appendMessage();
            //     // After getting your messages.
            //     if (!shouldScroll) {
            //         scrollToBottom();
            //     }
            // }
            //
            // function scrollToBottom() {
            //     messages.scrollTop = messages.scrollHeight;
            // }
            //
            // scrollToBottom();
            //
            // setInterval(getMessages, 100);
        });
  </script>
</div>

{{--<div class="">--}}

{{--    <!-- El User -->--}}
{{--    <div class="form-group">--}}
{{--        <label for="user"><strong>User</strong></label>--}}
{{--        <input type="text" wire:model="user" class="form-control" id="user">--}}

{{--        <!-- Validación -->--}}
{{--        @error("user")--}}
{{--        <small class="text-danger">{{ $message }}</small>--}}
{{--        @else--}}
{{--            <small class="text-muted">Your name: {{$user}}</small>--}}
{{--            @enderror--}}
{{--    </div>--}}

{{--    <!-- Message de Chat a Send -->--}}
{{--    <div class="form-group">--}}
{{--        <label for="message"><strong>Message</strong></label>--}}
{{--        --}}

{{--        <!-- Validación -->--}}
{{--        @error("message")--}}
{{--        <small class="text-danger">{{ $message }}</small>--}}
{{--        @else--}}
{{--            <small class="text-muted">Write your message and type <code>ENTER</code> to send it</small>--}}
{{--            @enderror--}}
{{--    </div>--}}

{{--    <div wire:offline class="alert alert-danger text-center">--}}
{{--        <strong>Internet connection lost</strong>--}}
{{--    </div>--}}

{{--    <div class="row">--}}
{{--        <div class="col-6">--}}
{{--            <!-- Messages de alerta -->--}}
{{--            <div style="position: absolute;"--}}
{{--                 class="alert alert-success collapse"--}}
{{--                 role="alert"--}}
{{--                 id="noticeSuccess"--}}
{{--            >Is sent</div>--}}
{{--        </div>--}}
{{--        <div class="col-6 pt-2 text-right">--}}
{{--            --}}
{{--        </div>--}}
{{--    </div>--}}


{{--</div>--}}

