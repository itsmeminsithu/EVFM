# Security Policy

## Supported version

The current supported version is `v59 / 1.5.9`.

## Sensitive data rules

Do not commit:

- WordPress admin passwords
- SMTP passwords or API keys
- `.env` files
- Database backups
- Customer inquiries or customer documents
- Passport, ID, bank, or private documents

## Production recommendations

- Use HTTPS only.
- Put the site behind Cloudflare or hosting WAF/DDoS protection.
- Use SMTP with proper SPF, DKIM, and DMARC records.
- Use strong WordPress admin passwords and two-factor authentication.
- Keep WordPress, plugins, and theme updated.
- Back up the site regularly outside the web server.

## Theme security layer

The theme includes nonce checks, honeypots, timed form tokens, rate limits, suspicious keyword checks, too-many-links protection, temporary blocking, login throttling, XML-RPC disable, REST user listing restriction, author enumeration blocking, comments/pingbacks disable, generator removal, pingback header removal, and security headers.

A theme cannot fully stop real network-level DDoS. Use Cloudflare or hosting-provider protection for DDoS.


## Developer Info

- **Developer:** Min SiThu
- **Website:** https://minsithu.org
- **GitHub:** https://github.com/itsmeminsithu/
