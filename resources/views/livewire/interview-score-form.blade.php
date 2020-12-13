<div>
    <form wire:submit.prevent="{{$action}}"  x-init="myAlert()">

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="date">{{__('Nama')}}</label>
            <input type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="interview.name" disabled/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="date">{{__('Tanggal')}}</label>
            <input type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="interview.date" disabled/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="date">{{__('Jam')}}</label>
            <input type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="interview.time" disabled/>
        </div>

        <div class="form-group col-span-6 sm:col-span-5" wire:ignore>
            <label for="detail">{{__('Nilai Karakter')}}</label>
            <div class="col-sm-12 col-md-12" >
                <textarea type="text" input="description" id="summernote" class="form-control summernote" required>
                    {{$interview['character']}}
                    </textarea>
            </div>
        </div>

        <div class="form-group col-span-6 sm:col-span-5" wire:ignore>
            <label for="detail">{{__('Nilai Minat/Bakat')}}</label>
            <div class="col-sm-12 col-md-12" >
                <textarea type="text" input="description" id="summernote1" class="form-control summernote" required>
                    {{$interview['talent']}}
                    </textarea>
            </div>
        </div>

        <div class="form-group col-span-6 sm:col-span-5" wire:ignore>
            <label for="detail">{{__('Nilai Kelebihan')}}</label>
            <div class="col-sm-12 col-md-12" >
                <textarea type="text" input="description" id="summernote2" class="form-control summernote" required>
                    {{$interview['advantage']}}
                    </textarea>
            </div>
        </div>

        <div class="form-group col-span-6 sm:col-span-5" wire:ignore>
            <label for="detail">{{__('Nilai Kekurangan')}}</label>
            <div class="col-sm-12 col-md-12" >
                <textarea type="text" input="description" id="summernote3" class="form-control summernote" required>
                    {{$interview['weakness']}}
                    </textarea>
            </div>
        </div>

        <div class="form-group col-span-6 sm:col-span-5" wire:ignore>
            <label for="detail">{{__('Nilai Saran')}}</label>
            <div class="col-sm-12 col-md-12" >
                <textarea type="text" input="description" id="summernote4" class="form-control summernote" required>
                    {{$interview['recommendation']}}
                    </textarea>
            </div>
        </div>


        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>


    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect',function (){
                window.location = "{{route('admin.interview-score.index')}}";
            });
        });
    </script>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect', () => {
                setTimeout(function () {
                    window.location.href = "{{route('admin.interview-score.create')}}"; //will redirect to your blog page (an ex: blog.html)
                }, 2000); //will call the function after 2 secs.
            });
        });
    </script>
    <script type="text/javascript">
        document.addEventListener('livewire:load', function () {
            $('#summernote').summernote({

                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {

                    onChange: function (contents, $editable) {
                    @this.set('interview.character', contents)
                    }
                }

            })
            $('#summernote1').summernote({

                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {

                    onChange: function (contents, $editable) {
                    @this.set('interview.talent', contents)
                    }
                }

            })
            $('#summernote2').summernote({

                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {

                    onChange: function (contents, $editable) {
                    @this.set('interview.advantage', contents)
                    }
                }

            })
            $('#summernote3').summernote({

                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {

                    onChange: function (contents, $editable) {
                    @this.set('interview.weakness', contents)
                    }
                }

            })
            $('#summernote4').summernote({

                tabsize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {

                    onChange: function (contents, $editable) {
                    @this.set('interview.recommendation', contents)
                    }
                }

            })
        });
    </script>
</div>
