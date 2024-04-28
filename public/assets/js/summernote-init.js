$(".summernote").summernote({
    placeholder: "Enter job decription/responsible here",
    tabsize: 2,
    height: 150,
    toolbar: [
        ["style", ["style"]],
        ["font", ["bold", "underline", "clear"]],
        ["color", ["color"]],
        ["para", ["ul", "ol", "paragraph"]],
        ["insert", ["link"]],
        ["view", ["fullscreen"]],
    ],
    disableResizeEditor: true,
    callbacks: {
        onPaste: function (e) {
            var bufferText = (
                (e.originalEvent || e).clipboardData || window.clipboardData
            ).getData("text/html");
            e.preventDefault();
            var div = $("<div />");
            div.append(bufferText);
            div.find("*").removeAttr("style");
            setTimeout(function () {
                document.execCommand("insertHtml", false, div.html());
            }, 10);
        },
    },
});
