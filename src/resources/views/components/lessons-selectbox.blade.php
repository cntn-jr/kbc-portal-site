<div>
    <select name="" id="" class="form-control form-control-sm">
        @if($lessons)
            @foreach($lessons as $lesson)
                <option value="{{ $lesson->lesson_id }}" @if($selectedLesson) @if($lesson->lesson_id == $selectedLesson->lesson_id) selected @endif @endif>{{ $lesson->lesson_name }}</option>
            @endforeach
        @endif
    </select>
</div>