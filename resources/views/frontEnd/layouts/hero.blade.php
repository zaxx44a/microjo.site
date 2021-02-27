<!-- Hero Section Begin -->
<?php
$categories=DB::table('categories')->where([['status',1],['parent_id',0]])->get();
?>

<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>All Categories</span>
                    </div>
                    <ul>
                        @foreach($categories as $category)
                            <?php
                            $sub_categories=DB::table('categories')->select('id','name')->where([['parent_id',$category->id],['status',1]])->get();
                            ?>
                                <li>
                                     <a data-toggle="collapse" data-parent="#accordian" href="#sportswear{{$category->id}}"></a>
                                      <a href="{{route('cats',$category->id)}}">{{$category->name}}</a>
                                </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="hero__search">
                    <div class="hero__search__form">
                        <form action="#">
                            <div class="hero__search__categories">
                                All Categories
                                <span class="arrow_carrot-down"></span>
                            </div>
                            <input type="text" placeholder="What do yo u need?">
                            <button type="submit" class="site-btn">SEARCH</button>
                        </form>
                    </div>
                    <div class="hero__search__phone">
                        <div class="hero__search__phone__icon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="hero__search__phone__text">
                            <h5>+962795156207</h5>
                            <span>support 24/7 time</span>
                        </div>
                    </div>
                </div>
                @yield('banner')

            </div>
        </div>
    </div>
</section>
<!-- Hero Section End -->
@yield('Breadcrumb')
