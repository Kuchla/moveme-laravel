$(document).on('click', '.create-comment', function () {
    var url = $(this).data('route-create');

    var eventId = $(this).data('event')

    dataComment = {
        text: $('#comment-text-'+eventId).val(),
        model_name: $('.comment-model-name').val(),
        model_id: $('#comment-model-'+eventId).val(),
    }
    createComment(url, dataComment, eventId);
});

$(document).on('click', '.delete-comment', function () {
    var url = $(this).data('route');
    var eventId = $(this).data('event');
    var modelName = $(this).data('model-name');
    deleteComment(url, eventId, modelName);
});

const deleteComment = (url, eventId, modelName) => {
    $.ajax({
        type: "POST",
        method: 'DELETE',
        url: url,
        data: { modelName },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    }).then(function(data) {

        $('#'+modelName+'-'+eventId).html(data);
    });
};

const createComment = (url, dataComment, eventId) => {
    $.ajax({
        type: "POST",
        url: url,
        data: { dataComment },
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    }).then(function(data) {
        $('#'+dataComment['model_name']+'-'+eventId).html(data);
    });
};
