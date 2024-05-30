function addProductToWishlist(id, name, quantity, price) {
    $.ajax({
        type: "POST",
        url: "{{ route('wishlist.store') }}",
        data: {
            "_token": "{{ csrf_token() }}",
            id: id,
            name: name,
            quantity: quantity,
            price: price,
        },
        success: function(data) {
            if (data.status == 200) {
                getCartWishlistCount();
                $.notify({
                    icon: "fa fa-check",
                    title: "Success!",
                    message: "Item successfully added to your wishlist!"
                });
            }
        }
    });
}

function getCartWishlistCount() {
    $.ajax({
        type: "GET",
        url: "{{ route('shop.cart.wishlist.count') }}",
        success: function(data) {
            if (data.status == 200) {
                $('#cart-count').html(data.cartCount);
                $('#wishlist-count').html(data.wishlistCount);
            }
        }
    });
}