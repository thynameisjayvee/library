@extends('layouts.app')
@section('content')
@if(session()->get('success'))
  <div class="alert alert-success">
    {{ session()->get('success') }}
  </div>
@elseif(session()->get('error'))
  <div class="alert alert-danger">
    {{ session()->get('error') }}
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
          <input type="text" class="form-control mt-3" id="search" placeholder="Type to search books" autocomplete="off" >
        <script>
            $(document).ready(function() {
                var bloodhound = new Bloodhound({
                    datumTokenizer: Bloodhound.tokenizers.whitespace,
                    queryTokenizer: Bloodhound.tokenizers.whitespace,
                    remote: {
                        url: '/librarian/find?q=%QUERY%',
                        wildcard: '%QUERY%'
                    },
                });

                $('#search').typeahead({
                    hint: true,
                    highlight: true,
                    minLength: 1
                }, {
                    name: 'books',
                    source: bloodhound,
                    display: function(data) {
                        return data.title  //Input value to be set when you select a suggestion.
                    },
                    templates: {
                        empty: [
                            '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                        ],
                        header: [
                            '<div class="list-group search-results-dropdown">'
                        ],
                        suggestion: function(data) {
                        return '<div style="font-weight:normal; margin-top:-10px ! important;" class="list-group-item">' + '<a href="http://127.0.0.1:8000/librarian/addbooks/'+data.id+'">'
                                  + data.title +
                                    '<a></div>'
                        }
                    }
                });
            });
        </script>
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
                      <input name="title" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Author</span>
                      </div>
                      <input name="author" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                    </div>

                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">Synopsis</span>
                      </div>
                      <textarea name="synopsis" class="form-control" aria-label="With textarea" required></textarea>
                    </div>
                    <a hidden>{{ $categories = App\Category::All() }}</a>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('#inputGroupSelect01').multiselect({
                              buttonWidth: '370px',
                              maxHeight: 200
                            });
                        });
                    </script>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01">Categories</label>
                        </div>
                        <select name="categories[]" class="custom-select" id="inputGroupSelect01" multiple="multiple" required>
                          @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    <div class="input-group mb-3 mt-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Quantity</span>
                      </div>
                      <input name="quantity" type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
                    </div>

                    <div class="input-group mb-3">
                      <input type="file" name="img_url" class="input-group-text" required>
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
                <h5 class="mt-0"><b>{{$book->title}}</b></h5>
                <h6 class="mt-0"><b>By:</b> {{$book->author}}</h6>
                <p class="responsive" style="width:100%"><b>Synopsis:</b> {{$book->synopsis}}</p>
              </div>
              <div class="media-footer text-muted">
                <form>
                Quantity:<input id="bookQty{!! $book->id !!}" type="text" value="{{$book->quantity}}" style="width:30px; text-align:center; border:none" disabled></input>
                <button id="edit{!! $book->id !!}" type="button" value="Edit">edit</button>
                <button id="save{!! $book->id !!}" type="button" value="Save">save</button>
                <!-- <button id="edit{{$book->id}}" class="btn btn-light ml-1" value="{{$book->id}}">Edit</button> -->
                </form>
                <script type="text/javascript">
                $('#save{!! $book->id !!}').hide();
                $('#edit{!! $book->id !!}').click(function() {
                  $(this).hide();
                  $('#save{!! $book->id !!}').show();
                  document.getElementById('bookQty{!! $book->id !!}').disabled = false;
                });
                $('#save{!! $book->id !!}').click(function() {
                  $(this).hide();
                  $('#edit{!! $book->id !!}').show();
                  document.getElementById('bookQty{!! $book->id !!}').disabled = true;
                });
                //AJAX STARTS HEREEEEEEEEEEEEEEEEEEEEEEEEEEEe
                jQuery(document).ready(function(){
                  jQuery('#save{!! $book->id !!}').click(function(e){
                     e.preventDefault();
                     $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                     jQuery.ajax({
                        url:  '{!! route('updateBookQty', $book->id) !!}',
                        method: 'patch',
                        data: {
                           quantity: jQuery('#bookQty{!! $book->id !!}').val()
                        },
                        success: function(result){
                           console.log(result);
                           alert({!! $book->id !!});
                           jQuery('.alert').show();
                           jQuery('.alert').html(result.success);
                        }});
                     });
                  });
                //AJAX ENDS HEREEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEEE

                  /*
                  document.getElementById("edit{!! $book->id !!}").onclick = buttonState;
                  function buttonState(){
                    var state = document.getElementById("edit{!! $book->id !!}").innerHTML;
                    if (state == "Edit"){
                      document.getElementById('bookQty').disabled = false;
                      document.getElementById("edit{!! $book->id !!}").innerHTML = "Save";
                    }
                    else{
                      document.getElementById('bookQty').disabled = true;
                      document.getElementById("edit{!! $book->id !!}").innerHTML = "Edit";
                    }
                    return state;
                  }
                  */
                </script>
                <button class="btn btn-light ml-1">Delete</button>
              </div>
            </div>
            <div class="card-footer mt-1">
              <b>Category:</b>
              @foreach ($book->categories as $tempcategory)
               {{$tempcategory->name}}
               @if (!$loop->last)
               ,
               @endif
              @endforeach
            </div>
            @endforeach
          </div>
         </div>
        </div>
      </div>
</div>
@endsection
