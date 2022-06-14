@extends('layouts.teacher_class')

@section('class_content')
    <h5 class="text-center">お知らせ一覧</h5>
    <a class="btn btn-outline-secondary mb-3" href="{{ route('announcement.create', $class->id) }}" role="button">新規作成</a>
    <div class="list-group">
        @foreach($announcements as $announcement)
            <div class="row col">
                <div class="col-10">
                    <a href="{{ route('announcement.edit', ['class_id' => $class->id, 'announcement_id' => $announcement->id]) }}" class="list-group-item list-group-item-action">
                        <h5>{{ $announcement->title }}</h5>
                        <p class="text-truncate px-3">{{ $announcement->content }}</p>
                    </a>
                </div>
                <div class="col-2 my-auto">
                    <form action="{{ route('announcement.destroy', ['class_id' => $class->id, 'announcement_id' => $announcement->id]) }}" method="POST">
                        <button class="btn btn-outline-danger">削除</button>
                        @method('delete')
                        @csrf
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
