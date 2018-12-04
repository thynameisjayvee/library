@extends('layouts.app')

@section('content')
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
    <h1>Most Borrowed Books</h1>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="media">
                  <div class="col-4">
                    <img src="{{asset('angels&demons.jpg')}}" alt="" class="img-thumbnail">
                  </div>
                  <div class="col-8">
                  <div class="media-body">
                    <h5 class="mt-0">Inferno</h5>
                    <p class="text-justify">The quick brown sadjhakdjhaskjdhasjkdhkjsaox jumps over the laasdbjhasgdjasgdjashdhgsdhasdakjsdhkjadhkjahsdkjhskjzy dog. But the turtle wins the race</p>
                  </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="carousel-item" style="height: 400px;">
            <div class="row">
              <div class="media">
                  <div class="col-4">
                    <img src="{{asset('davinci.jpg')}}" alt="" class="img-thumbnail">
                  </div>
                  <div class="col-8">
                  <div class="media-body">
                    <h5 class="mt-0">Inferno</h5>
                    <p class="text-justify">The quick brown sadjhakdjhaskjdhasjkdhkjsaox jumps over the laasdbjhasgdjasgdjashdhgsdhasdakjsdhkjadhkjahsdkjhskjzy dog. But the turtle wins the race</p>
                  </div>
                  </div>
              </div>
            </div>
          </div>
          <div class="carousel-item" style="height: 400px;">
            <div class="row">
              <div class="media">
                  <div class="col-4">
                    <img src="{{asset('inferno.jpg')}}" alt="" class="img-thumbnail">
                  </div>
                  <div class="col-8">
                  <div class="media-body">
                    <h5 class="mt-0">Inferno</h5>
                    <p class="text-justify">The quick brown sadjhakdjhaskjdhasjkdhkjsaox jumps over the laasdbjhasgdjasgdjashdhgsdhasdakjsdhkjadhkjahsdkjhskjzy dog. But the turtle wins the race</p>
                  </div>
                  </div>
              </div>
            </div>
        </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <h1>More Books</h1>
    </div>
    <div class="col-md-8">
      <div class="card-deck">
          <div class="card">
            <img class="card-img-top" src="{{asset('angels&demons.jpg')}}" alt="Card image cap" height="200px">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="{{asset('davinci.jpg')}}" alt="Card image cap" height="200px">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
          <div class="card">
            <img class="card-img-top" src="{{asset('inferno.jpg')}}" alt="Card image cap" height="200px">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
