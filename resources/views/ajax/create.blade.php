@extends('layouts.ajax')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <form id="form">
                @csrf
                <div class="from-group">
                    <label for="product">Enter Product Name</label>
                    <input type="text" class="form-control" name="product" id="name">
                </div>
                <input type="submit" value="Add" class="btn btn-primary mt-3">
            </form>
        </div>
    </div>
</div>
<div aria-live="polite" aria-atomic="false" class="d-flex justify-content-center align-items-center" style="height: 200px;">
    <div class="toast" role="alert" aria-live="polite" aria-atomic="false">
      <div class="toast-body" id="msg">
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
    $( "#form" ).submit(function( event ) {
        data = $( this ).serializeArray();
        $('#name').val(""); 
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'{{ route('ajax.store') }}',
            data:data,
            success:function(response) {
                $(".toast-body").html(response.msg);
                $('.toast').toast('show');
                setTimeout(function() {
                    window.location.href = '{{ route('ajax.index') }}';
                }, 3000);
            }
        });
        event.preventDefault();
    });
</script>
@endsection
