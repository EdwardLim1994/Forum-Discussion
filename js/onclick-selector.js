$(document).ready(function () {
    $(".deleteAnswerBtn").click(function () {
        var id = $(this).children("input").val();
        $("#deleteAnswerID").val(id);
    });

    $(".deleteQuestionBtn").click(function () {
        var id = $(this).children("input").val();
        $("#deleteQuestionID").val(id);
    })
});