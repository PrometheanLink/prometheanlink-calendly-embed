# PrometheanLink Calendly Embed – Setup Guide

## 1. Introduction
PrometheanLink Calendly Embed is a lightweight WordPress plugin for adding a Calendly booking widget to your site. Visitors can schedule events directly without leaving your pages.

## 2. Requirements
- WordPress 5.0 or higher
- PHP 7.0 or higher
- A [Calendly](https://calendly.com) account (free or paid)

## 3. Installation Steps

### A) Automatic Installation (WordPress Admin Upload)
1. Download the latest zip of the plugin from our official source (e.g., GitHub or your website).
2. In your WordPress admin, go to **Plugins > Add New > Upload Plugin**.
3. Select the plugin zip file.
4. Click **Install Now**, then **Activate**.

### B) Manual Installation (FTP or File Manager)
1. Download the plugin zip from our official source.
2. Unzip it locally.
3. Upload the entire `prometheanlink-calendly-embed` folder to `wp-content/plugins/`.
4. Log into your WordPress admin, go to **Plugins**, and click **Activate** under “PrometheanLink Calendly Embed”.

## 4. Configuration
1. In your WordPress admin, go to **Settings > Calendly Embed**.
2. Paste your Calendly event URL (e.g., `https://calendly.com/username/15min`) into the field provided.
3. Click **Save Changes**.

## 5. Usage
1. Edit or create the page/post where you want the Calendly widget displayed.
2. Insert the following shortcode anywhere in the content: [promethean_calendly]
3. Update/publish the page. When viewed on the front end, the Calendly booking widget will appear.

### Shortcode Attributes
- **width** (default `100%`)  
Adjusts the width of the Calendly embed.  
Example: `[promethean_calendly width="600px"]`
- **height** (default `650`)  
Adjusts the height of the Calendly embed in pixels.  
Example: `[promethean_calendly height="800"]`

Putting it all together: [promethean_calendly width="100%" height="800"]

## 6. Frequently Asked Questions

1. **Where do I find my Calendly link?**  
   Log in to [Calendly.com](https://calendly.com) and navigate to the “Event Types” page. Click on your event type to copy its share link, e.g., `https://calendly.com/username/15min`.

2. **How do I display multiple event types on the same site?**  
   Currently, only one global URL is stored in plugin settings. You can change the URL any time to embed a different event. Future updates may support multiple URLs.

3. **Why isn’t my widget showing?**  
   - Verify you’ve correctly pasted your Calendly URL in **Settings > Calendly Embed**.  
   - Ensure you’ve placed `[promethean_calendly]` in the content and that your page is published.  
   - Make sure you don’t have any script blockers or caching plugins that prevent Calendly from loading.

4. **Will Calendly store any personal data on my website?**  
   No. The widget is loaded from Calendly’s servers. The plugin itself does not store any data about invitees or visitors.

5. **Can I customize the look of the Calendly widget?**  
   Yes, you can apply custom CSS to the `.calendly-inline-widget` container or place it in a container with your own classes. Additional embed customization is documented on [Calendly’s help site](https://help.calendly.com/hc/en-us/articles/360020187734-Embedding-Calendly-on-your-website).

## 7. Support & Feedback
- For general plugin issues, open a ticket on [our GitHub repo issues](https://github.com/yourusername/prometheanlink-calendly-embed/issues) or contact our support at [Your Support Email].
- For Calendly account or scheduling issues, see [Calendly’s Support](https://help.calendly.com/).

**Thank you for using PrometheanLink Calendly Embed!**
