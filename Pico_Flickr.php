<?php

class Pico_Flickr {

    private 
        $custom_flickr_values = array(
            'api_key'	=> '',
            'user_id'   => ''
        ),
        $config = array(
            'format'    => 'php_serial',
            'method'	=> 'flickr.photos.search',
            'privacy_filter' => 1
        );
    
    
    // Load settings
    public function config_loaded(&$settings) 
    {
        if (isset($settings['custom_flickr_values']))
            $this->custom_flickr_values = $settings['custom_flickr_values'];
    }
    
    // Define template tag
	public function before_render(&$twig_vars, &$twig)
	{
		// Add a custom template variable
		$twig_vars['flickr_recent'] = $this->get_recent_photos();
	}

    // Get recent photos
    public function get_recent_photos()
    {
        $encoded_params = $this->get_encoded_params(array_merge($this->custom_flickr_values, $this->config));
        $rsp_obj = $this->flickr_request($encoded_params);

        $html_output = "";
        if ($rsp_obj['stat'] == 'ok')
        {    
            $html_output = $rsp_obj;
        }
        else
        {
            $html_output = "<!-- Flickr API request failed. -->";
        }
        
        return $html_output;
    }
    
    
    public function get_encoded_params($params)
    {
        $encoded_params = array();

        foreach ($params as $k => $v)
        {
            $encoded_params[] = urlencode($k).'='.urlencode($v);
        }
        return $encoded_params;
    }
    
    // Request flickr data
    public function flickr_request($encoded_params)
    {
        $url = "https://api.flickr.com/services/rest/?".implode('&', $encoded_params);
        $rsp = file_get_contents($url);
        $rsp_obj = unserialize($rsp);
        return $rsp_obj;
        /*
        return array(
            "stat" => "ok", 
            "photos" => array(
                "photo" => array(
                    0 => array(
                        'title' => 'Title 1',
                        "pathalias" => "alias",
                        "url_q" => "url",
                        "id" => 234234
                    ),
                    1 => array(
                        'title' => 'Title 2',
                        "pathalias" => "alias",
                        "url_q" => "url",
                        "id" => 234234
                    )
                )
            )
        );*/
    }
    
    
}