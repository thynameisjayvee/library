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
</script>
