@extends('layouts.admin_base')

@section('admin_content')
    <div class="card-group mt-5 justify-content-center">
        @foreach($semesters as $semester)
            <a href="{{ route('semester.show_at_admin', $semester->id) }}" class="text-secondary" style="text-decoration: none;">
                <div class="card m-1" style="width: 10rem; height: 10rem;">
                    <div class="card-body">
                        <h5 class="card-title text-center mt-5">
                            {{$semester->getSentence() }}
                        </h5>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    <div class="mt-5 d-flex justify-content-around">
        {{$semesters->links()}}
    </div>
@endsection
