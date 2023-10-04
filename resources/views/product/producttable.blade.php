<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<table class="w-full table-auto" id="product-table">
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
<script>
    $(document).ready(function () {
        const searchInput = $('#search');
        const productsTable = $('#product-table tbody');
        searchInput.on('input', function () {
            const keyword = searchInput.val();
            $.ajax({
                url: "http://127.0.0.1:8000/products/search",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    keyword: keyword
                },
                success: function (response) {
                    // console.log(response);
                    productsTable.empty();
                    response.forEach(function (product) {
                        productsTable.append(
                            '<tr >' +
                            '<td class="border px-4 py-2">' + product.name + '</td>' +
                            '<td class="border px-4 py-2">' + product.description + '</td>' +
                            '<td class="border px-4 py-2">' + product.price + '</td>' +
                            '</tr>'
                        );
                    });
                },
                error: function (xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
