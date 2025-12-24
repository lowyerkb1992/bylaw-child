# Elementor Theme Builder Instructions — Almoustashar Legal (ByLaw Child)

## Purpose

Short, actionable steps to build bilingual EN/AR Header and Footer using Elementor Theme Builder.

---

## Header (EN and AR)

1. Create a new Header template in Elementor → Theme Builder → Header.
2. Structure (use a 3-column section):
   - Column 1: Logo (Image widget)
   - Column 2: Primary Menu (Nav Menu widget) — set to Desktop horizontal
   - Column 3: Language Switcher (Polylang) + CTA Button (Link to Contact)
3. CTA Button microcopy:
   - EN: `Get Legal Advice` / small label: `Free Consultation`
   - AR: `احصل على استشارة قانونية` / small label: `استشارة مجانية`
4. Language switcher: use Polylang widget (or shortcode). Wrap in a container with class `bch-lang-switcher`.
5. Make sure header container has class `site-header` or the parent theme header class so CSS hooks apply.
6. Publish conditions: Include → Entire Site (assign EN header to EN front, AR header to AR front using display conditions per language).

---

## Footer (EN and AR)

1. Create Footer template in Elementor → Theme Builder → Footer.
2. Structure (4 columns recommended):
   - Column 1: Logo + short firm summary (text)
   - Column 2: Quick Links (Nav Menu widget) — links to main pages
   - Column 3: Contact Info (phone, whatsapp, email) — use icon list
   - Column 4: Disclaimer + Social icons
3. Footer microcopy:
   - EN disclaimer (short): `© YEAR Almoustashar Legal. All rights reserved. This site does not create an attorney-client relationship.`
   - AR disclaimer (short): `© YEAR المستشار القانوني. جميع الحقوق محفوظة. هذا الموقع لا ينشئ علاقة محاماة وموكل.`
4. Publish conditions: Entire Site; create language-specific footers for EN/AR similarly to header.

---

## Accessibility & Small UI notes

- Use `aria-label` on CTA buttons and icon links. Example: `aria-label="Call Almoustashar Legal"`.
- Add classes: header CTA button `bch-header-cta`, footer contact list `bch-footer-contacts`.
- For Arabic footer, set text-align right in the widget Advanced → CSS Classes: add `bch-rtl-text`.

---

## Polylang / Display Conditions

- For each template (Header/Footer) use Elementor display conditions + Polylang language rules to assign templates to each language.

---

## Where to add these texts/styles

- CTA labels and footer disclaimers are provided in `bylaw-child/README_ELEMENTOR.md` and can be copy-pasted into Elementor widgets.
