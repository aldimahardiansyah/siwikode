<?php
require_once 'head.php';
require_once 'nav.php';

if(isset($content)){
    $this->load->view($content);
}

require_once 'footer.php';