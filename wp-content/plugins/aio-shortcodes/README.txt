Author: LizaTom.com
Author URL: http://lizatom.com
Tags: shortcodes, wordpress, wordpress shortcodes, shortcodes plugin, javascript, google maps, jquery slider, buttons, toggle, tooltips, tabs, nivo, typography
Minimum Wordpress Version: 3.0
Tested up to: 3.1.2

======== CREDITS ========

Graphics: All the graphics were exclusively created by lizatom.com
Icons: "Free Farm Fresh Web Icons" by http://www.fatcow.com/free-icons (Free for Commercial Use).
"16x16 Free Application Icons" by http://www.small-icons.com/packs/16x16-free-application-icons.htm (Free for Commercial Use).

======== CHANGE LOG ========

Version 1.0.0 - May 15, 2011
* First release.

======== DESCRIPTION======== 

All-In-One Shortcodes plugin allows you to add hundreds of easy-to-use shortcodes to ANY wordpress theme and customize the appearance of your content in seconds. Each shortcode comes loaded with practically unlimited colors, size and icon combinations.
Now, you can:

    * Add professionally coded and neatly designed shortcodes to ANY wordpress theme.
    * Enjoy infinite combinations of shortcodes.
    * Get the shortcodes generator interface directly in your wordpress editor (TinyMICE).
    * Create your own shortcodes from the unlimited possibilities

Built-in Shortcodes:

  * Dark Icon Buttons
  * Light Icon Buttons
  * 3 Sizes of Web 2.0 colored buttons
  * Social Bookmark Sharing: Twitter, Facebook, Google, etc.
  * jQuery Powered Colored Tooltips
  * jQuery Powered Toggles - multiple transition effects
  * jQuery Powered Tabs  - multiple transition effects
  * Quotes - multiple design variations
  * Dropcaps - Unlimited possibilities with any size of color
  * Google Maps
  * Nivo Slider Gallery - any transition effect
  * Colored Boxes - unlimited icon/color combination
  * Columns
  * Video Integration for YouTube and Vimeo - control the size directly from wordpress
  * Login / password protected Box.

======== INSTALLATION ======== 

1. Upload the 'aio-shortcodes' folder to the '/wp-content/plugins/' directory
2. Activate the plugin through the 'Plugins' menu in WordPress

OR

1. WP Admin Panel > Plugins > Add New Plugin >> Upload the ZIP File you have just purchased.
2. Activate the plugin through the 'Plugins' menu in WordPress

3. Now you can make a new post, when working with visual editor, you will see the shortcodes buttons added unto your tinyMICE interface. Your post editor must be in VISUAL mode.

4. If you plan using social bookmarks or custom styles via this plugin, please fill in the appropriate input fields in the Settings->Lizatom All-In-One Shortcodes page.

5. Change CHMOD of the /aio-shortcodes/cache folder to 777 due to timthumb.php script that we need for resizing of the images for NIVO slider.

======== HOW-TO ======== 

The most easy and convenient way would be to work directly from TinyMICE interface, where you can generate buttons, galleries, toggle boxes etc within seconds, just defining the sizes, colors and everything else you need.

However, more advanced users who prefer to work with HTML, might find it more convenient to use bits of code, rather than WYSIWYG generator. Here are the codes for each shortcode (please not that the combinations are practically unlimited as you can insert shortcodes inside shortcodes, and so on):

== protected area ==

[protected]

== buttons ==

- color button

[button type="rounded" color="light-blue" size="small" url="http://yoururl.com" rel="dofollow"] Button text [/button] 

- icon button

[button_icon icon="accept" color="light" url="http://yoururl.com" rel="dofollow"] Your text [/button_icon] 

== highlighter ==

[highlighter color="light-blue" ]Your text[/highlighter] 

== toggle box ==

[togglebox state="open" head="Togglebox head" ]Content of the toggle box.[/togglebox] 

== columns ==

[one-half]content[/one-half] 
[one-third]content[/one-third] 
[one-fourth]content[/one-fourth] 
[one-half last=yes]this is is last column from the right.[/one-half]

== nivo slider ==

[nivo_slider width=500 height=300][nivo_slide]ABSOLUTE_PATH_TO_THE_IMAGE_1[/nivo_slide] [nivo_slide]ABSOLUTE_PATH_TO_THE_IMAGE_2[/nivo_slide] [nivo_slide]ABSOLUTE_PATH_TO_THE_IMAGE_3[/nivo_slide][/nivo_slider]

ABSOLUTE_PATH_TO_THE_IMAGE should be something like http://yoursite.com/path/to/the/image/image.png

== rotating tabs ==

[tabs tabid="tabID1" type="vertical" effect="fade" headings="Tab1|Tab2|Tab3"] [tab] Tab1 Content [/tab] [tab] Tab2 Content [/tab] [tab] Tab3 Content [/tab] [/tabs] 

== video embedding ==

[youtube width="500" height="300"]pRUGvArWXLk[/youtube]
[vimeo width="500" height="300"]21294655[/vimeo]

== content boxes ==

[box color="white" icon="accept"]content of the box[/box] 

== social bookmarks ==

[digg] [stumble] [buzz] [retweet] [facebook] [twitter] [feedburner] 

== dropcaps ==

[dropcap color="color-default" font="arial" style="normal" size="ltt-3em"]D[/dropcap]

== tooltips ==

[tooltip color="blue" text="This is tooltip content."] tooltip [/tooltip]

== quotes ==

[quote type="large" align="left"] quote [/quote]

== lists ==

[list style="bullet-tick"]
<li>item 1</li>
<li>item 2</li>
<li>item 3</li>
<li>item 4</li>
<li>item 5</li>
[/list] 

== google maps ==

[googlemap width="500" height="300" src="http://maps.google.com/?ie=UTF8&ll=48.109265,14.205322&spn=0.324145,0.590515&t=h&z=11"]

'src' parameter can be taken from http://maps.google.com.
1. in the right corner click "link"
2. copy field below: "Paste link in email or IM"

== google chart ==

[googlechart type="p3" data="12.5,15,20,30" width="500" height="300" labels="January+2012|February+2012|March+2012|April+2012" colors="FF0000|33CCCC|FFCC00|99CC00" color1="ffffff" color2="C0C0C0"]

== CSS styles ==

1. At the right side of the Lizatom shortcode icons you can see drop down menu "Styles". This allows you easily implement your CSS styles into the post content.

Let's say you have these classes in your styles.css file:

.mystyle1 { 
 
}

.mystyle2 { 
 
}

2. Go the the Settings->Lizatom All-In-One shortcodes page

3. Insert this into the CSS styles field:

4. My Style1=mystyle1,My Style2=mystyle2

5. Highlight some text in your post editor (in visual mode). 

6. Choose some style from "styles" dropdown. In source code (or html mode of the post editor) you can see the text was wrapped with the class you've just chosen.

Click "Save Changes".

======== SUPPORT ======== 

Although the plugin has been tested on multiple blogs prior to the final release, we will do our best to provide support if you encountered any problem or wish to report a bug. Please email us to:

tom@lizatom.com