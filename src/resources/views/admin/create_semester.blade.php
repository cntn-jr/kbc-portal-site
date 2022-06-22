@extends('layouts.admin_base')

@section('admin_content')

    <form action="{{ route('semester.store') }}" class="container" method="POST">
        <h3 class="mt-4 mb-2 text-center">学期作成</h3>
        <div class="form-group my-3 col-8 mx-auto">
            <select id="year" class="form-control" name="year">
                @foreach($years as $year)
                    <option value="{{ $year }}" @if($now_year == $year) selected @endif>{{ $year }}年度</option>
                @endforeach
            </select>
            @error('year')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group my-3 col-8 mx-auto">
            <div class="form-check form-check-inline">
                <input type="radio" name="isEarlyPeriod" id="earlyPeriod" class="form-check-input" value="1" checked>
                <label for="earlyPeriod" class="form-check-label">前期</label>
            </div>
            <div class="form-check form-check-inline">
                <input type="radio" name="isEarlyPeriod" id="latterPeriod" class="form-check-input" value="0">
                <label for="latterPeriod" class="form-check-label">後期</label>
            </div>
            @error('isEarlyPeriod')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group my-3 col-8 mx-auto">
            <button type="submit" class="btn btn-secondary">作成</button>
        </div>
        @csrf
    </form>
@endsection
