@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="container">
                <h5 class="text-center mt-4 mb-2">{{ $semester_name }}</h5>
                <h3 class="text-center mb-3">{{ $class->name }}</h3>
                @yield('class_content')
            </div>
        </div>
    </div>
</div>
@endsection