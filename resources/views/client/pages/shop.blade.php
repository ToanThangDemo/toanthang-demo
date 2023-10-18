@extends('client.layout.master')
@section('content')
<!-- Breadcrumb Section Begin -->
<section>
    @foreach ($slides as $slide)
    @php
        $imagesLink = is_null($slide->image) || !file_exists('images/'.$slide->image)
        ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
        : asset('images/'. $slide->image);
    @endphp
    <div  class="breadcrumb-section set-bg " data-setbg="{{ $imagesLink }}">
        <div class="container" >
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Department</h4>
                        <ul>

                            @foreach ($product_categories as $product_category)
                            <li><a href="#">{{ $product_category->name }}</a></li>
                       @endforeach
                        </ul>
                    </div>
                    <div class="sidebar__item">
                        <h4>Price</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="10" data-max="540">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar__item sidebar__item__color--option">
                        <h4>Colors</h4>
                        <div class="sidebar__item__color sidebar__item__color--white">
                            <label for="white">
                                White
                                <input type="radio" id="white">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--gray">
                            <label for="gray">
                                Gray
                                <input type="radio" id="gray">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--red">
                            <label for="red">
                                Red
                                <input type="radio" id="red">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--black">
                            <label for="black">
                                Black
                                <input type="radio" id="black">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--blue">
                            <label for="blue">
                                Blue
                                <input type="radio" id="blue">
                            </label>
                        </div>
                        <div class="sidebar__item__color sidebar__item__color--green">
                            <label for="green">
                                Green
                                <input type="radio" id="green">
                            </label>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <h4>Popular Size</h4>
                        <div class="sidebar__item__size">
                            <label for="large">
                                Large
                                <input type="radio" id="large">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="medium">
                                Medium
                                <input type="radio" id="medium">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="small">
                                Small
                                <input type="radio" id="small">
                            </label>
                        </div>
                        <div class="sidebar__item__size">
                            <label for="tiny">
                                Tiny
                                <input type="radio" id="tiny">
                            </label>
                        </div>
                    </div>
                    <div class="sidebar__item">
                        <div class="latest-product__text">
                            <h4>Latest Products</h4>
                            <div class="latest-product__slider owl-carousel">
                                <div class="latest-prdouct__slider__item">
                                   @foreach ($productop as $product)
                                   <a href="#" class="latest-product__item">
                                        <div class="latest-product__item__pic">
                                            @php
                                                $imagesLink = is_null($product->image) || !file_exists('images/'.$product->image)
                                                ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
                                                : asset('images/'. $product->image);
                                            @endphp
                                            <img src="{{ $imagesLink }}" alt="{{ $product->name}}" width="50" height="50" />
                                        </div>
                                        <div class="latest-product__item__text">
                                            <h6>{{ $product->name }}</h6>
                                            <span>${{ $product->price }}</span>
                                        </div>
                                    </a>
                                   @endforeach

                                </div>
                                <div class="latest-prdouct__slider__item">
                                    @foreach ($productop1 as $product)
                                    <a href="#" class="latest-product__item">
                                         <div class="latest-product__item__pic">
                                             @php
                                                 $imagesLink = is_null($product->image) || !file_exists('images/'.$product->image)
                                                 ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
                                                 : asset('images/'. $product->image);
                                             @endphp
                                             <img src="{{ $imagesLink }}" alt="{{ $product->name}}" width="50" height="50" />
                                         </div>
                                         <div class="latest-product__item__text">
                                             <h6>{{ $product->name }}</h6>
                                             <span>${{ $product->price }}</span>
                                         </div>
                                     </a>
                                    @endforeach

                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="product__discount">
                    <div class="section-title product__discount__title">
                        <h2>Sale Off</h2>
                    </div>
                    <div class="row">
                        <div class="product__discount__slider owl-carousel">
                            @foreach ($productoff as $off)
                            <div class="col-lg-4">
                                <div class="product__discount__item">
                                    @php
                                        $imagesLink = is_null($off->image) || !file_exists('images/'.$off->image)
                                        ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
                                        : asset('images/'. $off->image);
                                    @endphp
                                    <div class="product__discount__item__pic set-bg"
                                        data-setbg="{{ $imagesLink }}">
                                        <div class="product__discount__percent">-20%</div>
                                        <ul class="product__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a data-url="{{route('product.add-to-cart',['productId' => $off->id])}}" href="#" class="add-to-cart"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="product__discount__item__text">
                                        <span>{{ $off->product_category->name }}</span>
                                        <h5><a href="#">{{ $off->name }}</a></h5>

                                        <div class="product__item__price">${{ number_format($off->discount_price,2)  }}<span>${{ number_format($off->price,2) }}</span></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="filter__item">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                           <form action="" method="get">
                                <div class="filter__sort" >
                                    <span>Sort By</span>
                                    <select name="sortBy">
                                        <option {{ $sortBy === 'latest' ? 'selected' : ''}} value="latest">Price increase</option>
                                        <option {{ $sortBy === 'oldest' ? 'selected' : ''}} value="oldest">Discount</option>
                                    </select>
                                    <button class="btn btn-warning" type="submit" >Search</button>
                                </div>
                           </form>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="filter__found">
                                <h6><span>16</span> Products found</h6>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="filter__option">
                                <span class="icon_grid-2x2"></span>
                                <span class="icon_ul"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="product__item">
                            @php
                            $imagesLink = is_null($product->image) || !file_exists('images/'.$product->image)
                            ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
                            : asset('images/'. $product->image);
                            @endphp
                            <div class="product__item__pic set-bg" data-setbg="{{$imagesLink}}">
                                <ul class="product__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a data-url="{{route('product.add-to-cart',['productId' => $product->id])}}" href="#" class="add-to-cart"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6><a href="#">{{ $product->name }}</a></h6>
                                <h5>${{ number_format($product->price,2) }}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="product__pagination">
                    {{ $products->links() }}
                    {{-- <a href="#">1</a>
                    <a href="#">2</a>
                    <a href="#">3</a>
                    <a href="#"><i class="fa fa-long-arrow-right"></i></a> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->
@endsection
@section('js-custom')
    <script>
        $(document).ready(function() {
            $('.add-to-cart').on('click', function(event) {
                event.preventDefault();
                var url = $(this).data('url');
                $.ajax({
                    method: 'get', //method form
                    url: url, //action form
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            icon: 'success',
                            // title: 'Notification',
                            text: response.message,

                        });
                        $('#total-items-cart').html(response.total_items);
                        $('#total-price-cart').html('$' + response.total_price.toFixed(2)
                            .replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        // alert(response.message);
                    },
                    statusCode:{
                        401:function(){
                            window.location.href = '{{ route('login')}}';

                        },
                        404: function(){
                            Swal.fire({
                                icon: 'error',
                                text: "Can't add product to cart",
                            });
                        },
                    },
                });
            });
        });
    </script>
@endsection
