@extends('layouts.app')
@section('content')
@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}
  </div>
@endif
<script type="text/javascript">
  $(document).ready(function() {
      // show the alert
      $(".alert").fadeTo(2000, 500).slideUp(500, function(){
          $(".alert").slideUp(500);
      });
  });
</script>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Add Book
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post" action="{{route('addBookss')}}" enctype="multipart/form-data">
                  @csrf
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Title</span>
                      </div>
                      <input name="title" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Author</span>
                      </div>
                      <input name="author" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Synopsis</span>
                      </div>
                      <textarea name="synopsis" class="form-control" aria-label="With textarea"></textarea>
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Quantity</span>
                      </div>
                      <input name="quantity" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                    </div>

                    <div class="input-group mb-3">
                      <input type="file" name="img_url" class="input-group-text">
                    </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
    <hr>
    <div class="row justify-content-center">
      <div class="col">
        <div class="card">
          <div class="card-body">
            {{ $books->links() }}
            @foreach ($books as $book)
            <hr>
            <div class="media">
              <img class="mr-3" src="{{url('books/', $book->img_url)}}" alt="Generic placeholder image" height="128px;" width="128px;">
              <div class="media-body">
                <h5 class="mt-0">{{$book->title}}</h5>
                <h6 class="mt-0">By: {{$book->author}}</h6>
                {{$book->synopsis}}
              </div>
              <div class="media-footer text-muted">
                Quantity: {{$book->quantity}}
              </div>
            </div>
            @endforeach
          </div>
         </div>
        </div>
      </div>
</div>
@endsection
