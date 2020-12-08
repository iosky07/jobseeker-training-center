{{--<div class="">--}}

{{--    <!-- El User -->--}}
{{--    <div class="form-group">--}}
{{--        <label for="user"><strong>User</strong></label>--}}
{{--        <input--}}
{{--            type="text"--}}
{{--            wire:model="user"--}}
{{--            class="form-control"--}}
{{--            id="user">--}}

{{--        <!-- Validación -->--}}
{{--        @error("user")--}}
{{--            <small class="text-danger">{{ $message }}</small>--}}
{{--        @else--}}
{{--            <small class="text-muted">Your name: {{$user}}</small>--}}
{{--        @enderror--}}
{{--    </div>--}}

{{--    <!-- Message de Chat a Send -->--}}
{{--    <div class="form-group">--}}
{{--        <label for="message"><strong>Message</strong></label>--}}
{{--        <input type="text"--}}
{{--            wire:model="message"--}}
{{--            wire:keydown.enter="sendMessage"--}}
{{--            class="form-control"--}}
{{--            id="message">--}}

{{--        <!-- Validación -->--}}
{{--        @error("message")--}}
{{--            <small class="text-danger">{{ $message }}</small>--}}
{{--        @else--}}
{{--            <small class="text-muted">Write your message and type <code>ENTER</code> to send it</small>--}}
{{--        @enderror--}}
{{--    </div>--}}

{{--    <div wire:offline class="alert alert-danger text-center">--}}
{{--        <strong>Internet connection lost</strong>--}}
{{--    </div>--}}

{{--    <div class="row">--}}
{{--        <div class="col-6">--}}
{{--            <!-- Messages de alerta -->--}}
{{--            <div style="position: absolute;"--}}
{{--            class="alert alert-success collapse"--}}
{{--            role="alert"--}}
{{--            id="noticeSuccess"--}}
{{--            >Is sent</div>--}}
{{--        </div>--}}
{{--        <div class="col-6 pt-2 text-right">--}}
{{--            <button--}}
{{--                class="btn btn-primary"--}}
{{--                wire:click="sendMessage"--}}
{{--                wire:loading.attr="disabled"--}}
{{--                wire:offline.attr="disabled"--}}
{{--            >Send Message</button>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <script>--}}
{{--        document.addEventListener('livewire:load', function () {--}}

{{--            // Esto lo recibimos en JS cuando lo emite el componente--}}
{{--            // El evento "enviadoOK"--}}
{{--            $(document).ready(function () {--}}
{{--                window.livewire.on('enviadoOK', function () {--}}
{{--                    $("#noticeSuccess").fadeIn("slow");--}}
{{--                    setTimeout(function () {--}}
{{--                        $("#noticeSuccess").fadeOut("slow");--}}
{{--                    }, 3000);--}}
{{--                });--}}
{{--            });--}}
{{--        });--}}

{{--    </script>--}}

{{--</div>--}}
