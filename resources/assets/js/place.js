$("#search_place").click(function() {
    var url = $(this).data("route");
    var isFree = $("input[name='visitation']:checked").val();
    var activity = $("#place_activity").val();
    var city = $("#place_city").val();
    $('.pagination').hide();

    fetchData(isFree, activity, city, url);
});

const fetchData = (is_free, activity, city, url) => {
    $.ajax({
        type: "GET",
        url: url,
        data: { is_free, activity, city }
    }).then(function(data) {
        $(".place-list").html(data);
    });
};

