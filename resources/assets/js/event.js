$("#event_search").click(function() {
    var url = $(this).data('route');
    var isFree = $("input[name='event-is-free']:checked").val();
    var isLimited = $("input[name='event-is-limited']:checked").val();
    // console.log(isFree + isLimited);

    fetchData(isFree, isLimited, url)
});

$("#event_search_reset").click(function() {
    var url = $(this).data('route');
    fetchData(null, null, url)
});

const fetchData = (is_free, is_limited, url) => {
    $.ajax({
        type: "GET",
        url: url,
        data: { is_free, is_limited }
    }).then(function(data) {

        $(".event-list").html(data);
    });
};
