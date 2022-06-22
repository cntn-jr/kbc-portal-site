@extends('layouts.admin_base')

@section('admin_content')

    <h3 class="text-center mt-4 mb-5">{{$semester_name}}</h3>
    <a class="btn btn-outline-secondary mx-1 my-2" href="{{ route('class.create', $semester_id) }}" role="button">クラス追加</a>
    @foreach($classes as $class_group)
        <div class="d-flex flex-row">
            @foreach($class_group as $class)
                <div class="card m-1" style="width: 16rem; height: 15rem;">
                    <div class="card-body" style="
                    display:flex;
                    flex-flow: column;
                    justify-content:space-between;">
                        <h5 class="card-title mt-2 text-center">
                            {{$class->class_name}}
                        </h5>
                        <div class="card-text text-center">{{$class->teacher_name}}</div>
                        <div class="card-text text-center">{{$class->email}}</div>
                        <div class="card-text">
                            <form action="{{ route('class.destroy', ['semester_id' => $semester_id, 'class_id' => $class->class_id]) }}" method="post">
                                <button class="text-reset btn btn-light mb-1" type="submit"><i class="far fa-trash-alt"></i></button>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
                @endforeach

@endsection