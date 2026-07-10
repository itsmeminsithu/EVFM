# Easy Visa For Myanmar

## Developer Info

- **Developer:** Min SiThu
- **Website:** https://minsithu.org
- **GitHub:** https://github.com/itsmeminsithu/
 WordPress Theme

## Install
1. In WordPress Admin, go to Appearance > Themes > Add New > Upload Theme.
2. Upload `easy-visa-myanmar.zip`.
3. Activate it.
4. Go to Appearance > Customize > Easy Visa Home Settings.
5. Create a homepage by setting WordPress Settings > Reading > Your homepage displays > A static page, then choose your Home page.

## Recommended plugins
- Yoast SEO, Rank Math, AIOSEO, or SEOPress. The theme auto meta tags turn off when one of these is active.
- Contact Form 7, WPForms, or Fluent Forms for production inquiry forms.
- Polylang or TranslatePress if you want English / Myanmar language switching.

## Booking links
In Customizer, set:
- Flight Search Action URL
- Hotel Search Action URL

If empty, forms stay as visual/demo forms.


## Search engine indexing
The theme now adds:
- robots index/follow meta when the site is public and no SEO plugin is active
- canonical and Open Graph meta
- TravelAgency and WebSite JSON-LD schema
- Sitemap line in robots.txt pointing to `/wp-sitemap.xml`
- Google, Bing and Yandex verification meta fields in the Customizer

Important: no theme can force Google/Bing/Yandex to index instantly. After you publish the website on a real domain:
1. WordPress Admin > Settings > Reading > uncheck "Discourage search engines from indexing this site".
2. Open `https://yourdomain.com/wp-sitemap.xml` to confirm the sitemap works.
3. Verify your domain in Google Search Console and Bing Webmaster Tools.
4. Submit `https://yourdomain.com/wp-sitemap.xml`.
5. Use URL Inspection / Submit URLs for important pages.

## Easy Pass Services
The booking card includes service tabs for Flight Ticket, Hotel Rent, Easy Pass, Easy Extension, Letter Service and TM30 Service.

The Easy Pass tab includes:
- Name
- Nationality
- Arrive Airport: DMK, BKK, CNX
- From
- Visa Type
- Continue on Facebook button

The button redirects to:
https://www.facebook.com/easyvisaformyanmar

You can edit this URL in:
Appearance > Customize > Easy Visa Home Settings > Easy Pass Facebook Redirect URL


## Social media icon tags
The footer now includes social icon tags for:
- Facebook: https://www.facebook.com/easyvisaformyanmar
- Instagram: https://www.instagram.com/easyvisaformyanmar
- LINE: https://line.me/ti/p/s1yC8g82I3

You can edit them in:
Appearance > Customize > Easy Visa Home Settings

These links are also used in the TravelAgency schema `sameAs` data for SEO.


## V4 updates
- Removed gradient-heavy styling and switched to a cleaner blue / white / black palette.
- Header menu links for Flights, Hotels and Easy Pass now open the correct booking tab.
- Hotel form now falls back to the Contact page if no hotel action URL is set.
- Easy Pass Facebook redirect remains active.


## v5 / 1.0.2
- Services are separated into cleaner individual cards.
- Booking tabs stack better on tablet/mobile.
- Forms and buttons are more responsive.


## v6 / 1.0.3 business features
- Flight, Hotel and Easy Pass forms now save requests inside WordPress Admin > Inquiries.
- Each submission emails the WordPress admin email address.
- Flight requests redirect to Facebook by default.
- Hotel requests redirect to LINE by default.
- Easy Pass requests redirect to Facebook by default.
- Floating contact buttons added for Facebook, Instagram and LINE.
- Homepage now includes How It Works, Why Choose Us and FAQ sections.
- Starter SEO pages are created when the theme is activated:
  - /myanmar-visa-service/
  - /thailand-easy-pass-service/
  - /flight-ticket-booking/
  - /hotel-rent/
  - /myanmar-travel-guide/
  - /contact/

You can edit redirect links in:
Appearance > Customize > Easy Visa Home Settings


## v7 / 1.0.4
Easy Pass Visa Type dropdown now includes:
- ED Visa
- DTV Visa
- Non-LA Visa
- Visa on Arrival
- TR Visa
- Tourist Visa
- Business Visa
- Non-B Visa
- Non-O Visa
- Non-Immigrant Visa
- Transit Visa
- Other Visa


## v8 / 1.0.5
- Fixed Visa Type dropdown: TR Visa and Tourist Visa are the same, so the duplicate Tourist Visa option was removed.
- The Easy Pass dropdown now uses: TR Visa (Tourist).
- Added full responsive refinements for:
  - desktop
  - laptop
  - tablet
  - mobile
  - small mobile phones
- Improved responsive behavior for:
  - header menu
  - booking tabs
  - Flight / Hotel / Easy Pass forms
  - service cards
  - blog cards
  - FAQ
  - footer
  - floating contact buttons


## v9 / 1.0.6
- Added TikTok: https://www.tiktok.com/@easyvisaformyanmar
- Replaced unwanted decorative emoji with professional sketch-style line icons.
- Icons use blue and white styling to keep the site modern and attractive.
- Social links now include Facebook, Instagram, LINE and TikTok.


## v10 / 1.0.7
- Social contact buttons no longer always show on the page.
- Visitors now see one minimized Contact button.
- Clicking Contact opens Facebook, Instagram, LINE and TikTok.
- Flight Ticket, Hotel Rent and Easy Pass Services tabs are fixed inside one clean booking area.
- Better mobile behavior for the booking tabs and floating contact button.


## v11 / 1.0.8
- Fixed the logo image so it no longer shows with too much empty space.
- Increased header logo size.
- Increased hero logo size.
- Improved logo responsiveness for desktop, tablet and mobile.


## v12 / 1.0.9
- Rewrote the "Why Choose Us" section so it speaks to travelers, not technical users.
- Updated FAQ text so it sounds more useful for travelers.
- Replaced "Does the website support Myanmar language?" with a better traveler-style FAQ about first-time travelers and simple support.


## v13 / 1.1.0 security + speed + responsive update
Added:
- Honeypot spam protection on inquiry forms.
- Simple rate limit: 6 submissions per 10 minutes per visitor.
- Safe redirect allowlist for Facebook, Instagram, LINE, TikTok and your own site.
- Security headers:
  - X-Content-Type-Options
  - X-Frame-Options
  - Referrer-Policy
  - Permissions-Policy
  - HSTS when HTTPS is active
- Disabled WordPress theme/plugin file editor.
- 90-day automatic cleanup for old inquiries.
- Privacy Policy starter page.
- Terms and Conditions starter page.
- Data safety notice under booking forms.
- Traveler Trust section.
- Documents Checklist section.
- Supported Airports section.
- Logo preload and performance-friendly responsive polish.

Important security note:
Do not collect passport photos, ID cards, bank details or sensitive documents through normal website forms.
Use the website only for basic request details, then continue sensitive discussion through verified channels.


## v14 / 1.1.1
Flight Ticket tab now includes:
- Round Trip
- One Way

When One Way is selected:
- Return date field hides automatically.
- Return date value is cleared.
- Trip Type is saved inside WordPress Admin > Inquiries.


## v15 / 1.1.2
The hero right-side card now shows a responsive image slider with:
- beautiful travel landscapes
- short travel-style quotes
- autoplay
- previous / next buttons
- slide dots

This replaces the static image area and gives the homepage a more attractive travel-agency feel.


## v16 / 1.1.3 CMS popup + support email
Added a backend-controlled popup system.

How to create a popup:
1. Go to WordPress Admin > Popup Messages > Add New.
2. Add the popup title.
3. Add message text in the editor.
4. Set a Featured Image if you want an image popup.
5. In Popup Settings, choose:
   - Make this popup Live
   - Show Frequency: once, daily, session, or every visit
   - Delay before showing
   - Button Text
   - Button URL
6. Click Publish/Update.
7. Use Preview Popup on Homepage before turning it live.

Support email:
- Default support email is support@easyvisaformyanmar.com.
- Inquiry notifications send to this email.
- You can edit it in Appearance > Customize > Easy Visa Home Settings > Support Email.


## v17 / 1.1.4
Fixes:
- Round Trip / One Way selector no longer clips text.
- Popup JavaScript is more reliable.
- Theme creates a default Popup Message example on activation, turned OFF by default.
- To make popup work:
  1. Go to WordPress Admin > Popup Messages.
  2. Edit the default popup or Add New.
  3. Add title/message/featured image.
  4. Check "Make this popup Live".
  5. Click Publish/Update.
  6. Open the site in a new incognito window or clear localStorage if using once/daily frequency.


## v18 / 1.1.5
- Hero image slider is larger on desktop, tablet and mobile.
- Slider quotes/captions are more responsive and no longer crowd the arrows/dots.
- Easy Pass tab now includes a Special Request / Notes box.
- Notes are saved in WordPress Admin > Inquiries.
- The note box includes a safety reminder not to send passport, ID or bank details through the form.


## v19 / 1.1.6
Changed form submit behavior:
- Flight form saves inquiry, then shows Thank You page.
- Hotel form saves inquiry, then shows Thank You page.
- Easy Pass form saves inquiry, then shows Thank You page.
- No automatic Facebook or LINE redirect after submit.

The Thank You page says:
"Thank you. We will contact you soon."

The page is created on theme activation:
- /thank-you/


## v20 / 1.1.7
Hero slider responsive fix:
- Slider now has fixed responsive heights.
- Desktop slider is stable and attractive.
- Tablet slider scales properly.
- Mobile slider is not too tall.
- Quotes/captions are limited to two lines.
- Arrows and dots stay in a clean fixed area.


## v21 / 1.1.8
Fixed:
- Flight Trip Type selector responsive layout.
- Round Trip / One Way no longer becomes too wide.
- Desktop layout is compact.
- Tablet layout uses a full clean row.
- Mobile layout fits cleanly.
- Booking text now says the team will contact the customer soon instead of continuing on Facebook/LINE.


## v22 / 1.1.9 emergency fix
- Fixed the PHP syntax error from v21.
- If the site shows "There has been a critical error", replace the broken theme folder manually with this v22 package.


## v23 / 1.2.0
Removed:
- Flight Ticket Trip Type selector
- Round Trip / One Way control

Flight form is now cleaner and simpler.


## v24 / 1.2.1
Updated all support email references to:
support@easyvisaformyanmar.com

Check/edit later in:
Appearance > Customize > Easy Visa Home Settings > Support Email


## v25 / 1.2.2 manual hero slider images
Added backend-controlled Hero Slides.

How to add your own slider photos:
1. Go to WordPress Admin > Hero Slides > Add New.
2. Add the slide title.
3. Add a short label in Excerpt, for example: Bagan, Bangkok, Travel Notice.
4. Add a short quote/message in the editor.
5. Set Featured Image. This image becomes the slider photo.
6. Click Publish.

Ordering:
- Use Page Attributes > Order if you want to control slide order.
- Lower order numbers show first.

If no Hero Slides are published, the theme shows fallback default travel slides.


## v26 / 1.2.3 Easy Extension
Added Easy Extension service with two methods:
1. e Extension
   - Best when customer can book before visa expiry.
   - Recommended 10 to 15 days before the visa extension date.

2. Walk In VIP Extension
   - Best for urgent cases when the customer does not have enough time.
   - Customer can request consultation with admin.

Added:
- Easy Extension tab in booking form.
- Easy Extension inquiry fields.
- Easy Extension info section.
- Easy Extension service card.
- Easy Extension starter page: /easy-extension/
- Saved inquiry details in WordPress Admin > Inquiries.


## v27 / 1.2.4
Easy Extension changes:
- Removed the two method info boxes from the booking form area.
- Current Visa Type now only has:
  - Arrival Visa
  - TR Visa (Tourist)
- Extension Method now has:
  - e Extension
  - Walk In VIP Extension


## v28 / 1.2.5 separated services + email reminder
- Flight, Hotel, Easy Pass and Easy Extension now have separated data explanation cards.
- Each service has its own FAQ area.
- General FAQ explains the submit flow:
  1. Customer fills form.
  2. System saves the request to WordPress Admin > Inquiries.
  3. System sends an email reminder to support@easyvisaformyanmar.com.
  4. Admin contacts the customer.
- Email subject is clearer:
  "New Customer: [Service] Request - [Customer Name]"


## v29 / 1.2.6 service detail tabs
Changed:
- Removed the always-visible mixed service explanation cards.
- Added clickable service detail tabs.
- When customer clicks Flight, only Flight details and FAQ show.
- When customer clicks Hotel, only Hotel details and FAQ show.
- Same for Easy Pass and Easy Extension.
- Booking tab clicks also update the matching detail panel.


## v30 / 1.2.7 social icon fix
Fixed:
- Footer social icon tags
- Floating contact icon panel

Changes:
- Better spacing and alignment
- Same icon circle size
- Same button height
- Cleaner mobile behavior
- Footer social icons now stack better on small screens


## v31 / 1.2.8 English / Myanmar language switcher
Added:
- Header language switcher: EN / မြန်မာ
- Visitor language preference saved in browser.
- Myanmar translations for major customer-facing theme text.
- Myanmar Unicode typography improvements.

Note:
This built-in switcher translates theme text and common customer UI text.
For custom blog posts, pages or manually added content, write both English and Myanmar content manually or use a multilingual plugin later.


## v32 / 1.2.9 footer social icon style
Changed:
- Footer social media icons now use sketch line SVG icons instead of text initials.
- Floating contact widget also uses the same sketch line icons.
- Social labels remain visible next to the icons.


## v33 / 1.3.0 final social media responsive fix
Fixed:
- Social media icons are no longer text initials.
- Footer social icons use sketch line SVG icons.
- Social media text labels align correctly.
- Floating contact panel is responsive and clean.
- Mobile layout keeps icon and text readable.


## v34 / 1.3.1 short customer homepage
Changed homepage flow:
- Hero
- Booking tabs
- Selected service details + selected service FAQ only
- Selected service form
- Short submit flow
- Latest articles
- Footer

Removed from homepage:
- Long mixed service sections
- Mixed FAQ blocks
- Repeated explanation cards

Each service stays separate:
- Flight shows Flight details + Flight FAQ
- Hotel shows Hotel details + Hotel FAQ
- Easy Pass shows Easy Pass details + Easy Pass FAQ
- Easy Extension shows Easy Extension details + Easy Extension FAQ


## v35 / 1.3.2 compact customer homepage + footer social fix
Homepage flow:
1. Header
2. Short hero
3. Book Travel tabs
4. Selected service details + selected service FAQ
5. Selected service form
6. Short submit flow
7. Footer

Footer social fix:
- Real sketch line SVG icons
- Correct icon + text alignment
- Responsive on desktop and mobile
- Same clean layout in floating contact widget


## v36 / 1.3.3 logo favicon
Added favicon from the theme logo:
- assets/images/favicon.png
- assets/images/favicon.ico

The website browser tab should now show the Easy Visa For Myanmar logo.
If your browser still shows the old icon, hard refresh or clear browser cache.


## v37 / 1.3.4 footer social cloud + selected service blocks
Footer social media:
- Compact cloud-style grouped pills.
- Not stretched or spread out.
- Icon + label stay together.

Selected service area:
- Details card block.
- FAQ card block.
- Only selected service details/FAQ show.


## v38 / 1.3.5 working footer social cloud
Fixed the previous footer issue by rewriting footer.php markup.

Footer social:
- Uses footer-social-cloud classes.
- Compact cloud-style pills.
- Not spread out.
- Icons and text align together.

Floating contact:
- Uses matching icon and label classes.

Selected service details:
- Details block and FAQ block are separate cards.


## v39 / 1.3.6 About Us + Help & Support
Added:
- About Us page: /about-us/
- About Us link in header fallback menu
- About Us link in footer Help & Support
- Homepage Help & Support section with:
  - About Us
  - Contact Support
  - support@easyvisaformyanmar.com

If the About Us page does not appear immediately after updating an already-active theme:
1. Deactivate and reactivate the theme once, or
2. Create a WordPress page manually with slug: about-us.


## v40 / 1.3.7 spread FAQ layout
Selected service area:
- Service details block appears first.
- FAQ block appears below and spreads across the full width.
- FAQ questions show as wider cards.
- Mobile layout stacks FAQ cards.
- Flight, Hotel, Easy Pass and Easy Extension FAQs remain separate.


## v41 / 1.3.8 final footer social cloud
Footer social media is now forced into a compact cloud group:
- Not stretched
- Not spread across the footer
- Small close-together pills
- Responsive on mobile


## v42 / 1.3.9 FAQ below booking data
Booking layout is now:
1. Select service tab
2. Service details block
3. Booking data/form
4. Selected service FAQ blocks
5. Safety note

FAQ is no longer above the form.
Flight, Hotel, Easy Pass and Easy Extension FAQ stay separate.


## v43 / 1.4.0 About Us dropdown + language mode
Top menu:
- About Us
  - Contact Us
  - Privacy Policy
  - Terms & Conditions

Header:
- Added EN / မြန်မာ language change mode.

Note:
If you use a custom WordPress menu, create the same submenu in Appearance > Menus:
About Us as parent, then Contact Us, Privacy Policy and Terms & Conditions as child menu items.


## v44 / 1.4.1 professional structure pass
Top menu:
- Home
- Book Travel
  - Flight Ticket
  - Hotel Rent
  - Easy Pass
  - Easy Extension
- About Us
  - Contact Us
  - Privacy Policy
  - Terms & Conditions
- Help & Support

Customer form:
- Preferred Contact Method added.
- Privacy consent checkbox added and required.
- Server-side consent validation added.
- Clear service disclaimer added.

Pages:
- FAQ page added at /faq/.
- Starter pages are created on init if missing, so they can appear after updating an active theme.

Homepage:
- Removed article/guide section from front page to keep it short.


## v45 / 1.4.2 real service pages + better About/FAQ
New/improved pages:
- /flight-ticket-booking/
- /hotel-rent/
- /easy-pass-service/
- /easy-extension-service/
- /about-us/
- /faq/
- /contact/
- /privacy-policy/
- /terms/

This version includes a one-time v45 page updater. Existing short starter pages from older versions will be upgraded automatically. If you have already written custom page content, review the pages after updating.


## v46 / 1.4.3 worldwide positioning
Important wording update:
- Easy Visa For Myanmar is not only for Myanmar travel.
- The website now says it gives worldwide visa and travel support for Myanmar customers.
- Main destinations: Thailand, Singapore, Vietnam, Laos, Malaysia and other countries.
- Added /destinations/ page.

A v46 page updater will refresh old starter pages with the corrected positioning.


## v47 / 1.4.4 hero wording correction
Corrected the hero and Customizer default wording:
- Worldwide visa and travel support
- Thailand, Singapore, Vietnam, Laos and other countries

If old wording still appears, check Appearance > Customize and update Hero Title/Hero Subtitle.


## v48 / 1.4.5 all customers + random quotes
Positioning correction:
- The service is for all customers, not only Myanmar customers.
- The website now says worldwide visa and travel support for all customers.
- Main destinations: Thailand, Singapore, Vietnam, Laos, Malaysia and other countries.

Random quotes:
- Homepage hero quote changes randomly.
- Thank-you page quote changes randomly every load.


## v49 / 1.4.6 full business polish
Contact details:
- Phone: 062 663 9569
- WhatsApp: +959 766 37 4565
- Telegram: @itsmeminsithu

New admin controls:
- WordPress Admin → FAQs
- WordPress Admin → Destinations
- WordPress Admin → Customer Reviews

Homepage:
- Customer Reviews section added.
- FAQ blocks under booking form now use editable FAQ CMS.

Email:
- Admin SMTP reminder added so real hosting email reminders do not go to spam.


## V51 update

TM30 Passport Upload has been removed. The TM30 form now collects only basic request details, region and completed-file delivery method.

## V50 new services

### Letter Service
The booking form now includes a Letter Service tab with:
- Name
- Nationality fixed to Myanmar only
- Contact info
- Preferred contact method
- Letter type:
  - Visa Extension (ဗီဇာသက်တမ်းတိုး)
  - Bank Recommendation Letter (ဘဏ်ဖွင့်ဖို့ ထောက်ခံစာ)
  - Driving License Recommendation Letter (ယာဉ်မောင်းလိုင်စင်ပြုလုပ်ဖို့ - တိုးဖို့ ထောက်ခံစာ)
  - Motorcycle / Car Buying Letter (ယာဉ်ဝယ်ဖို့ ထောက်ခံစာ)
- Special request notes
- Privacy consent

### TM30 Service
The booking form now includes a TM30 Service tab with:
- Name
- Country
- Contact info
- Region: Bangkok, Chiang Mai or Mae Sot
- Completed file delivery method: LINE, Facebook, Email, Message, Telegram or WhatsApp
- Special request notes
- Privacy consent

Important: the TM30 website form does not accept passport uploads. It only collects basic request details. Customers are warned not to send passport photos, ID cards, bank details or unrelated private documents through website forms.


## V52 Focused Service Pages

Letter Service and TM30 Service now open focused full service pages from the Book Travel menu.
Each page includes:
- Service title / short hero
- What the service is for
- Required basic details
- How it works
- Service-specific FAQ block
- Customer Reviews block
- Related Guides block
- Help & Support block
- Safety note

The Start Request buttons still send customers to the matching homepage booking tab.



## v54 cleanup notes
Use Appearance → Easy Visa Setup if you need to create or refresh starter pages after updating the theme.


## v55 notes

- Removed the small Not sure / Read details blocks from the Letter Service and TM30 homepage booking forms.
- Full service pages remain available from menu links and service CTAs.


## v56 notes

This version is a cleanup/trust update. Sample customer reviews are no longer shown publicly. Add real reviews from WordPress Admin → Customer Reviews and enable “Show on homepage” when ready.

On mobile, customers can choose the service from a dropdown in the Book Travel & Services block.

In WordPress Admin → Inquiries, use the Service Type and Status filters to manage customer requests faster.


## Security layer added in v57
The theme now includes stronger form anti-spam, temporary IP-based flood blocking, login attempt throttling, disabled XML-RPC, restricted public REST user listing, disabled comments/pingbacks, author enumeration protection and security headers.

Important: this theme-level security helps reduce spam and simple abuse, but it cannot stop a real network DDoS by itself. For production, use HTTPS, Cloudflare or a hosting WAF, server backups, updated WordPress/plugins, strong admin passwords and SMTP with proper domain email records.
