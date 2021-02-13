$(document).ready(function () {
    $(".deleteAnswerBtn").click(function () {
        var id = $(this).children("input").val();
        $("#deleteAnswerID").val(id);
    });

    $(".deleteQuestionBtn").click(function () {
        var id = $(this).children("input").val();
        $("#deleteQuestionID").val(id);
    });

    $(".editAnswerBtn").click(function () {
        var id = $(this).children("input").val();
        var content = $("#answerContent-" + id).text().trim();
        console.log(content);
        $("#editAnswerContent").val(content);
        $("#editAnswerID").val(id);
    });

    $(".editQuestionBtn").click(function () {
        var id = $(this).children("input").val();
        var title = $("#questionTitle-" + id).text().trim();
        var content = $("#questionContent-" + id).text().trim();
        console.log(content);
        $("#editQuestionTitle").val(title);
        $("#editQuestionContent").val(content);
        $("#editQuestionID").val(id);
    });
});