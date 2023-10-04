<table class="w-full table-auto">
    <thead>
        <tr>
            <th class="px-4 py-2">Name</th>
            <th class="px-4 py-2">Description</th>
            <th class="px-4 py-2">Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td class="border px-4 py-2">{{ $product->name }}</td>
            <td class="border px-4 py-2">{{ $product->description }}</td>
            <td class="border px-4 py-2">৳{{ number_format($product->price, 2) }}</td>
        </tr>
        @endforeach
    </tbody>
</table> 