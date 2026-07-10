# Upload to GitHub

## Option 1: Upload with GitHub website

1. Create a new GitHub repository named `easy-visa-myanmar-wordpress-theme`.
2. Unzip `easy-visa-v59-github-ready.zip` on your computer.
3. Open the folder `easy-visa-v59-github-ready`.
4. Drag all files and folders into the GitHub repository upload page.
5. Commit with this message:

```text
Initial Easy Visa For Myanmar v59 theme
```

## Option 2: Upload with Git commands

```bash
cd easy-visa-v59-github-ready
git init
git add .
git commit -m "Initial Easy Visa For Myanmar v59 theme"
git branch -M main
git remote add origin https://github.com/itsmeminsithu/easy-visa-myanmar-wordpress-theme.git
git push -u origin main
```

## Developer Info

- **Developer:** Min SiThu
- **Website:** https://minsithu.org
- **GitHub:** https://github.com/itsmeminsithu/

## What is inside

```text
easy-visa-v59-github-ready/
├── easy-visa-myanmar/                  # WordPress theme source code
├── docs/                               # Recap, setup, security, minddraw files
├── releases/                           # Installable WordPress theme ZIP
├── .github/workflows/php-syntax-check.yml
├── README.md
├── CHANGELOG.md
├── LICENSE
├── SECURITY.md
├── UPLOAD_TO_GITHUB.md
└── .gitignore
```

## WordPress install ZIP

Use this file for WordPress Admin -> Appearance -> Themes -> Upload Theme:

```text
releases/easy-visa-myanmar-wordpress-theme-v59.zip
```

## Do not upload private data

Do not upload WordPress admin passwords, customer inquiries, passport/ID files, SMTP passwords, `.env` files, database backups, or hosting credentials.
