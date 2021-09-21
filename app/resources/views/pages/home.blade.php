@extends('layout.master')
@section('title')
    Home
@stop
@section('sidebar')
    @parent
@stop
@section('content')
    <section class="main-content">
        <div class="row">
            <div class="span12">
                <div class="row">
                    <div class="span12">
                        <h4 class="title">
                            <span class="pull-left"><span class="text"><span
                                        class="line">Feature <strong>Products</strong></span></span></span>
                            <span class="pull-right">
										<a class="left button" href="#myCarousel" data-slide="prev"></a><a
                                    class="right button" href="#myCarousel" data-slide="next"></a>
									</span>
                        </h4>
                        <div id="myCarousel" class="myCarousel carousel slide">
                            <div class="carousel-inner">
                                @for($i = 0; $i < count($products); $i++)
                                    <div class="{{ $i == 0 ? 'active' : '' }} item">
                                        <ul class="thumbnails">
                                            @foreach($products[$i] as $product)
                                                <li class="span3">
                                                    <div class="product-box">
                                                        <span class="sale_tag"></span>
                                                        <p><a href="/products/{{ $product->slug }}"><img src="{{ $product->image }}"
                                                                                              alt="{{ $product->title }}"/></a></p>
                                                        <a href="/products/{{ $product->slug }}" class="title">{{ $product->title }}</a><br/>
                                                        <a href="/shop?category=" class="category">category name</a>
                                                        <p class="price">${{ $product->price }}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="span12">
                        <h4 class="title">
                            <span class="pull-left"><span class="text"><span
                                        class="line">Most <strong>bayed</strong></span></span></span>
                            <span class="pull-right">
										<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a
                                    class="right button" href="#myCarousel-2" data-slide="next"></a>
									</span>
                        </h4>
                        <div id="myCarousel-2" class="myCarousel carousel slide">
                            <div class="carousel-inner">
                                @for($i = 0; $i < count($products); $i++)
                                    <div class="{{ $i == 0 ? 'active' : '' }} item">
                                        <ul class="thumbnails">
                                            @foreach($products[$i] as $product)
                                                <li class="span3">
                                                    <div class="product-box">
                                                        <span class="sale_tag"></span>
                                                        <p><a href="/products/{{ $product->slug }}"><img
                                                                    src="{{ $product->image }}" alt="{{ $product->title }}"/></a>
                                                        </p>
                                                        <a href="/products/{{ $product->slug }}" class="title">{{ $product->title }}</a><br/>
                                                        <a href="/shop?category=" class="category">category name</a>
                                                        <p class="price">${{ $product->price }}</p>
                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row feature_box">
                    <div class="span4">
                        <div class="service">
                            <div class="responsive">
                                <img src="themes/images/feature_img_2.png" alt=""/>
                                <h4>MODERN <strong>DESIGN</strong></h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown
                                    printer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="service">
                            <div class="customize">
                                <img src="themes/images/feature_img_1.png" alt=""/>
                                <h4>FREE <strong>SHIPPING</strong></h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown
                                    printer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="span4">
                        <div class="service">
                            <div class="support">
                                <img src="themes/images/feature_img_3.png" alt=""/>
                                <h4>24/7 LIVE <strong>SUPPORT</strong></h4>
                                <p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown
                                    printer.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="our_client">
        <h4 class="title"><span class="text">Brands</span></h4>
        <div class="row">
            <div class="span2">
                <a href="/shop?brand="><img alt="" src="{{ asset('themes/images/clients/14.png') }}"></a>
            </div>
            <div class="span2">
                <a href="/shop?brand="><img alt="" src="{{ asset('themes/images/clients/35.png') }}"></a>
            </div>
            <div class="span2">
                <a href="/shop?brand="><img alt="" src="{{ asset('themes/images/clients/1.png') }}"></a>
            </div>
            <div class="span2">
                <a href="/shop?brand="><img alt="" src="{{ asset('themes/images/clients/2.png') }}"></a>
            </div>
            <div class="span2">
                <a href="/shop?brand="><img alt="" src="{{ asset('themes/images/clients/3.png') }}"></a>
            </div>
            <div class="span2">
                <a href="/shop?brand="><img alt="" src="{{ asset('themes/images/clients/4.png') }}"></a>
            </div>
        </div>
    </section>
@stop
@section('js')
    @parent
@stop
