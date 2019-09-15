<?php
  /**
   * \]
   */
  class Auth_sess
  {

    private $ci;

    function __construct()
    {
      $this->ci =& get_instance();
    }

    function sess($id)
    {

      $ip = $this->getIpAddr();
      if (@fsockopen("http://www.google.com", 80)){
        $xml = simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=".$ip);
        $country    = $xml->geoplugin_countryName;
        $city       = $xml->geoplugin_city;
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
      }
      else {
        $country    = "";
        $city       = "";
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
      }


      $save = array(  'id_auth'    => $id,
                      'ip_address' => $ip,
                      'user_agent' => $user_agent,
                      'country'    => $country,
                      'city'       => $city,
                      'date'       => date('Y-m-d h:i:s')
                    );
      $this->ci->db->insert("auth_sess",$save);
    }

    function getIpAddr()
  {
      if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
      {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
      }
      elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
      {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
      }
      else
      {
        $ip=$_SERVER['REMOTE_ADDR'];
      }
      return $ip;
  }
  }


 ?>
