@foreach($categories as $category)
    <h1>{{$category->name}}</h1>
    <h2>{{$category->desc}}</h2>
    <hr>
@endforeach
