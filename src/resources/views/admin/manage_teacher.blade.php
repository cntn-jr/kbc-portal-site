@extends('layouts.admin_base')

@section('admin_content')

    <h3 class="mt-4 mb-3 text-center">教師アカウント一覧</h3>
    <a class="btn btn-outline-secondary my-3" href="{{ route('teacher.register') }}" role="button">アカウント作成</a>
    @foreach($teachers as $teacher)
        <div class="row alert alert-secondary my-0">
            <div class="col-3 text-center mt-2">{{$teacher->name}}</div>
            <div class="col-7 text-center mt-2">{{$teacher->email}}</div>
            <div class="col-2">
                <form action="{{ route('teacher.destroy', $teacher->id) }}" method="post">
                    <button class="text-reset btn btn-light" type="submit">削除</button>
                    {{ method_field('delete') }}
                    @csrf
                </form>
            </div>
        </div>
    @endforeach

@endsection
