<?php
function renderTemplate($tmpl, $__vars=array()) {
    extract($__vars, EXTR_SKIP);
    include(dirname(__DIR__).$tmpl);
}
?>