<div>
    <form wire:submit.prevent="{{$action}}"  x-init="myAlert()">
{{--        {{$id}}--}}
        @foreach($question_test as $q)

        @endforeach
        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{$q->quest}}</label>
            <br>
            <input type="radio" value="a" wire:model="question_test.answer">
            <label >a. </label><br>
            <input type="radio" value="b" wire:model="question_test.answer">
            <label >Male</label><br>
            <input type="radio" value="c" wire:model="question_test.answer">
            <label >Male</label><br>
            <input type="radio" value="d" wire:model="question_test.answer">
            <label >Male</label><br>
            <input type="radio" value="e" wire:model="question_test.answer">
            <label >Male</label><br>
        </div>

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary" >Submit</button>
    </form>
{{--    <script>--}}
{{--        document.addEventListener('livewire:load', function () {--}}
{{--            window.livewire.on('redirect',function (){--}}
{{--                window.location = "{{route('admin.payment.index')}}";--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
{{--    <script>--}}
{{--        document.addEventListener('livewire:load', function () {--}}
{{--            window.livewire.on('redirect', () => {--}}
{{--                setTimeout(function () {--}}
{{--                    window.location.href = "{{route('admin.payment.create')}}"; //will redirect to your blog page (an ex: blog.html)--}}
{{--                }, 2000); //will call the function after 2 secs.--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
</div>

