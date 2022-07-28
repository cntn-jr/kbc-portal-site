@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h5 class="text-center mt-4 mb-2">{{ $semester_name }}</h5>
        <div class="col-md-10 d-flex flex-row bg-white my-3">
            <div class="col-2 text-center my-3">
                <a class="text-secondary" href="{{ route('class.show_at_teacher', $class->id) }}">
                    クラス画面
                </a>
            </div>
            <span class="border border-right border-light"></span>
            <div class="col-2 text-center my-3">
                <a class="text-secondary" href="{{ route('announcement.show_at_teacher', $class->id) }}">お知らせ一覧</a>
            </div>
            <span class="border border-right border-light"></span>
            <div class="col-2 text-center my-3">
                <a class="text-secondary" href="{{ route('class.edit', $class->id) }}">クラスの編集</a>
            </div>
            <span class="border border-right border-light"></span>
            <div class="col-2 text-center my-3">
                <a class="text-secondary" href="{{ route('class.show_lessons', $class->id) }}">授業一覧</a>
            </div>
            <span class="border border-right border-light"></span>
            <div class="col-2 text-center my-3">
                <a class="text-secondary" href="{{ route('class.show_students', $class->id) }}">生徒管理</a>
            </div>
            <span class="border border-right border-light"></span>
            <div class="col-2 text-center my-3">
                <a class="text-secondary" href="{{ route('class.select', $class->semester_id) }}">
                    クラス一覧
                </a>
            </div>
        </div>
        <div class="col-md-11">
            <div class="container">
                <h3 class="text-center mb-5">
                    <form action="{{ route('class.update', $class->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-group my-3 col-8 mx-auto">
                            <input type="text" value="{{ $class->name }}" class="form-control text-center" name="class_name">
                        </div>
                        <div class="form-group my-3 col-2 mx-auto">
                            <button type="submit" class="btn btn-secondary">クラス名の変更</button>
                        </div>
                    </form>
                </h3>
                <div class="row justify-content-center">
                    <div class="d-flex flex-row justify-content-center mx-auto col-10">
                        @foreach($curriculum as $curriculum_week)
                        <div class="justify-content-center">
                            <div class="card text-center" style="width: 13rem; height: 3rem;">
                                <h4 class="my-auto">{{ $dayOfTheWeeks[$loop->index] }}</h4>
                                @php
                                $dayOfTheWeek = $loop->index
                                @endphp
                            </div>
                            @foreach($curriculum_week as $lesson)
                            <div class="card" style="width: 13rem; height: 13rem;">
                                <div class="card-body">
                                    @if($lesson)
                                    <form action="{{ route('curriculum.update', [
                                        'class_id' => $class->id,
                                        'curriculum_id' => $lesson->curriculum_id
                                        ]) }}" method="post">
                                        @method('put')
                                        @csrf
                                        <input type="hidden" name="redirectFrom" value="edit_class">
                                        <h5 class="card-title mt-2 text-center" style="height: 2rem;">
                                            授業変更
                                        </h5>
                                        <div class="card-text" style="height: 3rem;">
                                            <lesson-selectbox :lessons="{{ json_encode($class_lessons) }}" :selected_lesson="{{ json_encode($lesson) }}" ></lessons-selectbox>
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
                                        <input type="hidden" name="redirectFrom" value="edit_class">
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
                                            <x-lessons-selectbox :lessons="$class_lessons" />
                                        </div>
                                        <input type="hidden" name="dayOfTheWeek" value="{{ $dayOfTheWeek }}">
                                        <input type="hidden" name="period" value="{{ $loop->index+1 }}">
                                        <input type="hidden" name="redirectFrom" value="edit_class">
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
            </div>
        </div>
    </div>
</div>
@endsection