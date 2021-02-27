
<!-- Categories Section Begin -->
<?php
$categories=DB::table('categories')->where([['status',1],['parent_id',0]])->get();
?>

<section class="categories">
    <div class="container">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach($categories as $category)
                    <?php
                    $sub_categories=DB::table('categories')->select('id','name')->where([['parent_id',$category->id],['status',1]])->get();
                    ?>
                <div class="col-lg-3">

                    <div class="categories__item set-bg" data-setbg="img/categories/cat-1.jpg">
                        <h5 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordian" href="#sportswear{{$category->id}}">

                            </a>
                            <a href="{{route('cats',$category->id)}}">{{$category->name}}</a>

                        </h5>
                    </div>
                    @if(count($sub_categories)>0)
                        <div id="sportswear{{$category->id}}" class="panel-collapse collapse">
                            <div class="panel-body">
                                <ul>
                                    @foreach($sub_categories as $sub_category)
                                        <li><a href="{{route('cats',$sub_category->id)}}">{{$sub_category->name}} </a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
                @endforeach
            </div>
        </div>

    </div>


</section>
<!-- Categories Section End -->


