@extends('front.index')

@section('content')


<!--================Main Content Area =================-->
<section class="home_sidebar_area">
    <div class="container">
        <div class="row row_disable">
            <div class="col-lg-9 float-md-right">
                <div class="sidebar_main_content_area">
                    <div class="advanced_search_area">
                        <select class="selectpicker" name="search_cat">
                            @foreach ($categoriest as $cat)
                            <option value="{{$cat->id}}">{{$cat->categ_name_en}}</option>
                            @endforeach
                        </select>
                        <div class="input-group">
                            <input type="text" class="form-control" name="search_key" placeholder="Search" aria-label="Search">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button"><i class="icon-magnifier icons"></i></button>
                            </span>
                        </div>
                    </div>
                    <div class="main_slider_area">
                        <div id="home_box_slider" class="rev_slider" data-version="5.3.1.6">
                            <ul>
                                @foreach ($slides as $slide)
                                <li data-index="rs-{{$slide->id}}" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="default" data-easeout="default" data-masterspeed="300"  data-thumb="img/home-slider/slider-1.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Creative" data-param1="01" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                                    <!-- MAIN IMAGE -->
                                    <img src="{{ url('storage/'.$slide->photo) }}"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" class="rev-slidebg" data-no-retina>

                                    <!-- LAYER NR. 1 -->
                                    <div class="slider_text_box first_text">
                                        <div class="tp-caption tp-resizeme first_text"
                                        data-x="['left','left','left','left','left','left']"
                                        data-hoffset="['60','60','60','60','20','0']"
                                        data-y="['top','top','top','top','top','top']"
                                        data-voffset="['70','70','70','70','70','70']"
                                        data-fontsize="['48','48','48','48','48','48']"
                                        data-lineheight="['56','56','56','56','56','48']"
                                        data-width="['none','none','none','none','none']"
                                        data-height="none"
                                        data-whitespace="nowrap"
                                        data-type="text"
                                        data-responsive_offset="on"
                                        data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:0px;s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                        data-textAlign="['left','left','left','left','left','left']"
                                        >{!! $slide->title !!}</div>

                                        <div class="tp-caption tp-resizeme secand_text"
                                            data-x="['left','left','left','left','left','left']"
                                            data-hoffset="['60','60','60','60','20','0']"
                                            data-y="['top','top','top','top']" data-voffset="['190','190','190','190','190','190']"
                                            data-fontsize="['14','14','14','14','14','14']"
                                            data-lineheight="['24','24','24','24','24']"
                                            data-width="['300','300','300','300','300']"
                                            data-height="none"
                                            data-whitespace="normal"
                                            data-type="text"
                                            data-responsive_offset="on"
                                            data-transform_idle="o:1;"
                                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                            data-textAlign="['left','left','left','left','left','left']"
                                            >{{ $slide->description }}
                                        </div>

                                        <div class="tp-caption tp-resizeme third_btn"
                                            data-x="['left','left','left','left','left','left']"
                                            data-hoffset="['60','60','60','60','20','0']"
                                            data-y="['top','top','top','top']" data-voffset="['290','290','290','290','290','290']"
                                            data-width="none"
                                            data-height="none"
                                            data-whitespace="nowrap"
                                            data-type="text"
                                            data-responsive_offset="on"
                                            data-frames="[{&quot;delay&quot;:10,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;&quot;,&quot;mask&quot;:&quot;x:0px;y:[100%];s:inherit;e:inherit;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;y:[175%];&quot;,&quot;mask&quot;:&quot;x:inherit;y:inherit;s:inherit;e:inherit;&quot;,&quot;ease&quot;:&quot;Power2.easeInOut&quot;}]"
                                            data-textAlign="['left','left','left','left','left','left']">
                                            <a class="checkout_btn" href="{{ $slide->url }}">shop now</a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="promotion_area">
                        <div class="feature_inner row m0">
                            <div class="left_promotion">
                                <div class="f_add_item">
                                    <div class="f_add_img"><img class="img-fluid" src="{{ asset('design/front') }}/img/feature-add/f-add-6.jpg" alt=""></div>
                                    <div class="f_add_hover">
                                        <div class="sale">Sale</div>
                                        <h4>Best Summer <br />Collection</h4>
                                        <a class="add_btn" href="#">Shop Now <i class="arrow_right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="right_promotion">
                                <div class="f_add_item right_dir">
                                    <div class="f_add_img"><img class="img-fluid" src="{{ asset('design/front') }}/img/feature-add/f-add-7.jpg" alt=""></div>
                                    <div class="f_add_hover">
                                        <div class="off">10% off</div>
                                        <h4>Best Summer <br />Collection</h4>
                                        <a class="add_btn" href="#">Shop Now <i class="arrow_right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="fillter_home_sidebar">
                        <ul class="portfolio_filter">
                            <li class="active" data-filter="*"><a href="#">All</a></li>
                            @foreach ($arr_cats as $kc => $cat_id)
                                @foreach ($categoriest->where('id',$cat_id)->take(4) as $category)
                                <li data-filter=".{{slugify($category->categ_name_en)}}"><a href="#">{{$category->categ_name_en}}</a></li>
                                @endforeach
                            @endforeach
                        </ul>
                        <div class="home_l_product_slider owl-carousel">
                            @foreach ($arr_cats as $kc => $cat_id)
                            @foreach ($categoriest->where('id',$cat_id)->take(4) as $category)
                            <div class="item {{slugify($category->categ_name_en)}}">
                                @foreach ($products->where('category_id',$category->id)->take(2) as $product)
                                <div class="l_product_item">
                                    <div class="l_p_img">
                                        <a href="{{url('/'.$product->slug.'.html')}}"><img src="{{ asset('storage/'.$product->photo) }}" alt="{{$product->title}}"></a>
                                        <h5 class="sale">Sale</h5>
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
                                @endforeach
                            </div>
                            @endforeach
                            @endforeach
                        </div>
                    </div>

                    <div class="home_sidebar_blog">
                        <h3 class="single_title">From The Blog</h3>
                        <div class="row">
                            @foreach ($posts as $post)
                            <div class="col-lg-4 col-sm-6">
                                <div class="from_blog_item">
                                    <img class="img-fluid" src="{{ url('storage/'.$post->photo) }}" alt="">
                                    <div class="f_blog_text">
                                        <h5>{{ $post->category }}</h5>
                                        <p>{{ str_limit($post->title, 36) }}</p>
                                        <h6>{{ date('d.m.Y', strtotime($post->date)) }}</h6>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 float-md-right">
                <div class="left_sidebar_area">
                    <aside class="l_widget l_categories_widget">
                        <div class="l_title">
                            <h3>categories</h3>
                        </div>
                        <ul>
                            @foreach ($categories as $category)
                            <li><a href="{{ url('/'.$category->slug.'.html') }}">{{ $category->categ_name_en }}</a></li>
                            @endforeach
                        </ul>
                    </aside>
                    <aside class="l_widget l_supper_widget">
                        <img class="img-fluid" src="{{ asset('design/front') }}/img/supper-add-1.jpg" alt="">
                        <h4>Super Summer Collection</h4>
                    </aside>
                    <aside class="l_widget l_feature_widget">
                        <div class="verticalCarousel">
                            <div class="verticalCarouselHeader">
                                <div class="float-md-left">
                                    <h3>Featured Products</h3>
                                </div>
                                <div class="float-md-right">
                                    <a href="#" class="vc_goUp"><i class="arrow_carrot-left"></i></a>
                                    <a href="#" class="vc_goDown"><i class="arrow_carrot-right"></i></a>
                                </div>
                            </div>
                            <ul class="verticalCarouselGroup vc_list">
                                @foreach ($products as $product)
                                <li>
                                    <div class="media">
                                        <div class="d-flex">
                                            <a href="{{ url('/'.$product->slug) }}"><img src="{{ asset('storage/'.$product->photo) }}" alt="{{$product->title}}" style="width:100px;max-height:70px"></a>
                                        </div>
                                        <div class="media-body">
                                            <h4>{{ $product->title }}</h4>
                                            <h5>${{$product->price}}</h5>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                    <aside class="l_widget l_news_widget">
                        <h3>newsletter</h3>
                        <p>Sign up for our Newsletter !</p>
                        <div class="suscribe_response"></div>
                        <form class="widget_newsletter" action="" method="POST">
                            <div class="input-group">
                                <input type="email" name="email" class="form-control" placeholder="yourmail@domain.com" aria-label="Search for..." required>
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary subs_btn" type="button">Subscribe</button>
                                </span>
                            </div>
                        </form>
                    </aside>
                    <aside class="l_widget l_hot_widget">
                        <h3>Summer Hot Sale</h3>
                        <p>Premium 700 Product , Titles and Content Ideas</p>
                        <a class="discover_btn" href="#">shop now</a>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Main Content Area =================-->


@endsection
@section('script')
    <script>
        $(function(){
            $(document).on('click', '.subs_btn', function (e) {
                e.preventDefault();
                var nemail = $('.widget_newsletter').find('input[name="email"]').val();

                if(nemail!=='') {
                    $.ajax({
                        url: '{{ url("/subscribe") }}',
                        dataType: 'json',
                        type: 'post',
                        data: {_token:'{{csrf_token()}}', subscribe: true, email: nemail },
                        success: function (data) {
                            var msg_success = data.success;
                            $('.suscribe_response').html('<div class="alert alert-success">'+msg_success+'</div>');
                            $('.widget_newsletter').find('input[name="email"]').val('');
                        },
                        error: function (data) {
                            var errors = data.responseJSON.errors;
                            if( data.status === 422 ) {
                                errorsHtml = '<div class="alert alert-danger"><ul>';

                                $.each( errors, function( key, value ) {
                                    errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                                });
                                errorsHtml += '</ul></div>';

                                $('.suscribe_response').html(errorsHtml);
                            } else {
                                alert('Error !: '+ data);
                            }
                        },
                        fail: function () {
                            alert('The request failed!');
                        }
                    });
                } else {
                    alert("Insert an email!");
                }
            });
        });
    </script>
@endsection
