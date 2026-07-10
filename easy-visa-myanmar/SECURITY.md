# Easy Visa For Myanmar - Security Notes

## Theme-level protection included

- Inquiry form nonce verification.
- Hidden honeypot fields.
- Timed form tokens to reduce instant bot submissions.
- IP-hashed submission rate limiting and temporary blocking for repeated suspicious requests.
- Spam phrase and excessive-link checks.
- File uploads disabled on website inquiry forms.
- Generic login errors and login attempt throttling.
- XML-RPC disabled.
- Public REST user listing restricted.
- Author enumeration redirects.
- Comments and pingbacks disabled to reduce spam.
- Security headers added by the theme.

## Production requirements

A WordPress theme cannot fully protect against real network DDoS attacks because DDoS traffic reaches the server before WordPress can respond. Use an edge firewall/CDN such as Cloudflare, your hosting provider WAF, or another managed DDoS protection service.

Recommended launch checklist:

1. Use HTTPS only.
2. Use Cloudflare or hosting WAF.
3. Keep WordPress core, plugins and theme updated.
4. Use strong admin passwords and two-factor authentication.
5. Use SMTP and proper domain email records so inquiry emails deliver reliably.
6. Keep automated backups outside the server.
7. Do not collect passport, ID, bank or private documents through website forms.


## Developer Info

- **Developer:** Min SiThu
- **Website:** https://minsithu.org
- **GitHub:** https://github.com/itsmeminsithu/
