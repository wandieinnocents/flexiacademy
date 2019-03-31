<?php
    function get_rating($rating, $total = '') {
        $_0_5 = ($rating >= 0.5 ? 'voted' : '') . ($rating >= 1.0 || $rating == 0.0 ? ' d-none' : '');
        $_1_0 = ($rating >= 1.0 ? 'voted' : '');
        $_1_5 = ($rating >= 1.5 ? 'voted' : '') . ($rating >= 2.0 || $rating <= 1.0 ? ' d-none' : '');
        $_2_0 = ($rating >= 2.0 ? 'voted' : '');
        $_2_5 = ($rating >= 2.5 ? 'voted' : '') . ($rating >= 3.0 || $rating <= 2.0 ? ' d-none' : '');
        $_3_0 = ($rating >= 3.0 ? 'voted' : '');
        $_3_5 = ($rating >= 3.5 ? 'voted' : '') . ($rating >= 4.0 || $rating <= 3.0 ? ' d-none' : '');
        $_4_0 = ($rating >= 4.0 ? 'voted' : '');
        $_4_5 = ($rating >= 4.5 ? 'voted' : '') . ($rating >= 5.0 || $rating <= 4.0 ? ' d-none' : '');
        $_5_0 = ($rating >= 5.0 ? 'voted' : '');

        $show = $total == '' ? 'd-none' : '';

        echo <<<EOT
         <span class='rating'>
            <i class='fa fa-star-half $_0_5'></i>
            <i class='fa fa-star $_1_0'></i>
            <i class='fa fa-star-half $_1_5'></i>
            <i class='fa fa-star $_2_0'></i>
            <i class='fa fa-star-half $_2_5'></i>
            <i class='fa fa-star $_3_0'></i>
            <i class='fa fa-star-half $_3_5'></i>
            <i class='fa fa-star $_4_0'></i>
            <i class='fa fa-star-half $_4_5'></i>
            <i class='fa fa-star $_5_0'></i>
            <small class='$show'>($total)</small>
         </span>
EOT;
    }