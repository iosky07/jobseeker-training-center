<div>
    <form wire:submit.prevent="{{$action}}"  x-init="myAlert()">
{{--        <div class="form-group col-span-6 sm:col-span-5">--}}
{{--            <label for="name">{{__('ID Tes')}}</label>--}}
{{--            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"--}}
{{--                   value="{{$testId}}" disabled/>--}}
{{--        </div>--}}

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Masukkan Soal')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="question.quest" required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('a')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="question.a" required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('b')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="question.b" required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('c')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="question.c" required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('d')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="question.d" required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('e')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="question.e" required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Value')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="question.value" required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect',function (){
{{--                window.location = "{{route('admin.question-detail.index')}}";--}}
            });
        });
    </script>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect', () => {
                setTimeout(function () {
{{--                    window.location.href = "{{route('admin.question-detail.create')}}"; //will redirect to your blog page (an ex: blog.html)--}}
                }, 2000); //will call the function after 2 secs.
            });
        });
    </script>
    <script type="text/javascript">
        function Datepicker() {
            $('#datetimepicker').datetimepicker({
                format: 'YYYY-MM-DD H:mm'
            }).on("dp.change", function (e) {
            @this.set('pay_date', e.date);
            });
        };
        window.addEventListener('turbolinks:load', Datepicker);
    </script>
</div>


