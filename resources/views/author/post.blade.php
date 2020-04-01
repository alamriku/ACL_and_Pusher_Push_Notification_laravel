@extends('./layouts.app')
@section('content')
    <div class="row">
        <!-- column -->
        <div class="col-lg-12">
            <div class="card">




                <div class="card card-body">
                    <h4 class="card-title">Author{{$user->name}}</h4>
                    <h4 class="card-title">{{$post->slug}}</h4>
                    <h5 class="card-subtitle"> {{$post->description}} </h5>
                    <p>
                        {{$post->post}}
                    </p>
                </div>



            </div>
        </div>

    </div>

@endsection