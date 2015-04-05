# Pico Flickr plugin
---
Displays a list of recent photos from your Flickr account.


# Install
---
1. Create a new API key: https://www.flickr.com/services/apps/create/apply/
2. Find your Flickr User ID: https://www.flickr.com/services/api/explore/flickr.people.getInfo
3. Copy the plugin file/folder the plugins directory of your Pico site.
4. Open the Pico config.php and add these settings:

    $config['custom_flickr_values'] = array(
        'api_key'	=> '[YOUR_API_KEY]',               // Required
	    'user_id'   => '[YOUR_FLICKR_USER_ID]',        // Required
	    'per_page'  => 16,                             // Optional
        'extras'    => 'path_alias,owner_name,url_q'   // Optional
    );
    
See [Flickr API documentation](https://www.flickr.com/services/api/flickr.photos.search.html) for more options.

5. In your template-file add something like:

    {% if flickr_recent %}
    &lt;ul&gt;
    {% for photo in flickr_recent.photos.photo %}
        &lt;li&gt;&lt;a href="http://flickr.com/photos/{{ photo.pathalias }}/{{ photo.id }}"&gt;&lt;img src="{{ photo.url_q }}" alt="{{ photo.title }}" /&gt;&lt;/a&gt;&lt;/li&gt;
    {% endfor %}
    &lt;/ul&gt;
    {% endif %}

Use {{ dump(flickr_recent) }} to show all returned values.

    
# Author & License
---

This Pico Flickr plugin was written by Filip Lundby, [filiplundby.dk](http://filiplundby.dk)

Licensed under: http://opensource.org/licenses/MIT