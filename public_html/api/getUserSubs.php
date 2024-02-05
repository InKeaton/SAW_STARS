<?php
    include_once dirname(__FILE__) . '/../../utils/apiUtils.php';

    isMethod('POST');
    postEmptyField('userFK');
    
    include_once dirname(__FILE__) . '/../../model/sub/getUserSub.php';
?>