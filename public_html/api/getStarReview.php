<?php

    include_once dirname(__FILE__) . '/../../utils/apiUtils.php';

    isMethod('POST');
    postEmptyField('starFK');
    
    include_once dirname(__FILE__) . '/../../model/review/getStarReview.php';
?>