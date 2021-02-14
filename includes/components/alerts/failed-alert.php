<?php

    //To set failed alert message headline and body
    //If there is get request with failed parameter
    if (isset($_GET['failed'])) {
        switch ($_GET['failed']) {

            //If it is "Failed to login after successful account registration"
            case ("autologinfailed"):
                $headline = "Auto Login Failed";
                $body = "Your account has been successfully registered, but some technical issues occur. Please login again manually";
                break;

            //If it is "CFailed to Register User"
            case ("failedtoregisteruser"):
                $headline = "Register Account Failed";
                $body = "Your account is not successfully registered due to technical issue.";
                break;

            //If it is "Cannot receive post request"
            case ("cannotreceivepostdata"):
                $headline = "Failed to Pass Information";
                $body = "Your registration information cannot pass to backend due to technical issue.";
                break;

            //If it is "Login Password Not Match"
            case ("passwordnotmatch"):
                $headline = "Password Not Match";
                $body = "Your login password is not matched with your account. Please try again";
                break;
            
            //If it is "failed to Post Question"
            case ("failedtopostquestion"):
                $headline = "Failed to Post Question";
                $body = "Your question cannot be posted due to technical issue. Please try again";
                break;

            //If it is "Failed to Delete Question"
            case ("failedtodeletequestion"):
                $headline = "Failed to Delete Question";
                $body = "Your question cannot be deleted due to technical issue. Please try again ";
                break;

            //If it is "Failed to Edit Question"
            case ("failedtoeditquestion"):
                $headline = "Failed to Edit Question";
                $body = "Your question cannot be edited due to technical issue. Please try again ";
                break;

            //If it is "Failed to Post Answer"
            case ("failedtopostanswer"):
                $headline = "Failed to Post Answer";
                $body = "Your answer cannot be posted due to technical issue. Please try again";
                break;

            //If it is "Failed to Delete Answer"
            case ("failedtodeleteanswer"):
                $headline = "Failed to Delete Answer";
                $body = "Your answer cannot be deleted due to technical issue. Please try again ";
                break;

            //If it is "Failed to Edit Answer"
            case ("failedtoeditanswer"):
                $headline = "Failed to Edit Answer";
                $body = "Your answer cannot be edited due to technical issue. Please try again ";
                break;
        }
    }
?>
<div class="modal fade" id="failedToModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-notify modal-danger" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="heading lead" id="messageHeadline"><?= $headline ?></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <p id="messageBody"><?= $body ?></p>
                </div>
            </div>
            <div class="modal-footer justify-content-center">
                <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">OK</a>
            </div>
        </div>
    </div>
</div>

<!-- Render this javascript ONLY IF there is get request with failed parameter -->
<?php if (isset($_GET['failed'])) :  ?>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#failedToModal').modal('show');
    })
    </script>
<?php endif; ?>