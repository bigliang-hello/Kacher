<div class="reply-list">
    @foreach ($replies as $index => $reply)
        <div class="media"  name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">
            <div class="avatar float-left mr-3">
                <a href="{{ route('users.show', [$reply->user_id]) }}">
                    <img class="media-object img-thumbnail" alt="{{ $reply->user->name }}" src="{{ $reply->user->avatar }}"  style="width:48px;height:48px;"/>
                </a>
            </div>

            <div class="media-body">
                <div class="media-heading mb-1">
                    <a href="{{ route('users.show', [$reply->user_id]) }}" title="{{ $reply->user->name }}">
                        {{ $reply->user->name }}
                    </a>
                    <span> •  </span>
                    <span class="meta" title="{{ $reply->created_at }}">{{ $reply->created_at->diffForHumans() }}</span>

                    @can('destroy', $reply)
                    {{-- 回复删除按钮 --}}
                    <span class="meta float-right">
                    <form action="{{ route('replies.destroy', $reply->id) }}" method="post" id="reply_list">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="button" class="btn btn-default btn-sm" style="color: #444444;"
                                onclick="formSubmit()">
                            <i class="fa fa-trash-o"></i> 删除
                        </button>
                    </form>
                    </span>
                    @endcan
                </div>
                <div class="reply-content mt-1">
                    {!! $reply->content !!}
                </div>
            </div>
        </div>
        <hr>
    @endforeach
</div>

<script>
    function formSubmit() {
        document.getElementById('reply_list').submit();
    }
</script>