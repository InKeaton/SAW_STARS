<?php
    include_once dirname(__FILE__) . '/../../utils/apiUtils.php';

    isMethod('POST');
    postEmptyField('userFK', 'starFK');

    include_once dirname(__FILE__) . '/../../model/sub/deleteCoupleSub.php';
?>