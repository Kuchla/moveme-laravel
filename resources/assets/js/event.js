$("#event_search").click(function() {
    var url = $(this).data('route');
    var isFree = $("input[name='event-is-free']:checked").val();
    var isLimited = $("input[name='event-is-limited']:checked").val();
    var month = $("input[name='event-month']:checked").val();
    var activity = $("#event-activity").val();

    $('.pagination').hide();

    fetchData(isFree, isLimited, url, month, activity)
});

const fetchData = (is_free, is_limited, url, month, activity) => {
    $.ajax({
        type: "GET",
        url: url,
        data: { is_free, is_limited, month, activity }
    }).then(function(data) {
        $(".event-list").html(data);
    });
};
