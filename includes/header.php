<?php if($_SESSION['login'])
{?>
<nav class="navbar navbar-expand-md navbar-light" style="background: #2E4053;">
<div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="attendee.php" style="color: #FFF;">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="event-comment.php" style="color: #FFF;">Event Comment</a>
            </li>
            <li class="dropdown">
              <a href="#" class="nav-link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #FFF">Events <span class="caret"></span></a>
              <ul class="dropdown-menu" style="background: #2E4053; text-align: center;">
                <li><a class="nav-link" href="eventconference.php" style="color: #FFF;">Conference</a></li>
                <li><a class="nav-link" href="eventtraining.php" style="color: #FFF;">Training</a></li>
              </ul>
            </li>
        </ul>
    </div>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="index.php"><img src="img/logo4.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="logout.php" style="color: #FFF;">Sign Out</a>
            </li>
        </ul>
    </div>
    </nav><?php } elseif($_SESSION['organizerlogin'])
    {?>
        <nav class="navbar navbar-expand-md navbar-light" style="background: #2E4053;">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="attendee.php" style="color: #FFF;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create-event.php" style="color: #FFF;">Create Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage-event.php" style="color: #FFF;">Manage Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="view-attendee.php" style="color: #FFF;">View Attendee</a>
                    </li>
                </ul>
            </div>
            <div class="mx-auto order-0">
                <a class="navbar-brand mx-auto" href="index.php"><img src="img/logo4.png"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php" style="color: #FFF;">Sign Out</a>
                    </li>
                </ul>
            </div>
        </nav><?php } else{?>
    <nav class="navbar navbar-expand-md navbar-light" style="background: #2E4053;">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php" style="color: #FFF;">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php#about" style="color: #FFF;">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php#team" style="color: #FFF;">Team</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="eventlist.php" style="color: #FFF;">Events</a>
            </li>
        </ul>
    </div>
    <div class="mx-auto order-0">
        <a class="navbar-brand mx-auto" href="index.php"><img src="img/logo4.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="chatbot/chatbot.html" style="color: #FFF;">Chat With Us!</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php" style="color: #FFF;">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="signup.php" style="color: #FFF;">Sign Up</a>
            </li>
        </ul>
    </div>
</nav>
<?php }?>


