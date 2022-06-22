@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-10 d-flex flex-row bg-white my-3">
            <div class="col-4 text-center my-3">
                <a class="text-secondary" href="{{ route('semester.select_at_admin') }}">
                    学期一覧
                </a>
            </div>
            <span class="border border-right border-light"></span>
            <div class="col-4 text-center my-3">
                <a class="text-secondary" href="{{ route('semester.create') }}">
                    学期追加
                </a>
            </div>
            <span class="border border-right border-light"></span>
            <div class="col-4 text-center my-3">
                <a class="text-secondary" href="{{ route('teacher.manage') }}">
                    教師一覧
                </a>
            </div>
        </div>
        <div class="col-md-8">
            <div class="container">
                @yield('admin_content')
            </div>
        </div>
    </div>
</div>
@endsection