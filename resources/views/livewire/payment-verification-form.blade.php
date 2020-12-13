<div>
    <form wire:submit.prevent="{{$action}}"  x-init="myAlert()">
        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('ID User')}}</label>
            <input id="name" type="text" class="mt-1 block w-full form-control shadow-none"
                   wire:model="payment.user_id" required/>
        </div>
        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Pilih Paket')}}</label>
            <select name="paket" id="paket" wire:model.defer="payment.paket" class="form-control">
                <option value="Paket A">Paket A(Full TKD+TPA+TKB) : Rp.100.000</option>
                <option value="Paket B">Paket B(Full TKD+TPA+TKB)+(Interview HRD 1/Perusahaan Reguler) : Rp.250.000</option>
                <option value="Paket C">Paket C(Full TKD+TPA+TKB)+(Interview HRD 1/Perusahaan Multinasional) : Rp.350.000</option>
            </select>
        </div>
        <div class="form-group col-span-6 sm:col-span-5">
            <label for="name">{{__('Pilih Bank')}}</label>
            <select name="bank" id="bank" wire:model.defer="payment.bank" class="form-control">
                <option value="BRI">BRI</option>
                <option value="BCA">BCA</option>
                <option value="Mandiri">Mandiri</option>
            </select>
        </div>
        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect',function (){
                window.location = "{{route('admin.payment-verification.index')}}";
            });
        });
    </script>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect', () => {
                setTimeout(function () {
                    window.location.href = "{{route('admin.payment-choosen.create')}}"; //will redirect to your blog page (an ex: blog.html)
                }, 2000); //will call the function after 2 secs.
            });
        });
    </script>
</div>

