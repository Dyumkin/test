bootbox.prompt("What is the answer?", function (result) {
    function getUrlVars() {
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
            vars[key] = value;
        });
        return vars;
    }

    var id = getUrlVars()["id"];

    jQuery.ajax({
        type: "GET",
        url: "answerTheQuestion",
        data: {
            id: id,
            answer: result
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert(errorThrown);
        },
        success: function (data) {
            bootbox.alert(data);
        }
    });
});

