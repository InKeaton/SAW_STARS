<?php
    include_once dirname(__FILE__) . '/../../utils/apiUtils.php';

    isMethod('POST');
    postEmptyField('userFK', 'starFK', 'life');

    include_once dirname(__FILE__) . '/../../model/sub/insertSub.php';
?>