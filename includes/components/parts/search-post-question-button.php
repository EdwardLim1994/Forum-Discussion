<div class="white">
    <div class="container py-2">
        <div class="row py-2">
            <div class="col-8 my-auto">
                <h4>Question List</h4>
            </div>
            <div class="col-4 text-right">
                <button class="btn btn-primary p-2 px-lg-5 px-md-4" data-toggle="modal" data-target="<?php if ($hasLogin) :
                                                                                                            echo "#postQuestionModal";
                                                                                                        else :
                                                                                                            $headline = "Cannot Post Question";
                                                                                                            $body = "You need an account to post a question.";
                                                                                                            echo "#failedToModal";
                                                                                                        endif; ?>">
                    <span class="textBreak">Post a Question</span>
                    <span class="iconBreak"><i class="fas fa-sign-in-alt"></i></span>
                </button>
            </div>
        </div>
        <div class="row py-2">
            <div class="col-12">
                <form action="./list.php?page=1" method="GET">
                    <div class="md-form input-group mb-3">
                        <input type="text" class="form-control" name="searchKeyword" placeholder="Search"
                            aria-label="Search" aria-describedby="searchQuestion">
                        <div class="input-group-append">
                            <button class="btn btn-md btn-primary m-0 px-lg-5 px-md-3" type="submit">
                                <span class="textBreak">Search</span>
                                <span class="iconBreak"><i class="fas fa-search"></i></span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>