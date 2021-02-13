$(document).ready(function () {

    $(".voteBtn").click(function () {
        var currentID = $(this).children("span").attr("id");
        var ID_splited = currentID.split('-');
        var answerID = ID_splited[1];
        var userID = ID_splited[2];

        var votedStatus = function (variable) {
            if (variable.hasClass("btn-pink"))
                return 0;
            if (variable.hasClass("btn-grey"))
                return 1;
        };

        if (userID != 0) {
            $.ajax({
                method: "POST",
                url: "./includes/functions/vote/update.php",
                data: {
                    isVoted: votedStatus($(this)),
                    answerID: answerID,
                    userID: userID
                },
                success: function (result) {

                    $("#" + currentID).empty().text(result);
                    if ($("#" + currentID).parent(".voteBtn").hasClass("btn-pink")) {
                        $("#" + currentID).parent(".voteBtn").removeClass("btn-pink").addClass("btn-grey");
                    } else if ($("#" + currentID).parent(".voteBtn").hasClass("btn-grey")) {
                        $("#" + currentID).parent(".voteBtn").removeClass("btn-grey").addClass("btn-pink");
                    }
                }
            })
        } else {
            $("#messageHeadline").empty().text("Cannot Vote Answer");
            $("#messageBody").empty().text("You need an account to vote this answer");
            $("#failedToModal").modal("show");
        }
    });

});