
$("#search-user").click(function() {
    var url = $(this).data("route");
    var activity = $("#user-activity").val();

    fetchData(activity, url);
});

const fetchData = (activity, url) => {
    $.ajax({
        type: "GET",
        url: url,
        data: { activity }
    }).then(function(data) {
        $("#people-list").html(data);
    });
};

