
<div class="mb-4 px-4 py-3 leading-normal text-black-700 bg-gray-100 rounded-lg text-right" role="alert">
    <i class="fa fa-shopping-cart"></i>


    Cart ({{ $cart_count }})
    <hr>
    @if ($cart_count ==0)

    @else

    <div class="overflow-x-auto relative">
        @if ($message = Session::get('success'))
        <div class="p-4 mb-3 bg-green-400 rounded">
            <p class="text-green-800">{{ $message }}</p>
        </div>
    @endif
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6 rounded-l-lg">
                        Product name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Qty
                    </th>
                    <th scope="col" class="py-3 px-6 rounded-r-lg">
                        Price
                    </th>
                </tr>
            </thead>
@php
$a=0;
@endphp
            @foreach (Cart::content() as $item)
            <tbody>
            <tr class="bg-white dark:bg-gray-800">
                <td class="py-4 px-6">
                    {{ $item->name }}
                </td>
                <td class="py-4 px-6">
                    {{ $item->qty }}
                </td>
                <td class="py-4 px-6">
                    {{ $item->price }}
                </td>
            </tr>
        </tbody>
        @php
        $a+=$item->price;
        @endphp
            @endforeach

            <tfoot class="bg-white dark:bg-gray-800">
                <tr class="font-semibold text-gray-900 dark:text-white">
                    <th scope="row" class="py-3 px-6 text-base">Total</th>
                    <td class="py-3 px-6"></td>
                    <td class="py-3 px-6">{{ $a }}</td>
                </tr>

                <tr>
                    <td class="py-3 px-6">
                    <form wire:submit.prevent="savecartOder" method="post" action="" >
                    <button class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded">Save</button>
                </form>
                    </td >
                    <td class="py-3 px-6"></td>
                    <td class="py-3 px-6"></td>
                </tr>
            </tfoot>
        </table>
    </div>

    @endif

</div>
