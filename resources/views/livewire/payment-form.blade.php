<div>
    <form wire:submit.prevent="{{$action}}"  x-init="myAlert()">


        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Pilih Bank')}}</label>
            <select name="bank" id="bank" wire:model.defer="payment.bank" class="form-control">
                <option value="#">--- Pilih Bank ---</option>
                <option value="BRI">BRI</option>
                <option value="BCA">BCA</option>
                <option value="Mandiri">Mandiri</option>
            </select>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Upload Bukti')}}</label>
            <input id="name" type="file" class="mt-1 block w-full form-control shadow-none"
                   wire:model="file" required/>
            <div wire:loading wire:target="file" >Uploading...</div>
        </div>

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect',function (){
                window.location = "{{route('admin.payment.index')}}";
            });
        });
    </script>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect', () => {
                setTimeout(function () {
                    window.location.href = "{{route('admin.payment.create')}}"; //will redirect to your blog page (an ex: blog.html)
                }, 2000); //will call the function after 2 secs.
            });
        });
    </script>
</div>

