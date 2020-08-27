<?php

$Staff = new Staff();
$staff_info = $Staff->getStaffInfo($teacher_id);

date_default_timezone_set('Asia/Calcutta');
$Hour = date('G');
$greetings = "Hello";
if ($Hour >  0) $greetings = "Working Late ! ";
if ($Hour >  6) $greetings = "Good Morning";
if ($Hour > 12) $greetings = "Good Afternoon";
if ($Hour > 17) $greetings = "Good Evening";
if ($Hour > 22) $greetings = "Go to bed...!";
?>

<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <form class="form-inline mr-auto">
        <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        </ul>
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="./assets/img/final/users/<?php echo $staff_info['teacher_profile']; ?>" class="rounded-circle mr-1">
                <?php echo $greetings . ", " . $staff_info['teacher_first_name']; ?>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Last Login : <br><?php echo $staff_info['teacher_last_login']; ?></div>
                <div class="dropdown-divider"></div>
                <a href="./index.php" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>