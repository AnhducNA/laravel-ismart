@extends('layouts.shop')

@section('content')
<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="info-cart-wp">
            <div class="section-detail table-responsive">
                @if(!empty(session('Cart')->products))
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
                                <a href="" title="" class="name-product">{{$item['productInfo']->name}}</a>
                            </td>
                            <td>{{number_format($item['productInfo']->new_price)}} vnd</td>
                            <td>
                                <input type="number" name="num-order" value="{{$item['quanty']}}" class="num-order">
                            </td>
                            <td>{{number_format($item['price'])}} vnd</td>
                            <td>
                                <a href="javascript:" title="" class="del-product">
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
                                        <a href="" title="" id="update-cart">Cập nhật giỏ hàng</a>
                                        <a href="?page=checkout" title="" id="checkout-cart">Thanh toán</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                @endif
            </div>
        </div>
        <div class="section" id="action-cart-wp">
            <div class="section-detail">
                <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                <a href="?page=home" title="" id="buy-more">Mua tiếp</a><br />
                <a href="" title="" id="delete-cart">Xóa giỏ hàng</a>
            </div>
        </div>
    </div>
</div>
@endsection