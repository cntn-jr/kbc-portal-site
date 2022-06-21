@extends('layouts.teacher_class')

@section('class_content')
    <div class="list-group my-3">
        <div class="col-3 text-center text-muted list-group-item">
            お知らせ
        </div>
        @foreach($announcements as $announcement)
            <a href="{{ route('announcement.edit', ['class_id' => $class->id, 'announcement_id' => $announcement->id]) }}" class="list-group-item list-group-item-action">
                <h6>{{ $announcement->title }}</h6>
                <div class="text-truncate px-3">{{ $announcement->content }}</div>
            </a>
        @endforeach
    </div>
    <div class="d-flex flex-row">
        @foreach($curriculum as $curriculum_week)
            <div class="justify-content-center">
                <div class="card text-center" style="width: 10rem; height: 3rem;">
                    <h4 class="my-auto">{{ $dayOfTheWeeks[$loop->index] }}</h4>
                </div>
                @foreach($curriculum_week as $lesson)
                    <div class="card" style="width: 10rem; height: 10rem;">
                        <div class="card-body">
                            @if($lesson)
                                <h5 class="card-title mt-2 text-center" style="height: 4rem;">
                                    {{ $lesson->lesson_name }}
                                </h5>
                                <div class="card-text text-center" style="height: 3rem;">{{ $lesson->teacher_name }}</div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection