@extends('layouts.admin')
@section('content')
    <div class="flex">
        <div>
            <form style="display: grid; grid-template-columns: 150px 400px; column-gap: 0.5rem; row-gap: 0.75rem"
                  action="/admin/doctor-list/{{ $user->id }}/update" id="formUpdateMessage"
                  class="w-fit px-6 py-3" method="POST">
                @csrf
                @method('PATCH')
                <label for="title">Title</label>
                <input onkeydown="submitForm();" name="title" class="" type="text" value="{{ $user->title }}">
                <label for="name">Name</label>
                <input onkeydown="submitForm();" name="name" class="" type="text" value="{{ $user->name }}">
                <label for="email">Email</label>
                <input onkeydown="submitForm();" name="email" class="" type="text" value="{{ $user->email }}">
                <label for="specialist">Specialist</label>
                <input onkeydown="submitForm();" name="specialist" class="" type="text" value="{{ $user->specialist }}">
                <label for="description">Description</label>
                {{--        <input name="description" class=" h-52" type="text" value="{{ $user->description }}">--}}
                <textarea onkeydown="submitForm();" name="description" class="p-2 "
                          rows=4>{{ $user->description }}</textarea>
                <label for="work_experience">Work Experience</label>
                {{--        <input name="work_experience" class="" type="text" value="{{ $user->work_experience }}">--}}
                <textarea onkeydown="submitForm();" name="work_experience" class="p-2 "
                          rows=4>{{ $user->work_experience }}</textarea>
                <label for="acc_type">Account type</label>
                <input disabled name="acc_type" class="" type="text" value="{{ $user->acc_type }}">
                <div></div> {{-- Empty Div for grid --}}
                <div class="flex gap-x-2 items-center justify-end">
                    <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                            class="block font-bold text-white bg-[#EE890C] font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                            type="button">
                        Update
                    </button>

                    <div id="popup-modal" tabindex="-1"
                         class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                        data-modal-hide="popup-modal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                              clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <svg aria-hidden="true"
                                         class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none"
                                         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure
                                        you want to update {{ $user->title.' '.$user->name }} information?</h3>
                                    <button onclick="updateMessage()" data-modal-hide="popup-modal" type="submit"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Yes, I'm sure
                                    </button>
                                    <button onclick="document.location.reload(true)" data-modal-hide="popup-modal" type="button"
                                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                                        No, cancel
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/doctor-list/{{ $user->id }}/password"
                       class="bg-[#6D4AFF] w-56 text-white font-bold rounded-md p-2 text-center items-stretch">
                        Change Password
                    </a>
                </div>
            </form>
            <p class="js-update-message text-right mr-6 text-green-600 font-bold text-xs"></p>
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
                        <td class="pl-3">
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
            event.preventDefault();
            setTimeout(function () {
                document.getElementById("formUpdateMessage").submit();
                document.getElementById(".js-update-message").innerHTML = "";
            }, 3000);
            document.querySelector(".js-update-message").innerHTML = `Successfully Update {{ $user -> title }} {{ $user -> name }} info.
            <span class="text-red-500">Wait for this message to disappear before continuing.</span>
            `;
        }

        function submitForm() {
            if (event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        }
    </script>
@endsection
