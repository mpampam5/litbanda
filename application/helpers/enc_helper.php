<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function pass_enc($string)
  {

    return password_hash($string."".config_item('key'), PASSWORD_DEFAULT);
  }


function pass_dec($string,$hash)
{
  if (password_verify($string."".config_item('key'), $hash)) {
    return true;
  }else {
    return false;
  }

}
