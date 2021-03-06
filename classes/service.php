<?php
/**
 * @package WordPress
 * @subpackage SocialGrid
 */

global $sg_settings;

class SocialGridService {
    public $name = null;
    public $description = null;
    public $url = null;
    
    function __construct($sg_admin, $service, $username, $index) {
        $skeleton = $sg_admin->default_services[$service];
        $this->skeleton = $skeleton;

        $this->slug = $service;

        $this->name = $skeleton['name'];
        $this->description = $skeleton['text'];
        $this->username = $username;
        $this->index = $index;
        
        // construct the url
        $this->url = sprintf($skeleton['url'], $username);
    }
    
    public function set_username($new_username) {
        $this->username = $new_username;
        $this->url = sprintf($this->skeleton['url'], $new_username);
    }
}

class SocialGridRSSService {
    function __construct($sg_admin, $index) {
        $service = 'rss';
        $skeleton = $sg_admin->default_services[$service];
        
        $this->slug = $service;
        $this->name = $skeleton['name'];
        $this->description = $skeleton['text'];
        $this->url = get_bloginfo('rss2_url');
        
        $this->index = $index;
    }
}


?>