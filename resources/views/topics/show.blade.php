@extends('layouts.app')

@section('title', $topic->title)
@section('description', $topic->excerpt)

@section('content')

    <div class="row">

        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info ">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        作者：{{ $topic->user->name }}
                    </div>
                    <hr>
                    <div class="media">
                        <div align="center">
                            <a href="{{ route('users.show', $topic->user->id) }}">
                                <img class="img-thumbnail" src="{{ $topic->user->avatar }}" width="300px" height="300px">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 topic-content mb-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h1 class="text-center">
                        {{ $topic->title }}
                    </h1>

                    <div class="article-meta text-center">
                        {{ $topic->created_at->diffForHumans() }}
                        ⋅
                        <span class="fa fa-comment" aria-hidden="true"></span>
                        {{ $topic->reply_count }}
                    </div>

                    <div class="topic-body mt-4">
                        {!! $topic->body !!}
                    </div>
                    @can('update', $topic)
                    <div class="operate">
                        <hr>
                        <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-default btn-sm float-left" role="button" style="color: #333333;">
                            <i class="fa fa-pencil-square-o"></i> 编辑
                        </a>

                        <form action="{{ route('topics.destroy', $topic->id) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-default btn-sm" style="margin-left: 6px; color: #444444;" >
                                <i class="fa fa-trash-o" ></i> 删除
                            </button>
                        </form>
                    </div>
                    @endcan
                </div>
            </div>

            {{-- 用户回复列表 --}}
            @if(\Illuminate\Support\Facades\Auth::check() || count($topic->replies) > 0)
            <div class="card topic-reply">
                <div class="card-body">
                    @includeWhen(\Illuminate\Support\Facades\Auth::check(), 'topics._reply_box', ['topic' => $topic])
                    @include('topics._reply_list', ['replies' => $topic->replies()->with('user','topic')->get()])
                </div>
            </div>
            @endif
        </div>
    </div>
@stop