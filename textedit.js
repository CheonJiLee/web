Event.observe(window, "load", function() {
    $("form").observe("change", passwordchange);
});

function passwordchange() {
    var x = document.getElementById("private");
    if($F("password").length <= 0)
        x.checked = false;
    else
        x.checked = true;
}