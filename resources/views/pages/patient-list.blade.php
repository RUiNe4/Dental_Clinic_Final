@extends('layouts.admin')
@section('content')
    <main class="">
        @if(!empty($doctor))
            <x-header>
                {{  $doctor[0]->title.' '.$doctor[0]->name }}
            </x-header>
        @endif
        <div
            class="{{ auth ()->user ()->acc_type == 'admin' || request ()->path () == 'doctor/mailbox' ? 'hidden' : '' }}">
            <x-filter-form :sort="$sort"/>
        </div>
        <div class="px-2 mt-3 patient-container">
            @forelse($patients as $patient)
                @include('profile.partials.patient-status')
            @empty
                <div class="text-center absolute top-[40%] right-[40%]">
                    @if(!empty($doctor))
                        {{-- if have doctor but no appointments--}}
                        <span class="font-bold">0</span> patients found for {{ $doctor[0]->title.' '.$doctor[0]->name }}
                    @else
                        {{-- for no search results --}}
                        <span class="font-bold">0</span> patients found
                    @endif
                </div>
            @endforelse
            <div class="mt-6">
                @if(request ()['filter'])
                    {{ $patients -> appends(['filter' => request ()['filter']]) -> links() }}
                @else
                    {{ $patients -> appends(['appointment' => request ()->query('appointment')]) -> links() }}
                @endif
            </div>
        </div>
    </main>
@endsection
