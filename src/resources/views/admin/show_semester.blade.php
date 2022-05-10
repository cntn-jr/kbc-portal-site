@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
                <h3 class="text-center mt-4 mb-5">{{$semester_name}}</h3>
                <a class="btn btn-outline-secondary mx-1 my-2" href="#" role="button">クラス追加</a>
                @foreach($classes as $class_group)
                    <div class="d-flex flex-row">
                        @foreach($class_group as $class)
                            <div class="card m-1" style="width: 15rem; height: 12rem;">
                                <div class="card-body">
                                    <h5 class="card-title mt-3 mb-4 text-center">
                                        {{$class->class_name}}
                                    </h5>
                                    <p class="card-text text-center">{{$class->teacher_name}}</p>
                                    <p class="card-text text-center">{{$class->email}}</p>
                                    <p class="card-text">
                                        <a href="##" class="text-reset" role="button"><i class="far fa-trash-alt"></i></a>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection