@if (count($topics))
        @foreach ($topics as $topic)
            <div class="media mb-4">
                <div class="media-left mr-3">
                    <a href="{{ route('users.show', [$topic->user_id]) }}">
                        <img class="media-object img-thumbnail" style="width: 52px; height: 52px;" src="{{ $topic->user->avatar }}" title="{{ $topic->user->name }}">
                    </a>
                </div>

                <div class="media-body">

                    <div class="media-heading">
                        <a href="{{ route('topics.show', [$topic->id]) }}" title="{{ $topic->title }}">
                            {{ $topic->title }}
                        </a>
                        <a class="float-right" href="{{ route('topics.show', [$topic->id]) }}" >
                            <span class="badge badge-pill badge-success"> {{ $topic->reply_count }} </span>
                        </a>
                    </div>

                    <div class="media-body meta mt-2">

                        <a href="#" title="{{ $topic->category->name }}">
                            <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>
                            {{ $topic->category->name }}
                        </a>

                        <span> • </span>
                        <a href="{{ route('users.show', [$topic->user_id]) }}" title="{{ $topic->user->name }}">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            {{ $topic->user->name }}
                        </a>
                        <span> • </span>
                        <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
                        <span class="timeago" title="最后活跃于">{{ $topic->updated_at->diffForHumans() }}</span>
                    </div>

                </div>
            </div>

            @if ( ! $loop->last)
                <hr>
            @endif

        @endforeach

@else
    <div class="empty-block">暂无数据 ~_~ </div>
@endif