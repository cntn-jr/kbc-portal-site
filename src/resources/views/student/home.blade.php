@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body text-center py-4">
                    {{Auth::user()->name}}{{ __(' さん、KBCのポータルサイトへようこそ') }}
                </div>
            </div>
            @if($class_id)
                <a class="btn btn-outline-secondary my-3" href="{{ route('class.show_at_student', $class_id) }}" role="button">クラス画面へ</a>
            @endif
        </div>
    </div>
</div>
@endsection
