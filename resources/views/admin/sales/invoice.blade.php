<x-admin-layout>

    <div class="p-4 py-20 sm:ml-64">
        <div class="text-2xl">
            <p>Sales Master</p>
        </div>

        <div class="mt-4 w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <div class="flex justify-between">
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Create new invoice</h5>
                <a href="{{ route('sale.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Back</a>
            </div>
            <div class="container mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="col-span-1">
                        <div class="bg-white shadow-md rounded-md p-4">
                                <input type="hidden" name="_token" value="UEZyFSU0K9Fzk81Dcg79XewXYIkkWtDJiwPP098T" autocomplete="off">
                                <input type="hidden" name="_method" value="POST">
                                <h2 class="text-lg font-semibold mb-4">Produk yang dipilih</h2>
                                <table class="w-full mb-4">
                                    <thead></thead>
                                    @php
                                    $price_total = 0;
                                    @endphp
                                    <tbody>
                                        @foreach ($items as $item)
                                        <tr>
                                            <td>{{ $item->name }} <br> <small>@foreach ($products as $p)
                                                @if ($p['product_id'] == $item->id)
                                                    @php
                                                        $price = $p['quantity'] * $item->price;
                                                        $price_total += $price;
                                                    @endphp
                                                    Rp. {{ number_format($item->price, 2, ',', '.') }} x {{ $p['quantity'] }}
                                                @endif
                                            @endforeach</small></td>
                                            <td><b>(Rp. {{ number_format($price, 2, ',', '.') }})</b></td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td class="pt-5 text-lg"><b>Total</b></td>
                                            <td class="text-right pt-5 text-lg"><b>Rp. {{ number_format($price_total, 2, ',', '.') }}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="text" name="total" value="75000" hidden>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="bg-white shadow-md rounded-md p-4">
                            <div class="mb-4">
                                <label class="block font-semibold mb-1">Nama Pelanggan <span class="text-red-500">*</span></label>
                                <p>{{ $name }}</p>
                            </div>
                            <div class="mb-4">
                                <label class="block font-semibold mb-1">Alamat Pelanggan <span class="text-red-500">*</span></label>
                                <p>{{ $address }}</p>
                            </div>
                            <div class="mb-4">
                                <label class="block font-semibold mb-1">No Telepon <span class="text-red-500">*</span></label>
                                <p>{{ $phone_number }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <form action="{{ route('sale.invoice-data') }}" method="POST">
                        @csrf
                    <button class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Confirm Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
