# Easy Visa For Myanmar - v59 Project File

**Date:** 2026-07-10  
**Latest WordPress theme ZIP:** `easy-visa-myanmar-wordpress-theme-v59.zip`  
**Theme version:** `v59 / 1.5.9`  
## Developer Info

- **Developer:** Min SiThu
- **Website:** https://minsithu.org
- **GitHub:** https://github.com/itsmeminsithu/

**Business positioning:** Worldwide visa and travel support for all customers, mainly around Thailand, Singapore, Vietnam, Laos, Malaysia, and other countries.

> Safety note: this project file intentionally does not include local WordPress admin passwords. Keep credentials private and do not publish them to GitHub, PDF, or customer-facing pages.



## 0. Preview asset

The latest real homepage screenshot is now included as:

- `easy-visa-myanmar/screenshot.png` for the WordPress theme preview
- `docs/theme-preview-screenshot.png` for the GitHub repo and handoff docs

This screenshot should be used as the default visual preview of the project.

## 1. Current customer-facing website direction

The website should feel clean, simple, trustworthy, mobile-friendly, and fast for customers who want to submit a service request.

Main customer paths:

1. Customer already knows the service -> uses **Book Travel & Services** on the homepage.
2. Customer needs details first -> opens a full service page such as `/letter-service/` or `/tm30-service/`.
3. Customer wants education -> reads **Visa Guides**.
4. Customer needs help -> uses Help & Support or footer contact links.

## 2. Main menu

Recommended top menu:

- Home
- Destinations
- Book Travel & Services
  - Flight Ticket
  - Hotel Rent
  - Easy Pass
  - Easy Extension
  - Letter Service
  - TM30 Service
- Visa Guides
- About Us
  - Contact Us
  - Privacy Policy
  - Terms & Conditions
- Help & Support

## 3. Homepage structure

Recommended final homepage order:

1. Header
2. Short hero with random quote
3. Book Travel & Services section
4. Selected service details / support explanation
5. Booking form/data
6. FAQ blocks under booking form
7. Safety note / disclaimer
8. Visa Guides preview
9. Customer Reviews only when real live reviews exist
10. Help & Support
11. Footer social/contact cloud

## 4. Booking service tabs

The homepage request area should include these 6 services:

- Flight Ticket
- Hotel Rent
- Easy Pass Services
- Easy Extension
- Letter Service
- TM30 Service

The section title should stay **Book Travel & Services**, not only **Book Your Travel**, because Letter Service and TM30 are support/document services, not travel bookings.

## 5. Form fields by service

### Flight Ticket

- Name
- Phone / Email
- Preferred Contact Method
- From
- To
- Departure
- Return
- Passengers
- Privacy consent checkbox

### Hotel Rent

- Name
- Phone / Email
- Preferred Contact Method
- Destination
- Check-in
- Check-out
- Guests
- Rooms
- Privacy consent checkbox

### Easy Pass Services

- Name
- Phone / Email
- Preferred Contact Method
- Nationality
- Arrive Airport: DMK, BKK, CNX
- From
- Visa Type
- Special Request / Notes
- Privacy consent checkbox

Visa type options:

- TR Visa
- ED Visa
- DTV Visa
- Non-LA Visa
- Visa on Arrival
- Business Visa
- Non-B Visa
- Non-O Visa
- Non-Immigrant Visa
- Transit Visa
- Other Visa

### Easy Extension

- Name
- Phone / Email
- Preferred Contact Method
- Nationality
- Current Visa Type: Arrival Visa, TR Visa
- Visa Expiry Date
- Preferred Extension Date
- Extension Method: e Extension, Walk In VIP Extension
- Special Request / Notes
- Privacy consent checkbox

### Letter Service

Letter Service is for **Myanmar nationality only**.

Fields:

- Name
- Nationality: Myanmar only
- Phone / Email
- Preferred Contact Method
- Letter Type
- Special Request / Notes
- Privacy consent checkbox

Letter type options:

- Visa Extension (ဗီဇာသက်တမ်းတိုး)
- Bank Recommendation Letter (ဘဏ်ဖွင့်ဖို့ ထောက်ခံစာ)
- Driving License Recommendation Letter (ယာဉ်မောင်းလိုင်စင်ပြုလုပ်ဖို့ - တိုးဖို့ ထောက်ခံစာ)
- Motorcycle / Car Buying Letter (ယာဉ်ဝယ်ဖို့ ထောက်ခံစာ)

### TM30 Service

TM30 has **no passport upload on the website**.

Fields:

- Name
- Country
- Contact Info
- Region: Bangkok, Chiang Mai, Mae Sot
- How customer wants to receive completed file: LINE, Facebook, Email, Message, Telegram, WhatsApp
- Special Request / Notes
- Privacy consent checkbox

## 6. Full service pages

Menu clicks for **Letter Service** and **TM30 Service** should open full service landing pages.

Recommended page structure:

1. Service hero
2. What this service is
3. Who can use it
4. Service options / required basic details
5. How it works
6. Start Request button
7. Service-specific FAQ
8. Related Visa Guides
9. Customer Reviews if real reviews exist
10. Help & Support
11. Safety note

## 7. Visa Guides / Blog

Use the customer-friendly name **Visa Guides** instead of only “Blog”.

Guide categories:

- Thailand Visa
- TM30
- Visa Extension
- Letter Service
- Travel Tips
- Myanmar Language Guides

Starter guide topics:

- What is TM30 in Thailand?
- How to request a recommendation letter
- Thailand visa extension basic guide
- What information is needed for Easy Pass?
- How customers receive completed documents
- Myanmar language support for visa services

## 8. WordPress Admin CMS sections

Keep these admin sections:

- Inquiries
- FAQs
- Destinations
- Customer Reviews
- Hero Slides
- Popup Messages
- Visa Guides

Inquiry admin workflow:

- New
- Contacted
- Waiting Customer
- Processing
- Completed
- Cancelled

Admin should also have a private Admin Note field for each inquiry.

## 9. Security and safety layer in v57

Theme-level protections:

- Inquiry form nonce verification
- Honeypot fields
- Timed form token
- IP-hashed rate limiting
- Temporary blocking after repeated suspicious requests
- Suspicious phrase checks
- Too-many-links checks
- File uploads disabled on website inquiry forms
- Generic login errors
- Login attempt throttling
- XML-RPC disabled
- Public REST user listing restricted
- Author enumeration blocked
- Comments and pingbacks disabled
- WordPress generator hidden
- Pingback headers removed
- Security headers added
- Security status checklist in Appearance -> Easy Visa Setup

Important: theme-level security helps against spam, scams, and simple bot abuse. It cannot fully stop real network-level DDoS. Use Cloudflare or hosting WAF/DDoS protection on real hosting.

## 10. Business contact details

- Support Email: support@easyvisaformyanmar.com
- Phone: 062 663 9569
- WhatsApp: +959 766 37 4565
- Telegram: @itsmeminsithu
- Facebook: https://www.facebook.com/easyvisaformyanmar
- Instagram: https://www.instagram.com/easyvisaformyanmar
- LINE: https://line.me/ti/p/s1yC8g82I3
- TikTok: https://www.tiktok.com/@easyvisaformyanmar

## 11. Installation steps

1. Upload `easy-visa-myanmar-wordpress-theme-v59.zip` in WordPress Admin -> Appearance -> Themes -> Add New -> Upload Theme.
2. Activate the theme.
3. Go to Appearance -> Easy Visa Setup -> Create / Refresh Starter Pages.
4. Go to Settings -> Permalinks -> Save Changes.
5. Set up homepage and menu.
6. Add real content: reviews, destinations, FAQ answers, guide posts, photos.
7. Set up SMTP on real hosting.
8. Put Cloudflare or hosting WAF in front of the site.
9. Test all forms and mobile layout.

## 12. Testing checklist

- Test homepage on desktop and mobile
- Test mobile menu
- Test service dropdown on mobile
- Test all 6 booking forms
- Test validation errors
- Test Thank You page messages
- Test Letter Service page
- Test TM30 Service page
- Test Visa Guides archive and single guide pages
- Test search guides
- Test FAQ switching
- Test admin inquiry filters
- Test copy buttons in inquiry admin
- Test phone, WhatsApp, Telegram, LINE, Facebook links
- Test Customer Reviews only after adding real reviews
- Test SMTP email delivery
- Test Security layer status

## 13. Important cleanup notes for next version

- Update the internal `readme.txt` to remove old wording about the removed Services post type.
- Keep version history in clean order from v50 to v57.
- Do not re-add passport upload unless there is a secure business/legal process.
- Long-term: move Inquiries, FAQs, Reviews, Destinations, Popups, and Visa Guides into a plugin so business data is not tied only to the theme.
