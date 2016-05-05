# Pico Flickr plugin

Displays a list of recent photos from your Flickr account.


# Install

1. Create a new API key: https://www.flickr.com/services/apps/create/apply/
2. Find your Flickr User ID: http://idgettr.com/
3. Copy the plugin file/folder the plugins directory of your Pico site.
4. Open the Pico config.php and add these settings (See [Flickr API documentation](https://www.flickr.com/services/api/flickr.photos.search.html) for more options):
   <pre>$config['custom_flickr_values'] = array(
       'api_key'   => '[YOUR_API_KEY]',               // Required
       'user_id'   => '[YOUR_FLICKR_USER_ID]',        // Required
       'per_page'  => 16,                             // Optional
       'extras'    => 'path_alias,owner_name,url_q'   // Optional
   );</pre>
5. In your template-file add something like:
   <pre>{% if flickr_recent %}
   &lt;ul&gt;
       {% for photo in flickr_recent.photos.photo %}
            &lt;li&gt;
                &lt;a href="http://flickr.com/photos/{{ photo.pathalias }}/{{ photo.id }}"&gt;
                   &lt;img src="{{ photo.url_q }}" alt="{{ photo.title }}" /&gt;
                &lt;/a&gt;
            &lt;/li&gt;
       {% endfor %}
   &lt;/ul&gt;
   {% endif %}</pre>

Use <code>{{ dump(flickr_recent) }}</code> to show all returned values.

    
# Author & License

This Pico Flickr plugin was written by Filip Lundby, [filiplundby.dk](http://filiplundby.dk)

Licensed under The MIT License (MIT)
Copyright (c) 2016 Filip Lundby

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
