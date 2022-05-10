@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group mt-5">
                @foreach($semesters as $semester)
                    <div class="card m-1" style="width: 10rem; height: 10rem;">
                        <a href="{{ route('semester.show_at_admin', $semester->id) }}" class="text-secondary" style="text-decoration: none;">
                            <div class="card-body">
                                <h5 class="card-title text-center mt-5">
                                    {{$semester->getSentence() }}
                                </h5>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="mt-3">
                {{$semesters->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
