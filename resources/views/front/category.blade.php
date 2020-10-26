@extends('front.index')

@section('content')

    <!--================Categories Banner Area =================-->
    <section class="categories_banner_area">
        <div class="container">
            <div class="c_banner_inner">
                <h3>{{$category->categ_name_en}}</h3>
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="current"><a href="{{url($category->slug)}}">{{$category->categ_name_en}}</a></li>
                </ul>
            </div>
        </div>
    </section>
    <!--================End Categories Banner Area =================-->
    
    <!--================Categories Product Area =================-->
    <section class="categories_product_main p_80">
        <div class="container">
            <div class="categories_main_inner">
                <div class="row row_disable">
                    <div class="col-lg-9 float-md-right">
                        <div class="showing_fillter">
                            <div class="row m0">
                                <div class="first_fillter">
                                    <h4>Showing 1 to 12 of 30 total</h4>
                                </div>
                                <div class="secand_fillter">
                                    <h4>SORT BY :</h4>
                                    <select class="selectpicker">
                                        <option>Name</option>
                                        <option>Name 2</option>
                                        <option>Name 3</option>
                                    </select>
                                </div>
                                <div class="third_fillter">
                                    <h4>Show : </h4>
                                    <select class="selectpicker">
                                        <option>09</option>
                                        <option>10</option>
                                        <option>10</option>
                                    </select>
                                </div>
                                <div class="four_fillter">
                                    <h4>View</h4>
                                    <a class="active" href="#"><i class="icon_grid-2x2"></i></a>
                                    <a href="#"><i class="icon_grid-3x3"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="categories_product_area">
                            <div class="row">
                                @foreach ($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    <div class="l_product_item">
                                        <div class="l_p_img">
                                            <a href="{{url('/'.$product->slug.'.html')}}"><img src="{{ asset('storage/'.$product->photo) }}" alt="{{$product->title}}"></a>
                                        </div>
                                        <div class="l_p_text">
                                            <ul>
                                                <li class="p_icon"><a href="{{url('/'.$product->slug.'.html')}}"><i class="icon_piechart"></i></a></li>
                                                <li><a class="add_cart_btn" href="#">Add To Cart</a></li>
                                                <li class="p_icon"><a href="#"><i class="icon_heart_alt"></i></a></li>
                                            </ul>
                                            <h4>{{$product->title}}</h4>
                                            <h5><del>${{$product->price}}</del>  ${{$product->price_offre}}</h5>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <nav aria-label="Page navigation example" class="pagination_area">
                                <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item"><a class="page-link" href="#">6</a></li>
                                <li class="page-item next"><a class="page-link" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 float-md-right">
                        <div class="categories_sidebar">
                            <aside class="l_widgest l_p_categories_widget">
                                <div class="l_w_title">
                                    <h3>Categories</h3>
                                </div>
                                <ul class="navbar-nav">
                                    @foreach ($categories->where('parent',null) as $categ)
                                    <li class="nav-item dropdown  @if($category->id == $categ->id || $category->parent == $categ->id) show @endif">
                                        <a class="nav-link dropdown-toggle" href="{{ url('/'.$categ->slug.'.html') }}" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{$categ->categ_name_en}}
                                            @if ($categories->where('parent',$categ->id)->count())
                                                <i class="icon_plus" aria-hidden="true"></i>
                                                <i class="icon_minus-06" aria-hidden="true"></i>
                                            @endif
                                        </a>
                                        @if ($categories->where('parent',$categ->id)->count())
                                        <ul class="dropdown-menu @if($category->id == $categ->id || $category->parent == $categ->id) show @endif" aria-labelledby="navbarDropdown">
                                            @foreach ($categories->where('parent',$categ->id) as $categ_child)
                                            <li class="nav-item"><a class="nav-link" href="{{ url('/'.$categ_child->slug.'.html') }}">{{$categ_child->categ_name_en}}</a></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </aside>
                            <aside class="l_widgest l_fillter_widget">
                                <div class="l_w_title">
                                    <h3>Filter section</h3>
                                </div>
                                <div id="slider-range" class="ui_slider"></div>
                                <label for="amount">Price:</label>
                                <input type="text" id="amount" readonly>
                            </aside>
                            <aside class="l_widgest l_color_widget">
                                <div class="l_w_title">
                                    <h3>Color</h3>
                                </div>
                                <ul>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                    <li><a href="#"></a></li>
                                </ul>
                            </aside>
                            <aside class="l_widgest l_menufacture_widget">
                                <div class="l_w_title">
                                    <h3>Manufacturer</h3>
                                </div>
                                <ul>
                                    @foreach ($makers as $maker)
                                        <li><a href="{{url('/'.slugify($maker->name_en).'.html')}}">{{$maker->name_en}}</a></li>
                                    @endforeach
                                </ul>
                            </aside>
                            <aside class="l_widgest l_feature_widget">
                                <div class="l_w_title">
                                    <h3>Featured Products</h3>
                                </div>
                                @foreach ($products->Where('favored','1')->take(2) as $fproduct)
                                <div class="media">
                                    <div class="d-flex">
                                        <a href="{{url('/'.$product->slug.'.html')}}"><img src="{{ asset('storage/'.$fproduct->photo) }}" alt="{{$fproduct->title}}" width="120px"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4><a href="{{url('/'.$product->slug.'.html')}}" style="color: inherit">{{$fproduct->title}}</a></h4>
                                        <h5>${{$fproduct->price_offre}}</h5>
                                    </div>
                                </div>
                                @endforeach
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Categories Product Area =================-->

@endsection