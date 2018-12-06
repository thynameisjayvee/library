<div class="col-md-8">
  <h1>More Books</h1>
  {{$books->links()}}
</div>
<div class="col-md-8">
  <div class="card-deck">
    @foreach ($books as $book)
    <div class="card" style="max-width:29.5%;">
      <img class="card-img-top" src="{{url('books/', $book->img_url)}}" alt="Card image cap" height="200px">
      <div class="card-body">
        <h5 class="card-title">{{$book->title}}</h5>
        <p class="card-text">{{$book->synopsis}}</p>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
    </div>
    @endforeach
  </div>
</div>
