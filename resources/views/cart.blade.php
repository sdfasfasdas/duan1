@extends('layoutcart')
@section('cart')


@if(session('cart'))



    @foreach(session('cart') as $id => $details)
        <tr>
            <td>
                <div class="media">
                    <img src="{{ asset('img/product/' . $details['image']) }}" class="img-thumbnail" width="100"
                        alt="{{ $details['name'] }}">
                    <div class="media-body ms-3">
                        <p class="mb-0">{{ $details['name'] }}</p>
                    </div>
                </div>
            </td>
            <td>{{ number_format($details['price'], 0, ',', '.') }}</td>
            <td>
                <div class="input-group">
                    <button class="btn btn-outline-secondary" type="button" onclick="updateCart('{{ $id }}', 'decrease')">
                        <i class="fa fa-minus"></i>
                    </button>
                    <input type="text" name="qty" class="form-control text-center" value="{{ $details['quantity'] }}"
                        data-id="{{ $id }}" id="quantity_{{ $id }}" maxlength="12" title="Quantity:" readonly>
                    <button class="btn btn-outline-secondary" type="button" onclick="updateCart('{{ $id }}', 'increase')">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </td>
            <td>{{ number_format($details['price'] * $details['quantity'], 0, ',', '.') }}</td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="removeFromCart('{{ $id }}')">
                    <i class="fa fa-trash"></i> Remove
                </button>
            </td>
        </tr>
    @endforeach

@else
    <div class="alert alert-warning">
        Your cart is empty
    </div>
@endif


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    function updateCart(id, action) {
        var quantityInput = $("#quantity_" + id);
        var currentQuantity = parseInt(quantityInput.val());

        if (action === 'increase') {
            quantityInput.val(currentQuantity + 1);
        } else if (action === 'decrease' && currentQuantity > 1) {
            quantityInput.val(currentQuantity - 1);
        }

        $.ajax({
            url: '{{ route("cart.update") }}',
            method: "patch",
            data: {
                _token: '{{ csrf_token() }}',
                id: id,
                quantity: quantityInput.val()
            },
            success: function (response) {
                window.location.reload();
            }
        });
    }

    function removeFromCart(id) {
        $.ajax({
            url: '{{ route("cart.remove") }}',
            method: "delete",
            data: {
                _token: '{{ csrf_token() }}',
                id: id
            },
            success: function (response) {
                window.location.reload();
            }
        });
    }
</script>
@endsection