var placeHistory;

$("#search_place").click(function() {
    var url = $(this).data("route");
    var isFree = $("input[name='visitation']:checked").val();
    var activity = $("#place_activity").val();
    var city = $("#place_city").val();
    console.log(isFree + "-" + activity + "" + city + "" + url);

    fetchData(isFree, activity, city, url);
});

$("#search_place_reset").click(function() {
    $("input[name='visitation']").removeAttr("checked");
    var url = $(this).data("route");
    fetchData(null, null, null, url);
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

$(".place-card").click(function() {
    var url = $(this).data("route");
    $("#place-container").remove();

    $.ajax({
        type: "GET",
        url: url
        // data: { is_free, activity, city }
    }).then(function(data) {
        $("#place").html(data);
    });
});

$("#back-show-place").click(function() {
    var url = $(this).data("route");
    $("#place-container").remove();

    $.ajax({
        type: "GET",
        url: url
        // data: { is_free, activity, city }
    }).then(function(data) {
        $("#place").html(data);
    });
});

