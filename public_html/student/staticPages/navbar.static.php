<?php
    date_default_timezone_set("Asia/Kolkata");
    $Student = new Student();
    $student_info = $Student->getStudentBasicInfo($student_id);
    $student_first_name = $student_info['first_name'];
    $student_last_name = $student_info['last_name'];
    $student_name = $student_first_name." ".$student_last_name;

    $datetime = new DateTime($student_info['last_login']); 
    $last_login_datetime = $datetime->format('jS F, Y h:i:s A');

    $Hour = date('G');
    $msg = "Greetings";
    if ( $Hour >= 5 && $Hour < 12 ) {
        $msg = "Good Morning, " . $student_first_name;
    } else if ( $Hour >= 12 && $Hour < 18 ) {
        $msg = "Good Afternoon, " . $student_first_name;
    } else if ( $Hour >= 18 || $Hour < 11 ) {
        $msg = "Good Evening, " . $student_first_name;
    } else if ( $Hour >= 11 || $Hour < 5 ) {
        $msg = "Working Late ! " . $student_first_name;
    }

?>
<nav class="topnav navbar navbar-light">
    <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
        <i class="fe fe-menu navbar-toggler-icon"></i>
    </button>
    <form class="form-inline mr-auto searchform text-muted">
        <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
    </form>
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="dark">
                <i class="fe fe-sun fe-16"></i>
            </a>
        </li>
        <li class="nav-item my-auto">
            <a class="nav-link text-muted" href="./#" data-toggle="modal" data-target=".modal-shortcut">
                <span class="fe fe-grid fe-16"></span>
            </a>
        </li>
        <li class="nav-item my-auto nav-notif">
            <a class="nav-link text-muted" href="./#" data-toggle="modal" data-target=".modal-notif">
                <span class="fe fe-bell fe-16"></span>
                <span class="dot dot-md bg-success"></span>
            </a>
        </li>
        <li class="nav-item my-auto dropdown">
            <a class="nav-link text-muted pr-0">
                <span class="avatar avatar-md mt-2">
                    <img src="./assets/img/<?php echo $student_info['profile_path']; ?>" alt="..." class="avatar-img rounded-circle mr-1">
                </span>
                <span class="h6"><?php echo $student_name; ?></span>
            </a>
        </li>
    </ul>
</nav>