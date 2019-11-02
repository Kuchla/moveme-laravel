@foreach ($model->comments as $comment)
<div class="comment-wrap">
    <div class="photo">
        <div class="avatar">
            <img class="photo avatar" src="{{ !is_null(@$comment->user->profile->image)
                    ? url('storage/'.@$comment->user->profile->image)
                    : asset('assets/images/user-default.jpg')}} " alt="user-image-default">
        </div>
    </div>
    <div class="comment-block">
        <p class="comment-text">{{ $comment->text }}</p>
        <div class="bottom-comment">
            <div class="comment-date">{{ $comment->user->name }} - {{ $comment->updated_at }}</div>
            <ul class="comment-actions">
                <li class="reply">
                    @if(Auth::id() == $comment->user_id)
                    <button id="delete-{{$comment->id}}" data-route="{{route('site.comments.destroy', $comment)}}"
                        data-event="{{$model->id}}" data-model-name="{{$modelName}}" type="submit"
                        class="btn btn-warning btn-sm delete-comment">Deletar</button>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</div>
@endforeach
