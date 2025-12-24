# Polylang & Menus Wiring — Almoustashar Legal

Steps to create menus and wire Polylang so language switch keeps same page:

1. Create pages for EN and AR pairs (slug mapping).
2. Go to Appearance → Menus and create two menus:
   - Main Menu EN: add English pages only.
   - Main Menu AR: add Arabic pages only.
3. Assign menus in Appearance → Menus → Manage Locations (if theme supports multiple locations) or use Elementor Nav Menu widget and select proper menu.
4. For Polylang: edit each page, use the Language metabox to connect the translations (link Arabic page to English page). This ensures the language switcher jumps to the equivalent page.
5. Remove demo pages: In Menus, delete any demo menu items and replace with the real pages.
6. Add a Polylang language switcher to header (Elementor) and set its options to show language names/flags per preference.

Verification

- From an English page, click the language switcher — you should land on the corresponding Arabic page (and vice versa).
- Menus shown when switching languages must reflect only pages of that language.
