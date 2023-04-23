@extends('layouts.admin')
@section('content')
    <div class="flex">
        <div>
            <form style="display: grid; grid-template-columns: 150px 400px; column-gap: 0.5rem; row-gap: 0.75rem"
                  action="/admin/doctor-list/{{ $user->id }}/update"
                  class="w-fit px-6 py-3" method="POST">
                @csrf
                @method('PATCH')
                <label for="name">Name</label>
                <input name="name" class="" type="text" value="{{ $user->name }}">
                <label for="email">Email</label>
                <input name="email" class="" type="text" value="{{ $user->email }}">
                <label for="specialist">Specialist</label>
                <input name="specialist" class="" type="text" value="{{ $user->specialist }}">
                <label for="description">Description</label>
                {{--        <input name="description" class=" h-52" type="text" value="{{ $user->description }}">--}}
                <textarea name="description" class="p-2 " rows=4>{{ $user->description }}</textarea>
                <label for="work_experience">Work Experience</label>
                {{--        <input name="work_experience" class="" type="text" value="{{ $user->work_experience }}">--}}
                <textarea name="work_experience" class="p-2 " rows=4>{{ $user->work_experience }}</textarea>
                <label for="acc_type">Account type</label>
                <input name="acc_type" class="" type="text" value="{{ $user->acc_type }}">
                <div></div> {{-- Empty Div for grid --}}
                <div class="flex gap-x-2 justify-end">
                    <button onclick="updateMessage();"
                            class="js-update-btn bg-[#EE890C] px-6 py-2 text-white font-bold rounded-md">
                        Update
                    </button>
                    <a href="/admin/doctor-list/{{ $user->id }}/password"
                       class="bg-[#6D4AFF] w-56 text-white font-bold rounded-md p-2 text-center items-stretch">
                        Change Password
                    </a>
                    <p class="js-message"></p>
                </div>
            </form>
        </div>
        <div class="flex-1 border-l-2 border-[#629AA9]">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Invoice No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Patient Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Invoice Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                </tr>
                </thead>

                <tbody>
                @if (count ($invoices)>0)
                    @foreach ($invoices as $invoice)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $invoice->id }}
                            </th>
                            <td class="px-6 py-4 font-bold">
                                <a href="/appointment/{{ $invoice->patient_id }}">
                                    {{ $invoice->patient_name }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                {{ $invoice->date }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $invoice->amount }}
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>
                            Empty Record
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    @endif
    <script>
        function updateMessage() {
            const messageElement = document.querySelector('.js-message');
            messageElement.innerHTML = 'Finished';
        }
    </script>
@endsection
