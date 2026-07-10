# GitHub Repo Setup Guide

## Recommended repo name

`easy-visa-myanmar-wordpress-theme`

## Developer Info

- **Developer:** Min SiThu
- **Website:** https://minsithu.org
- **GitHub:** https://github.com/itsmeminsithu/

## What to upload

Upload the theme folder, not only the ZIP:

```text
easy-visa-myanmar/
├── assets/
├── 404.php
├── archive.php
├── archive-evm_visa_guide.php
├── footer.php
├── front-page.php
├── functions.php
├── header.php
├── index.php
├── INSTALL.md
├── page.php
├── readme.txt
├── screenshot.png
├── search.php
├── searchform.php
├── SECURITY.md
├── single.php
├── single-evm_visa_guide.php
├── style.css
├── taxonomy-evm_guide_category.php
├── template-contact.php
└── template-thank-you.php
```

## First GitHub upload commands

```bash
mkdir easy-visa-myanmar-wordpress-theme
cd easy-visa-myanmar-wordpress-theme
# copy the easy-visa-myanmar theme folder here
cp -R /path/to/easy-visa-myanmar ./
cp README.md CHANGELOG.md SECURITY.md ./

git init
git add .
git commit -m "Initial Easy Visa For Myanmar v59 theme"
git branch -M main
git remote add origin https://github.com/itsmeminsithu/easy-visa-myanmar-wordpress-theme.git
git push -u origin main
```

## Do not upload

- WordPress admin passwords.
- Database backups with customer data.
- Customer inquiry exports.
- Passport, ID, bank, or private documents.
- SMTP passwords or API keys.
- `.env` files.

## Suggested `.gitignore`

```gitignore
.DS_Store
Thumbs.db
*.log
*.sql
*.sqlite
*.zip
.env
node_modules/
vendor/
wp-config.php
uploads/
```
