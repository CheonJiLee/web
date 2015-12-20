Event.observe(window, "load", function () {
    $("form").observe("submit", submit);
});

function submit() {
    $("title").disabled = false;
}