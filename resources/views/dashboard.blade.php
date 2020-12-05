<x-app-layout>
    <x-slot name="header_content">
        <h1>Dashboard</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Layout</a></div>
            <div class="breadcrumb-item">Default Layout</div>
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        @if(Auth::user()->role==1)
            <h1>ini dasbor admin</h1>
        @endif
        @if(Auth::user()->role==2)
                <h1>ini dasbor HRD</h1>
        @endif
        @if(Auth::user()->role==3)
                <h1>ini dasbor Jobseeker Premium</h1>
        @endif
        @if(Auth::user()->role==4)
                <h1>ini dasbor Jobseeker Regular</h1>
        @endif
    </div>
</x-app-layout>
