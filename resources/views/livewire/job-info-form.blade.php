<div>
    <form wire:submit.prevent="{{$action}}"  x-init="myAlert()">
        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Nama Perusahaan')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="job.company" required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="deadline">{{__('Deadline')}}</label>
            <input id="time" type="text" class="mt-1 block w-full form-control shadow-none datepicker"
                   wire:model="job.deadline" required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="detail">{{__('Detail Info')}}</label>
                <div class="col-sm-12 col-md-7"  >
                    <textarea cols="70" rows="5" wire:model="job.detail_info" required></textarea>
{{--                    <textarea type="text" input="description" id="summernote" class="form-control summernote" wire:model.debounce.500ms="job.detail_info" required></textarea>--}}
                </div>
{{--            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"--}}
{{--                   wire:model="job.detail_info" required/>--}}
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="loker">{{__('Link Info Loker')}}</label>
            <input type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="job.link_info" required/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect',function (){
                window.location = "{{route('admin.job-info.index')}}";
            });
        });
    </script>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect', () => {
                setTimeout(function () {
                    window.location.href = "{{route('admin.job-info.create')}}"; //will redirect to your blog page (an ex: blog.html)
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
            $("#time").on("change.datetimepicker", () => {
                var data = document.getElementById('time').value;
            @this.set('job.deadline', data)
            })

            // $("#date").on("change.timepicker", () => {
            //     use24hours: true
            //     var data = document.getElementById('date').value;
            //     // console.log(data)
            //     var time =data;
            //     var hours = Number(time.match(/^(\d+)/)[1]);
            //     var minutes = Number(time.match(/:(\d+)/)[1]);
            //     var AMPM = time.match(/\s(.*)$/)[1];
            //     if(AMPM == "PM" && hours<12) hours = hours+12;
            //     if(AMPM == "AM" && hours==12) hours = hours-12;
            //     var sHours = hours.toString();
            //     var sMinutes = minutes.toString();
            //     if(hours<10) sHours = "0" + sHours;
            //     if(minutes<10) sMinutes = "0" + sMinutes;
            //     var dataa= sHours + ":" + sMinutes ;
            // @this.set('job.time', dataa)
            // })
        });
        // document.addEventListener('livewire:load', function () {
        // $("#summernote").on("change.summernote", () => {
        //     var dataa = document.getElementById('summernote').value;
        // @this.set('job.detail_info', dataa)
        // })
        // });
        // $('.summernote').summernote({
        //     tabsize: 2,
        //     height: 200,
        //     toolbar: [
        //         ['style', ['style']],
        //         ['font', ['bold', 'underline', 'clear']],
        //         ['color', ['color']],
        //         ['para', ['ul', 'ol', 'paragraph']],
        //         ['table', ['table']],
        //         ['insert', ['link', 'picture', 'video']],
        //         ['view', ['fullscreen', 'codeview', 'help']]
        //     ],
        //     callbacks: {
        //         onChange: function(contents, $editable) {
        //         @this.set('job.detail_info', contents);
        //         }
        //     }
        // });
        //
        // $('#message').summernote({
        //     height: 200,
        //     codemirror: {
        //         theme: 'monokai'
        //     },
        //     callbacks: {
        //         onChange: function(contents, $editable) {
        //         @this.set('message', contents);
        //         }
        //     }
        // });

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
