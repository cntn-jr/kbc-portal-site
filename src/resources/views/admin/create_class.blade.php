@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('class.store', $semester_id) }}" class="container" method="POST">
                <h3 class="mt-4 mb-2 text-center">{{ $semester_name }}</h3>
                <h5 class="mb-4 text-center">クラス作成</h5>
                <div class="form-group my-3 col-8 mx-auto">
                    <label for="class_name">クラス名</label>
                    <input type="text" class="form-control" id="class_name" placeholder="xxx科x年" name="class_name">
                </div>
                <div class="form-group my-3 col-8 mx-auto">
                    <label for="teacher">担任教師</label>
                    <select id="teacher" class="form-control" name="teacher_id">
                        @foreach($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-3 col-8 mx-auto">
                    <button type="submit" class="btn btn-secondary">作成</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection
