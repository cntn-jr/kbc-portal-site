@extends('layouts.teacher_base')

@section('teacher_content')
    <h5 class="text-center mt-4 mb-2">{{ $semester_name }}</h5>
    <h3 class="text-center mb-5">
        <form action="{{ route('class.update', $class->id) }}" method="post">
            @method('PUT')
            @csrf
            <input type="text" value="{{ $class->name }}" class="form-control text-center" name="class_name">
            <div class="form-group my-3 col-2">
                <button type="submit" class="btn btn-secondary">変更</button>
            </div>
        </form>
    </h3>
    <div class="d-flex flex-row">
        @foreach($curriculum as $curriculum_week)
            <div class="justify-content-center">
                <div class="card text-center" style="width: 10rem; height: 3rem;">
                    <h4 class="my-auto">{{ $dayOfTheWeeks[$loop->index] }}</h4>
                    @php
                        $dayOfTheWeek = $loop->index
                    @endphp
                </div>
                @foreach($curriculum_week as $lesson)
                    <div class="card" style="width: 10rem; height: 13rem;">
                        <div class="card-body">
                            @if($lesson)
                                <form action="{{ route('curriculum.update', [
                                    'class_id' => $class->id,
                                    'curriculum_id' => $lesson->curriculum_id
                                    ]) }}" method="post">
                                    @method('put')
                                    @csrf
                                    <h5 class="card-title mt-2 text-center" style="height: 2rem;">
                                        授業変更
                                    </h5>
                                    <div class="card-text" style="height: 3rem;">
                                        <x-lessons-selectbox :lessons="$class_lessons" :selectedLesson="$lesson" :isUpdate="true"/>
                                    </div>
                                    <div class="form-group" style="height: 2rem;">
                                        <button type="submit" class="btn btn-secondary btn-sm">変更</button>
                                    </div>
                                </form>
                                <form action="{{ route('curriculum.destroy', [
                                    'class_id' => $class->id,
                                    'curriculum_id' => $lesson->curriculum_id
                                ]) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <div class="form-group mt-2" style="height: 2rem;">
                                        <button type="submit" class="btn btn-light btn-sm">空きコマにする</button>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('curriculum.store', $class->id) }}" method="post">
                                    @method('post')
                                    @csrf
                                        <h5 class="card-title mt-2 text-center" style="height: 2rem;">
                                        授業追加
                                    </h5>
                                    <div class="card-text" style="height: 3rem;">
                                        <x-lessons-selectbox :lessons="$class_lessons"/>
                                    </div>
                                    <input type="hidden" name="dayOfTheWeek" value="{{ $dayOfTheWeek }}">
                                    <input type="hidden" name="period" value="{{ $loop->index+1 }}">
                                    <div class="form-group" style="height: 2rem;">
                                        <button type="submit" class="btn btn-outline-secondary btn-sm">追加</button>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
        </div>
    </div>

@endsection