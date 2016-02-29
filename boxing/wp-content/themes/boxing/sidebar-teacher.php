<?php
    if ($lang == 'ja') {
        $btn = 'もっと';
    } else if ($lang == 'vi') {
        $btn = 'Thêm';
    } else {
        $btn = 'More';
    }
    $teachers = get_field('teacher', 170);
    foreach ($teachers as $teacher) {
        echo '
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 teacher" align="center">
        <div class="staffInfo">
        <div class="bdMask"><div class="mask">
        <img src="' . $teacher['image']['url'] . '" class="img-responsive">
        </div></div>
        <div class="caption" align="center">
        <h5 class="color-red">' . $teacher['name'][0]['name_' . $lang] . '</h5>
        <p class="excerpt">' . $teacher['comment'][0]['comment_' . $lang] . '</p>
        </div>';
        // <a href="" class="btn btn-primary">More</a>
        echo '
        </div>
        </div>
        ';
    }
?>