<div>
    <form wire:submit.prevent="{{$action}}"  x-init="myAlert()">

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Nama Tes')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="test.title" required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <x-jet-label for="name" value="{{ __('Kategori') }}" />
            <select name="role" id="role" wire:model="test.category" class="form-control">
                <option value="#">--- Pilih Kategori ---</option>
                <option value="TKD">TKD</option>
                <option value="TPA">TPA</option>
                <option value="TBI">TBI</option>
            </select>
        </div>

        <div class="form-group">
            <label>Batas Waktu</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <input id="time-limit" type="text" class="form-control timepicker" wire:model.defer="test.time_limit" required/>
            </div>
        </div>

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect',function (){
                window.location = "{{route('admin.question-detail.index')}}";
            });
        });
    </script>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect', () => {
                setTimeout(function () {
                    window.location.href = "{{route('admin.question-detail.create')}}"; //will redirect to your blog page (an ex: blog.html)
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
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {
            // $('.timepicker').timepicker();
            $("#date").on("change.datetimepicker", () => {
                var data = document.getElementById('date').value;
            @this.set('test.date', data)
            })
            $("#time").on("change.timepicker", () => {
                use24hours: true
                var data = document.getElementById('time').value;
                // console.log(data)
                var time =data;
                var hours = Number(time.match(/^(\d+)/)[1]);
                var minutes = Number(time.match(/:(\d+)/)[1]);
                var AMPM = time.match(/\s(.*)$/)[1];
                if(AMPM == "PM" && hours<12) hours = hours+12;
                if(AMPM == "AM" && hours==12) hours = hours-12;
                var sHours = hours.toString();
                var sMinutes = minutes.toString();
                if(hours<10) sHours = "0" + sHours;
                if(minutes<10) sMinutes = "0" + sMinutes;
                var dataa= sHours + ":" + sMinutes ;
            @this.set('test.time', dataa)
            })
            $("#time-limit").on("change.timepicker", () => {
                use24hours: true
                var data = document.getElementById('time-limit').value;
                // console.log(data)
                var time =data;
                var hours = Number(time.match(/^(\d+)/)[1]);
                var minutes = Number(time.match(/:(\d+)/)[1]);
                var AMPM = time.match(/\s(.*)$/)[1];
                if(AMPM == "PM" && hours<12) hours = hours+12;
                if(AMPM == "AM" && hours==12) hours = hours-12;
                var sHours = hours.toString();
                var sMinutes = minutes.toString();
                if(hours<10) sHours = "0" + sHours;
                if(minutes<10) sMinutes = "0" + sMinutes;
                var dataa= sHours + ":" + sMinutes ;
            @this.set('test.time_limit', dataa)
            })
        });
        {{--        function Datepicker() {--}}
        {{--            $('#asdasd').datetimepicker({--}}
        {{--                format: 'YYYY-MM-DD H:mm'--}}
        {{--            }).on("dp.change", function (e) {--}}
        {{--            @this.set('pay_date', e.date);--}}
        {{--                console.log('asd')--}}
        {{--            });--}}
        {{--        };--}}
        {{--        window.addEventListener('turbolinks:load', Datepicker);--}}
    </script>
</div>


