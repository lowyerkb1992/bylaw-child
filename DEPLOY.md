# Deployment & QA — bylaw-child

## Final QA Checklist

- RTL/LTR: switch site language to Arabic and English; verify layout, text alignment, and that `.is-rtl` / `.is-ltr` body classes appear.
- Language switcher: clicking language switch maintains equivalent page.
- CTAs: Floating WhatsApp / Call / Email appear and open correct targets (do not include personal data in repo).
- Mobile menu: verify collapse/expand works and CTAs do not cover essential content.
- Performance: ensure CSS files are enqueued (no inline large CSS). Use browser devtools to spot 404s.

## Zip child theme

Run from repository root (PowerShell):

```powershell
Compress-Archive -Path "byp_template\bylaw-child\*" -DestinationPath "bylaw-child.zip" -Force
```

## Git push (basic)

```powershell
cd "c:\Users\IShop\Desktop\حقول الادخال html\byp_template\bylaw-child"
git init
git add .
git commit -m "bylaw-child: initial child theme for Almoustashar Legal"
# add remote then push
# git remote add origin <your-repo-url>
# git branch -M main
# git push -u origin main
```

## Rollback notes

- Export Elementor templates (Templates → Save/Export) before major updates.
- Keep a backup of `wp-content/uploads` and `database.sql`.
- To rollback theme changes: switch to parent theme, restore child from backup, or revert git commit.
