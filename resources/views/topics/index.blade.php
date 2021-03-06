@extends('layouts.app')

@section('title', isset($category) ? $category->name : '帖子列表')

@section('content')

    <div class="row">
        <div class="col-lg-9 col-md-9 topic-list">
            @if (isset($category))
                <div class="alert alert-info" role="alert">
                    {{ $category->name }} ：{{ $category->description }}
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-body">
                    <ul class="nav nav-tabs mb-4">
                        <li role="presentation" class="nav-item"><a class="nav-link {{ active_class( ! if_query('order', 'recent') ) }}" href="{{ Request::url() }}?order=default">最后回复</a></li>
                        <li role="presentation" class="nav-item"><a class="nav-link {{ active_class(if_query('order', 'recent')) }}" href="{{ Request::url() }}?order=recent">最新发布</a></li>
                    </ul>
                    {{-- 话题列表 --}}
                    @include('topics._topic_list', ['topics' => $topics])
                    {{-- 分页 --}}
                    {!! $topics->appends(Request::except('page'))->render() !!}
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 sidebar">
            @include('topics._sidebar')
        </div>
    </div>

@endsection