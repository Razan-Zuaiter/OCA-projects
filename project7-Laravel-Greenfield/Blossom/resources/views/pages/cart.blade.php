@extends('layouts.shopTemp')

@section('shop_content')

<!-- Breadcrumb Area Start Here -->
<div class="breadcrumbs-area position-relative">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="breadcrumb-content position-relative section-content">
                    <h3 class="title-3">Shopping Cart</h3>
                    <ul>
                        <li><a href="index">Home</a></li>
                        <li>Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End Here -->
<!-- cart main wrapper start -->
<div class="cart-main-wrapper mt-no-text">
    <div class="container custom-area">
        <div class="row">
            <div class="col-lg-12 col-custom">
                <!-- Cart Table Area -->
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>

                            <tr>
                                <th class="pro-thumbnail">Image</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>
                                <th class="pro-subtotal">Total</th>

                                <th class="pro-remove">Remove</th>
                            </tr>

                        </thead>
                        <tbody>

                            <?php $total = 0 ?>
                            @if(session('cart'))
                            @foreach(session('cart') as $id => $details)
                            <?php $total += $details['price'] * $details['quantity'] ?>

                            <tr>
                                <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="/images/{{$details['photo']}}" alt="Product" /></a></td>
                                <td class="pro-title"><a href="#">{{ $details['name'] }}</a></td>
                                <td class="pro-price"><span>JOD{{ $details['price'] }}</span></td>
                                <td class="pro-quantity">
                                    <div class="quantity">
                                        <div class="cart-plus-minus">
                                            <input data-id="{{ $id }}" class="cart-plus-minus-box" value="{{$details['quantity']}}" type="text">
                                            <div class="dec qtybutton">-</div>
                                            <div class="inc qtybutton">+</div>
                                            <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                            <div class="inc qtybutton"><i class="fa fa-plus"></i></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="pro-subtotal"><span>JOD{{ $details['price'] * $details['quantity'] }}</span></td>

                                <td class="pro-remove"><a data-id="{{ $id }}" class="remove-from-cart" href="#"><i class="lnr lnr-trash"></i></a></td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <!-- Cart Update Option -->
                <div class="cart-update-option d-block d-md-flex justify-content-between">
                    <div class="cart-update mt-sm-16">

                        <a href="#" id="update-cart" class="btn flosun-button primary-btn rounded-0 black-btn">Update Cart</a>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 ml-auto col-custom">
                <!-- Cart Calculation Area -->
                <div class="cart-calculator-wrapper">
                    <div class="cart-calculate-items">
                        <h3>Cart Totals</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <tr class="total">
                                    <td>Total</td>
                                    <td class="total-amount">JOD {{$total}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <a href="checkout" class="btn flosun-button primary-btn rounded-0 black-btn w-100">Proceed To Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- cart main wrapper end -->
@section('scripts')
<script type="text/javascript">
    $("#update-cart").click(e => {
        e.preventDefault();
        const inputs = document.querySelectorAll(".cart-plus-minus-box");
        const vals = {};
        inputs.forEach(_input => {
            const id = _input.attributes.getNamedItem("data-id");
            if (id) vals[id.value] = _input.value
        })

        $.ajax({
            url: '{{ url("update-cart") }}',
            method: "put",
            data: {
                _token: '{{ csrf_token() }}',
                isMulti: true,
                data: vals
            },
            success: function(response) {
                window.location.reload();
            }
        });

    })



    $(".remove-from-cart").click(function(e) {
        e.preventDefault();
        var ele = $(this);
        console.log("Remove");

        if (confirm("Are you sure")) {
            $.ajax({
                url: '{{ url("remove-from-cart") }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.attr("data-id")
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        }
    });
</script>
@endsection