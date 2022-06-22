@extends('layouts.student_class')

@section('class_content')
    <h5 class="text-center">お知らせ一覧</h5>
    <div class="list-group">
        @foreach($announcements as $announcement)
            <a href="{{ route('announcement.show_detail', ['class_id' => $class->id, 'announcement_id' => $announcement->id]) }}" class="list-group-item list-group-item-action">
                <h5>{{ $announcement->title }}</h5>
                <p class="text-truncate px-3">{{ $announcement->content }}</p>
            </a>
        @endforeach
    </div>
@endsection
