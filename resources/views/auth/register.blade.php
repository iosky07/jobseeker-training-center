<x-guest-layout>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&family=Nunito:wght@400;600;700&family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/summernote/dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('stisla/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/notyf/notyf.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-shims.min.css" media="all">
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-font-face.min.css" media="all">
    <link rel="stylesheet" href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <livewire:styles />

    <!-- Scripts -->
    <script defer src="{{ asset('vendor/alpine.js') }}"></script>

    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label value="{{ __('Name') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Email') }}" />
                <x-jet-input class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Confirm Password') }}" />
                <x-jet-input class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('NIK') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="nik" :value="old('nik')" required autofocus autocomplete="nik" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Domisili') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="domisili" :value="old('domisili')" required autofocus autocomplete="domisili" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Nomor Hp') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="nomor_hp" :value="old('nomor_hp')" required autofocus autocomplete="nomor_hp" />
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Jenis Kelamin') }}" />
{{--                <x-jet-input class="block mt-1 w-full" type="text" name="jenis_kelamin" :value="old('jenis_kelamin')" required autofocus autocomplete="jenis_kelamin" />--}}
                <select class="custom-select" name="jenis_kelamin" required>
                    <option value="Laki-laki" >Laki-laki</option>
                    <option value="Perempuan" >Perempuan</option>
                </select>
            </div>

            <div class="mt-4">
                <x-jet-label value="{{ __('Riwayat Pendidikan') }}" />
{{--                <x-jet-input class="block mt-1 w-full" type="text" name="riwayat_pendidikan" :value="old('riwayat_pendidikan')" required autofocus autocomplete="riwayat_pendidikan" />--}}
                <select class="custom-select" name="riwayat_pendidikan" required>
                    <option value="SMA/SMK" >SMA/SMK</option>
                    <option value="D3" >D3</option>
                    <option value="Sarjana" >Sarjana</option>
                    <option value="Magister" >Magister</option>
                    <option value="Lainnya" >Lainnya</option>
                </select>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>

    <!-- General JS Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="{{ asset('stisla/js/modules/jquery.min.js') }}"></script>
    <script defer async src="{{ asset('stisla/js/modules/tooltip.js') }}"></script>
    <script src="{{ asset('stisla/js/modules/bootstrap.min.js') }}"></script>

    <script defer src="{{ asset('stisla/js/modules/jquery.nicescroll.min.js') }}"></script>
    <script defer src="{{ asset('stisla/js/modules/moment.min.js') }}"></script>
    <script defer src="{{ asset('stisla/js/modules/marked.min.js') }}"></script>
    <script defer src="{{ asset('vendor/notyf/notyf.min.js') }}"></script>
    <script defer src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script defer src="{{ asset('stisla/js/modules/chart.min.js') }}"></script>
    <script defer src="{{asset('vendor/summernote/dist/summernote-bs4.js')}}"></script>
    <script defer src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
    <script defer src="{{asset('vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
    {{--<script src="{{asset('assets/bootstrap-daterangepicker/daterangepicker.js')}}"></script>--}}

    <script src="{{ asset('stisla/js/stisla.js') }}"></script>
    <script src="{{ asset('stisla/js/scripts.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    {{--<livewire:scripts/>--}}

    <script>
        $('.daterange-cus').daterangepicker({
            locale: {format: 'YYYY-MM-DD'},
            drops: 'down',
            opens: 'right'
        });
    </script>

    <script>



        const SwalModal = (icon, title, html) => {
            Swal.fire({
                icon,
                title,
                html
            })
        }

        const SwalConfirm = (icon, title, html, confirmButtonText, method, params, callback) => {
            Swal.fire({
                icon,
                title,
                html,
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText,
                reverseButtons: true,
            }).then(result => {
                if (result.value) {
                    return livewire.emit(method, params)
                }

                if (callback) {
                    return livewire.emit(callback)
                }
            })
        }

        const SwalAlert = (icon, title, timeout = 2000) => {
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: timeout,
                onOpen: toast => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon,
                title
            })
        }

        document.addEventListener('DOMContentLoaded', () => {
            this.livewire.on('swal:modal', data => {
                SwalModal(data.icon, data.title, data.text)
            })

            this.livewire.on('swal:confirm', data => {
                SwalConfirm(data.icon, data.title, data.text, data.confirmText, data.method, data.params, data.callback)
            })

            this.livewire.on('swal:alert', data => {
                SwalAlert(data.icon, data.title, data.timeout)
            })
        })
    </script>

</x-guest-layout>
