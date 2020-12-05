
<div>
    <form wire:submit.prevent="{{$action}}"  x-init="myAlert()">
    <div class="form-group col-span-6 sm:col-span-5">
        <x-jet-label for="name" value="{{ __('Nama') }}" />
        <small>Nama Lengkap Akun</small>
        <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.name" />
        <x-jet-input-error for="user.name" class="mt-2" />
    </div>


    <div class="form-group col-span-6 sm:col-span-5">
        <x-jet-label for="email" value="{{ __('Email') }}" />
        <x-jet-input id="email" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.email" />
        <x-jet-input-error for="user.email" class="mt-2" />
    </div>


        <div class="form-group col-span-6 sm:col-span-5">
            <x-jet-label for="password" value="{{ __('Password') }}" />
            <small>Minimal 8 karakter</small>
            <x-jet-input id="password" type="password" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.password" />
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <x-jet-label for="password_confirmation" value="{{ __('Konfirmasi Password') }}" />
            <small>Minimal 8 karakter</small>
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.password_confirmation" />
        </div>


            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="name" value="{{ __('Role') }}" />
                <select name="role" id="role" wire:model="user.role" class="form-control">
                    <option value="1">Admin</option>
                    <option value="2">HRD</option>
                    <option value="3">Jobseeker Premium</option>
                    <option value="4">Jobseeker Reguler</option>
                </select>
            </div>

        @if($user['role']==2)
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="name" value="{{ __('Umur') }}" />
                <x-jet-input id="age" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="tester.age" />
                <x-jet-input-error for="tester.age" class="mt-2" />
            </div>
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="name" value="{{ __('Perusahaan') }}" />
                <x-jet-input id="company" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="tester.company" />
                <x-jet-input-error for="tester.company" class="mt-2" />
            </div>
            <div class="form-group col-span-6 sm:col-span-5">
                <x-jet-label for="address" value="{{ __('Alamat') }}" />
                <textarea name="address" id="" class="form-control" wire:model.defer="tester.address"></textarea>
                <x-jet-input-error for="tester.address" class="mt-2" />
            </div>
        @endif

        <div class="form-group col-span-6 sm:col-span-5">
            <x-jet-label for="name" value="{{ __('NIK') }}" />
            <x-jet-input id="nik" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.nik" />
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <x-jet-label for="name" value="{{ __('Domisili') }}" />
            <x-jet-input id="domisili" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.domisili" />
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <x-jet-label for="name" value="{{ __('Nomor HP') }}" />
            <x-jet-input id="nomor_hp" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.nomor_hp" />
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <x-jet-label for="name" value="{{ __('Jenis Kelamin') }}" />
            <select name="jenis_kelamin" id="jenis_kelamin" wire:model.defer="user.jenis_kelamin" class="form-control">
                <option value="Laki-laki" >Laki-laki</option>
                <option value="Perempuan" >Perempuan</option>
            </select>
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <x-jet-label for="name" value="{{ __('Riwayat Pendidikan') }}" />
            <select name="riwayat_pendidikan" id="riwayat_pendidikan" wire:model.defer="user.riwayat_pendidikan" class="form-control">
                <option value="SMA/SMK" >SMA/SMK</option>
                <option value="D3" >D3</option>
                <option value="Sarjana" >Sarjana</option>
                <option value="Magister" >Magister</option>
                <option value="Lainnya" >Lainnya</option>
            </select>
        </div>

        <div class="form-group col-span-6 sm:col-span-5"></div>
        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
    </form>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect',function (){
                window.location = "{{route('admin.user.index')}}";
            });
        });
    </script>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect', () => {
                setTimeout(function () {
                    window.location.href = "{{route('admin.user.create')}}"; //will redirect to your blog page (an ex: blog.html)
                }, 2000); //will call the function after 2 secs.
            });
        });
    </script>
</div>
