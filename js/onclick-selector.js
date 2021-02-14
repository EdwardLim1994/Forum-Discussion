$(document).ready(function () {

    //Trigger delete answer button event to get current answer ID
    $(".deleteAnswerBtn").click(function () {
        var id = $(this).children("input").val();
        $("#deleteAnswerID").val($(this).children("input").val());
    });

    //Trigger delete question button event to get current question ID
    $(".deleteQuestionBtn").click(function () {
        var id = $(this).children("input").val();
        $("#deleteQuestionID").val(id);
    })

    //Trigger edit answer button event to get current answer ID and its content
    $(".editAnswerBtn").click(function () {
        var id = $(this).children("input").val();
        var content = $("#answerContent-" + id).text().trim();
        $("#editAnswerContent").val(content);
        $("#editAnswerID").val(id);
    });

    //Trigger edit question event to get current question ID and its title and content
    $(".editQuestionBtn").click(function () {
        var id = $(this).children("input").val();
        var title = $("#questionTitle-" + id).text().trim();
        var content = $("#questionContent-" + id).text().trim();
        $("#editQuestionTitle").val(title);
        $("#editQuestionContent").val(content);
        $("#editQuestionID").val(id);
    });
});