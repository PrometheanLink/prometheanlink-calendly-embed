=== PrometheanLink Calendly Embed ===
Contributors: [PrometheanLink]
Donate link: https://prometheanlink.com/ 
Tags: calendly, scheduling, booking, embed, meetings
Requires at least: 5.0
Tested up to: 6.3
Requires PHP: 7.0
Stable tag: 1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A simple plugin that embeds a Calendly booking page on your WordPress site via a shortcode.

== Description ==

PrometheanLink Calendly Embed is a straightforward solution to integrate Calendly booking pages on your WordPress site.  

**Features**:

* Add your Calendly URL in a single settings field.
* Use the `[promethean_calendly]` shortcode to display the inline Calendly widget on any page or post.
* Customizable embed dimensions (width/height) via shortcode attributes.
* Screenshot in the plugin files at `/wp-content/plugins/prometheanlink-calendly-embed/assets/` directory.

If you just want a quick and easy way to allow visitors to book through your Calendly page without any advanced integrations or extra steps, this plugin is for you.

== Installation ==

1. **Upload** the plugin files to the `/wp-content/plugins/prometheanlink-calendly-embed` directory, or install the plugin through the WordPress plugins screen directly.
2. **Activate** the plugin through the ‘Plugins’ screen in WordPress.
3. Navigate to **Settings > Calendly Embed** to enter your Calendly URL (e.g., `https://calendly.com/username/event-type`).
4. Add the shortcode `[promethean_calendly]` to any page or post where you want your scheduling widget to appear.

== Frequently Asked Questions ==

= 1) Where do I get my Calendly link? =
Log in to your Calendly account at [calendly.com](https://calendly.com), go to your Event Type, and copy the booking link, e.g. `https://calendly.com/username/15min`.

= 2) Can I change the size of the Calendly widget? =
Yes, you can use shortcode attributes like `[promethean_calendly width="100%" height="800"]`.

= 3) Can I embed multiple Calendly event types on one site? =
You can only store one “global” Calendly URL in the plugin settings. However, you can embed different event types by manually changing the URL in the settings or using separate pages for each event type. In future iterations, you could expand the plugin for multiple URLs.

= 4) Does this plugin store any personal data of visitors? =
No personal data is stored by the plugin. The Calendly widget is loaded directly from Calendly’s servers.

== Screenshots ==

1. **Plugin Settings Page** – A simple settings field to store your Calendly URL.
2. **Calendly Embed on a Page** – The inline Calendly booking widget displayed on the front end.

== Changelog ==

= 1.0 =
* Initial release – basic embed functionality via a shortcode.

== Upgrade Notice ==

= 1.0 =
First public release.  
