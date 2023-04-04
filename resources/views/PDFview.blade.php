<!DOCTYPE html>
<html>

<head>
    <title>Smile Dental Clinic</title>
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Product name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Qty
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Amount
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($items)
                    @foreach ($items as $key => $item)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">
                                {{ ++$key }}
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $item->treatment_name }}
                            </th>

                            <td class="px-6 py-4">
                                {{ $item->price }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->qty }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $item->qty * $item->price }}
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="flex items-center">
		<label style="margin-top:50px; margin-right:20px;" for="">Total: </label>
		<input type="text" value="{{$total}}" style="background-color: white; text-align:start; width:50px;margin-top:50px;"
					 disabled/>
		<label for="" style="margin-top:50px;">$</label>
	</div>
</body>

</html>
