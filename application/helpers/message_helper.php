<?php
// Menseting flash message (redirect).
function flashMessage($type, $message)
{
    $CI =& get_instance();
    $CI->load->library('session');
    $CI->session->set_flashdata($type, $message);
}

// Menampilkan flash message (redirect).
function showFlashMessage()
{
    $CI =& get_instance();
    $CI->load->library('session');

    $success = $CI->session->flashdata('success');
    $warning = $CI->session->flashdata('warning');
    $error   = $CI->session->flashdata('error');

    if ($success) {
        $alertStatus = 'alert-success';
        $message = $success;
    }

    if ($warning) {
        $alertStatus = 'alert-warning';
        $message = $warning;
    }

    if ($error) {
        $alertStatus = 'alert-danger';
        $message = $error;
    }

    $str = '';
    if ($success || $warning || $error) {
        $str  = '<div class="alert ' . $alertStatus . ' alert-dismissible" role="alert">';
        $str .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        $str .= $message;
        $str .= '</div>';
    }

    return $str;
}

// Menseting message.
function message($type, $message)
{
    $CI =& get_instance();
    $CI->load->vars($type, $message);
}

// Menampilkan message.
function showMessage()
{
    $CI =& get_instance();

    $success = $CI->load->get_var('success');
    $warning = $CI->load->get_var('warning');
    $error   = $CI->load->get_var('error');

    if ($success) {
        $alertStatus = 'alert-success';
        $message = $success;
    }

    if ($warning) {
        $alertStatus = 'alert-warning';
        $message = $warning;
    }

    if ($error) {
        $alertStatus = 'alert-danger';
        $message = $error;
    }

    $str = '';
    if ($success || $warning || $error) {
        $str  = '<div class="alert ' . $alertStatus . ' alert-dismissible" role="alert">';
        $str .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
        $str .= $message;
        $str .= '</div>';
    }

    return $str;
}
