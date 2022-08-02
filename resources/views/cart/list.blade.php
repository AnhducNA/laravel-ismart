@extends('layouts.shop')

@section('content')
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="{{url('/')}}" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div id="change-item-listCart">
            @if(!empty(session('Cart')->products))
            <div class="section" id="info-cart-wp">
                <div class="section-detail table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <td>Mã sản phẩm</td>
                                <td>Ảnh sản phẩm</td>
                                <td>Tên sản phẩm</td>
                                <td>Giá sản phẩm</td>
                                <td>Số lượng</td>
                                <td>Thành tiền</td>
                                <td>Xóa</td>
                            </tr>
                            <tr>
                                <td colspan="6"></td>
                                <td><a href="javascript:" onclick="deleteAllListCart()">Xóa tất cả</a></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(session('Cart')->products as $item)
                            <tr>
                                <td>{{$item['productInfo']->id}}</td>
                                <td>
                                    <a href="" title="" class="thumb">
                                        <img src="<?php echo asset('assets/images/products') . '/' . $item['productInfo']->thumb ?>" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="" title="name" class="name-product">{{$item['productInfo']->name}}</a>
                                </td>
                                <td>{{number_format($item['productInfo']->new_price)}} vnd</td>
                                <td>
                                    <input type="number" data-id="{{$item['productInfo']->id}}" id="change-quanty-item-listCart" name="num-order" value="{{$item['quanty']}}" class="num-order" min="1">
                                </td>
                                <td>{{number_format($item['price'])}} vnd</td>
                                <td>
                                    <a href="javascript:" onclick="deleteItemListCart(<?php echo $item['productInfo']->id ?>)" title="delete-product" class="del-product">
                                        <i class="fa fa-trash-o"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <p id="total-price" class="fl-right">Tổng giá: <span>{{number_format(session('Cart')->totalPrice)}} vnd</span></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="7">
                                    <div class="clearfix">
                                        <div class="fl-right">
                                            <a href="javascript: " onclick="changeAllListCart()" title="" id="update-cart">Cập nhật giỏ hàng</a>
                                            <a href="?page=checkout" title="" id="checkout-cart">Thanh toán</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="section" id="action-cart-wp">
                <div class="section-detail">
                    <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                    <a href="?page=home" title="" id="buy-more">Mua tiếp</a><br />
                    <a href="javascript: " onclick="deleteAllListCart()" title="" id="delete-cart">Xóa giỏ hàng</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
@section('include-javascript')
<script>
    function deleteItemListCart($id) {
        $.ajax({
            url: '../listCart/deleteItem/' + $id,
            type: 'GET',
        }).done(function($respone) {
            $('#change-item-listCart').empty();
            $('#change-item-listCart').html($respone);
            $('.totalQuanty-show').text(function() {
                return $('#totalQuanty').val();
            })
            // console.log($('#totalQuanty').val());
        });
    }

    function changeAllListCart() {
        var $list = [];
        $('#info-cart-wp tr td').each(function() {
            $(this).find('input').each(function() {
                var element = {
                    key: $(this).attr('data-id'),
                    value: $(this).val()
                };
                $list.push(element);
            });
        });
        $.ajax({
            url: '../listCart/changeQtyAll',
            type: 'POST',
            data: {
                '_token': "{{csrf_token()}}",
                'data': $list,
            }
        }).done(function() {
            location.reload();

        });
    }

    function deleteAllListCart() {
        $.ajax({
            url: '../listCart/deleteAll',
            type: 'GET',
        }).done(function() {
            location.reload();
        });
    }
</script>
@endsection