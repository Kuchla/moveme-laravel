@if (Auth::user())
<div class="comments">
    <div class="comment-wrap">
        <div class="photo">
            <div class="avatar">
                <img class="image-reduce" src="{{ !is_null(@Auth::user()->profile->image)
                        ? url('storage/'.Auth::user()->profile->image)
                        : asset('assets/images/user-default.png')}} " alt="user-image-default">
            </div>
        </div>
        <div class="comment-block-create">
            <textarea placeholder="Digite aqui..." name="comment[text]" id="comment-text-{{$model->id}}"
                class="comment-text" rows="2"></textarea>
            <input type="hidden" id="comment-model-{{ $model->id }}" class="comment-model-id" name="comment[event]"
                value="{{$model->id}}">
            <input type="hidden" class="comment-model-name" value="{{$modelName}}">
            <div class="bottom-comment">
                <ul class="comment-actions">
                    <li class="reply">
                        <button data-route-create="{{ route('site.comments.store') }}" data-event="{{$model->id}}"
                            data-model-name="{{$modelName}}" type="submit"
                            class="btn btn-success btn-sm create-comment">Enviar</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@else
Para fazer comentarios é preciso criar uma conta!
<hr>
@endif
@include('site.comment._comment_list')
