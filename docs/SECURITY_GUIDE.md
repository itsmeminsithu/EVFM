# Easy Visa For Myanmar - Security Guide

## Included theme-level protection

- Inquiry form nonce verification.
- Hidden honeypot fields.
- Timed form tokens to reduce instant bot submissions.
- IP-hashed submission rate limiting.
- Temporary blocking for repeated suspicious requests.
- Spam phrase checks.
- Excessive link checks.
- File uploads disabled on inquiry forms.
- Generic login errors.
- Login attempt throttling.
- XML-RPC disabled.
- Public REST user listing restricted.
- Author enumeration blocked.
- Comments and pingbacks disabled.
- WordPress generator hidden.
- Pingback header removed.
- Security headers added by the theme.

## What this protects against

- Simple spam bots.
- Scam form submissions.
- Basic flooding through the inquiry form.
- Login guessing abuse.
- User enumeration.
- Comment spam.
- Accidental private document collection through forms.

## What it does not fully protect against

A WordPress theme cannot fully stop real DDoS attacks. Real DDoS traffic hits the network/server before WordPress can respond.

Use one of these in production:

- Cloudflare
- Hosting-provider WAF
- Hosting-provider DDoS protection
- Managed WordPress security/firewall service

## Production launch checklist

- Use HTTPS only.
- Use Cloudflare or hosting WAF.
- Enable two-factor authentication for admins.
- Use strong passwords.
- Limit admin users.
- Keep WordPress core, plugins, and theme updated.
- Set up automated off-server backups.
- Set up SMTP and proper domain email records.
- Do not collect passport, ID, bank, or private documents through website forms.
- Test all inquiry forms after every update.


## Developer Info

- **Developer:** Min SiThu
- **Website:** https://minsithu.org
- **GitHub:** https://github.com/itsmeminsithu/
