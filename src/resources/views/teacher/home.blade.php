@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body text-center py-4">
                    {{Auth::user()->name}}{{ __(' さん、KBCのポータルサイトへようこそ') }}
                </div>
            </div>
            @if($semester_id)
                <a class="btn btn-outline-secondary my-3" href="{{ route('class.select', $semester_id) }}" role="button">最新学期画面へ</a>
            @endif
        </div>
    </div>
</div>
@endsection
