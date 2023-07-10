@extends('layout')
@section('title','TOPページ')
<p class="message">{{ $message ?? '' }}</p>
@section('contents')

<div class="maincontainer">
    <div class="container">
        <section>
            <div class="natura-slider">
                <script>
                    $(document).ready(function(){
                      $(".slider").bxSlider();
                    });
                </script>
                <div class="slider">
                    <div class="slider-item"><a href=""><img src="{{asset('storage/sample/bulldog-1224267_1280.jpg')}}"></a></div>
                    <div class="slider-item"><a href=""><img src="{{asset('storage/sample/fashion-2309519_1280.jpg')}}"></a></div>
                </div>
            </div>
        </section>

        <section>
            <div class="pickup2">
                <div class="row flex-wrapper">

                    <div class="pickup-grow">
                        <a href="{{('/category/1')}}"><div class="index-pickup">
                            <img src="{{asset('storage/sample/fashion-2309519_1280.jpg')}}" alt="">
                                <div class="index-pickup-desc2">Sample</div>
                            </div>
                        </a>
                    </div>
                    
                    <div class="pickup-grow">
                        <a href="{{('/category/2')}}"><div class="index-pickup">
                            <img src="{{asset('storage/sample/woman-570883_1280.jpg')}}" alt="">
                                <div class="index-pickup-desc2">Sample</div>
                            </div>
                        </a>
                    </div>
                    
                    <div class="pickup-grow">
                        <a href="{{('/category/3')}}"><div class="index-pickup">
                            <img src="{{asset('storage/sample/woman-1274056_1280.jpg')}}" alt="">
                                <div class="index-pickup-desc2">Sample</div>
                            </div>
                        </a>
                    </div>
                    
                    <div class="pickup-grow">
                        <a href="{{('/category/4')}}"><div class="index-pickup">
                            <img src="{{asset('storage/sample/woman-1919143_1280.jpg')}}" alt="">
                                <div class="index-pickup-desc2">Sample</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <div class="mainarea">
                <div id="sidebar" class="main-left">
                    <section id="main-left-cat">
                        <h1><i class="fa fa-star"></i>Category</h1>
                        <div class="area-switch">
                            <ul id="appsItemCategoryTag">
                                <li class="appsItemCategoryTag_child"> <a href="{{('/category/1')}}" class="mainHeaderNavColor">☆Category1</a>  </li>
                                <li class="appsItemCategoryTag_child"> <a href="{{('/category/2')}}" class="mainHeaderNavColor">☆Category2</a>  </li>
                                <li class="appsItemCategoryTag_child"> <a href="{{('/category/3')}}" class="mainHeaderNavColor">☆Category3</a>  </li>
                                <li class="appsItemCategoryTag_child"> <a href="{{('/category/4')}}" class="mainHeaderNavColor">☆Category4</a>  </li>
                                <li class="appsItemCategoryTag_child"> <a href="{{('/category/5')}}" class="mainHeaderNavColor">☆Category5</a>  </li>
                                <li class="appsItemCategoryTag_child"> <a href="{{('/category/6')}}" class="mainHeaderNavColor">☆Category6</a>  </li>
                                <li class="appsItemCategoryTag_child"> <a href="{{('/category/7')}}" class="mainHeaderNavColor">☆Category7</a>  </li>
                                <li class="appsItemCategoryTag_child"> <a href="{{('/category/8')}}" class="mainHeaderNavColor">☆Category8</a>  </li>
                                <li class="appsItemCategoryTag_child"> <a href="{{('/category/9')}}" class="mainHeaderNavColor">☆Category9</a>  </li>
                                <li class="appsItemCategoryTag_child"> <a href="{{('/category/10')}}" class="mainHeaderNavColor">☆Category10</a>  </li>  
                            </ul>
                        </div>      
                    </section>
                </div>

            <div class="main-right">
                <section>
                    <div class="area-switch2 clearfix">
                            <h1><i class="fa fa-star" aria-hidden="true"></i>New Items
                                <a href="{{route('products')}}"><span class="arrow-right"><i class="fa-solid fa-arrow-up-right-from-square">一覧</i></span></a>
                            </h1>
                    </div>
                    <div class="main-wrapper">
                        @foreach($items as $item)
                            <div class="item">
                                <a href="{{route('detail',['id' => $item->id])}}">
                                <img id="itemimg" src="{{asset('storage/images/'.$item->imgpath)}}" alt="">
                                </a>
                                <p> {{$item->name}}</p>
                            </div>
                        @endforeach
                    </div>
                    
                        
            </div>
                </section>
            </div>
        </div>
    </div>
</div>
</div>
@endsection