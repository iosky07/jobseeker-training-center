
<div>
    <form wire:submit.prevent="{{$action}}"  x-init="myAlert()">
    <div class="form-group col-span-6 sm:col-span-5">
        <x-jet-label for="name" value="{{ __('Nama') }}" />
        <small>Nama Lengkap Akun</small>
        <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.name" />
        <x-jet-input-error for="user.name" class="mt-2" />
    </div>

    @if ($action == "createUser" and "updateUser")
        <div class="form-group col-span-6 sm:col-span-5">
            <x-jet-label for="email" value="{{ __('Role') }}" />
            <select name="role" id="role" wire:model.defer="user.role" class="form-control">
                <option value="1">Admin</option>
                <option value="2">HRD</option>
                <option value="3">Jobseeker Premium</option>
                <option value="4">Jobseeker Reguler</option>
            </select>
            <x-jet-input-error for="user.email" class="mt-2" />
        </div>
    @endif

    <div class="form-group col-span-6 sm:col-span-5">
        <x-jet-label for="email" value="{{ __('Email') }}" />

        <x-jet-input id="email" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.email" />
        <x-jet-input-error for="user.email" class="mt-2" />
    </div>

    @if ($action == "createUser")
        <div class="form-group col-span-6 sm:col-span-5">
            <x-jet-label for="password" value="{{ __('Password') }}" />
            <small>Minimal 8 karakter</small>
            <x-jet-input id="password" type="password" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.password" />
            <x-jet-input-error for="user.password" class="mt-2" />
        </div>

        <div class="form-group col-span-6 sm:col-span-5">
            <x-jet-label for="password_confirmation" value="{{ __('Konfirmasi Password') }}" />
            <small>Minimal 8 karakter</small>
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full form-control shadow-none" wire:model.defer="user.password_confirmation" />
            <x-jet-input-error for="user.password_confirmation" class="mt-2" />
        </div>
    @endif
    </form>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect',function (){
                window.location = "{{route('admin.user-regular.index')}}";
            });
        });
    </script>
    <script>
        document.addEventListener('livewire:load', function () {
            window.livewire.on('redirect', () => {
                setTimeout(function () {
                    window.location.href = "{{route('admin.user-regular.create')}}"; //will redirect to your blog page (an ex: blog.html)
                }, 2000); //will call the function after 2 secs.
            });
        });
    </script>
</div>
