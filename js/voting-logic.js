$(document).ready(function () {

    //Trigger vote button event
    $(".voteBtn").click(function () {

        //Get current vote button ID and split it for getting answer ID and user ID (userID = 0 means there is no user logged in)
        var currentID = $(this).children("span").attr("id");
        var ID_splited = currentID.split('-');
        var answerID = ID_splited[1];
        var userID = ID_splited[2];

        //Anonymous function to set current vote state
        var votedStatus = function (variable) {
            if (variable.hasClass("btn-pink"))
                return 0;
            if (variable.hasClass("btn-grey"))
                return 1;
        };

        //If user is currently logged in
        if (userID != 0) {

            //Trigger ajax function to update vote state and vote count
            $.ajax({
                method: "POST",
                url: "./includes/functions/vote/update.php",
                data: {
                    isVoted: votedStatus($(this)),
                    answerID: answerID,
                    userID: userID
                },
                //If Ajax return a success
                success: function (result) {

                    //Return current vote count and display on webpage
                    $("#" + currentID).empty().text(result);

                    //Change the current button color 
                    if ($("#" + currentID).parent(".voteBtn").hasClass("btn-pink")) 
                        $("#" + currentID).parent(".voteBtn").removeClass("btn-pink").addClass("btn-grey");
                    else if ($("#" + currentID).parent(".voteBtn").hasClass("btn-grey")) 
                        $("#" + currentID).parent(".voteBtn").removeClass("btn-grey").addClass("btn-pink");
                },
                //If Ajax return an error
                error : function(){
                    $("#messageHeadline").empty().text("Cannot Vote Answer");
                    $("#messageBody").empty().text("Server side return error. Please refresh the page and try again");
                    $("#failedToModal").modal("show");
                }
            })
        } else {
            $("#messageHeadline").empty().text("Cannot Vote Answer");
            $("#messageBody").empty().text("You need an account to vote this answer");
            $("#failedToModal").modal("show");
        }
    });
});