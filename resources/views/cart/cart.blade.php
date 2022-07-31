@if(!empty(session('Cart')))

<!-- #change-item-cart -->
<ul class="list-cart">
    @foreach(session('Cart')->products as $item)
    <li class="clearfix d-flex">
        <a href="" title="" class="thumb fl-left">
            <img src="<?php echo asset('assets/images/products') . '/' . $item['productInfo']->thumb ?>" alt="">
        </a>
        <div class="info fl-right">
            <a href="" title="" class="product-name">{{$item['productInfo']->name}}</a>
            <p class="price">{{number_format($item['productInfo']->new_price)}} vnd</p>
            <p class="qty">Số lượng: <span>{{$item['quanty']}}</span></p>
        </div>
        <a id="delete-item-cart" data-idCart="{{$item['productInfo']->id}}" class="py-3" href="">
            <i class="fa fa-times"></i>
        </a>
    </li>
    @endforeach

</ul>
<div class="total-price clearfix">
    <p class="title fl-left">Tổng:</p>
    <p class="price fl-right">{{number_format(session('Cart')->totalPrice)}} vnd</p>
    <input id="totalQuanty" hidden type="number" value="{{session('Cart')->totalQuanty}}">
</div>
<dic class="action-cart clearfix">
    <a href="{{url('/cart')}}" title="Giỏ hàng" class="view-cart fl-left">Giỏ hàng</a>
    <a href="{{url('/checkout')}}" title="Thanh toán" class="checkout fl-right">Thanh toán</a>
</dic>
@endif