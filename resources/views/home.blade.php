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
  <div id="tag_container" class="row justify-content-center">
  @include('bookdecks')
  <script type="text/javascript">
      $(window).on('hashchange', function() {
          if (window.location.hash) {
              var page = window.location.hash.replace('#', '');
              if (page == Number.NaN || page <= 0) {
                  return false;
              }else{
                  getData(page);
              }
          }
      });

      $(document).ready(function()
      {
          $(document).on('click', '.pagination a',function(event)
          {
              event.preventDefault();

              $('li').removeClass('active');
              $(this).parent('li').addClass('active');

              var myurl = $(this).attr('href');
              var page=$(this).attr('href').split('page=')[1];

              getData(page);
          });

      });

      function getData(page){
          $.ajax(
          {
              url: '?page=' + page,
              type: "get",
              datatype: "html"
          }).done(function(data){
              $("#tag_container").empty().html(data);
              location.hash = page;
          }).fail(function(jqXHR, ajaxOptions, thrownError){
                alert('No response from server');
          });
      }
  </script>
  <!-- end of pagination script -->
  </div>
</div>
@endsection
