@extends('./layouts.app')
@section('content')
<div class="row">
    <!-- column -->
    <div class="col-lg-12">
        <div class="card">




                <div class="card card-body">
                    <h4 class="card-title">Default Forms</h4>
                    <h5 class="card-subtitle"> All bootstrap element classies </h5>
                    <form class="form-horizontal mt-4" action="{{route('save-post')}}" method="post">
                        @csrf

                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        <div class="form-group">
                            <label>slug</label>
                            <input type="text" class="form-control" name="slug" placeholder="placeholder">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="5" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Post</label>
                            <textarea class="form-control" rows="5" name="post"></textarea>
                        </div>
                        <button class="btn btn-danger" type="submit">Save</button>
                    </form>
                </div>



        </div>
    </div>

</div>
<script>
    $.toast({
        heading: 'message'
        , text: '{{session('status')}}'
        , position: 'top-right'
        , loaderBg: '#ff6849'
        , icon: 'info'
        , hideAfter: 3500
        , stack: 6
    })
</script>
@endsection