<link href="/css/categore.css" rel="stylesheet">
<div id="categore" >
<h1 >Категории</h1>
            @foreach(App\Categories::where('parent_id','=',0)->get() as $category)
                <a  href="#spoiler-{{$category->id}}" id="categoreProduct" data-toggle="collapse"  class=" spoiler collapsed">
                    {{$category->name}}
                </a>
                        <div class="collapse" id="spoiler-{{$category->id}}" >
                            @foreach(App\Categories::where('parent_id','=',$category->id)->get() as $podcategory)
                                <a  href="/categories/{{$podcategory->latin_url}}" id="podcategoreProduct">
                                    {{$podcategory->name}}
                                </a>
                            @endforeach
                        </div>
            @endforeach
    </div>


