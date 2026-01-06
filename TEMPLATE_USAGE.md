# تعليمات استخدام القالب المعدّل / Template Usage Guide

## English Version

### Contact Information Integration

The child theme now automatically displays contact information throughout the site using the configured data in `inc/cta.php`:

- **Phone**: +971502974604
- **Email**: info@almoustasharlegal.com
- **WhatsApp**: +971502974604

### New Features

#### 1. Top Bar with Contact Information

The top bar now displays:
- Phone number with click-to-call functionality
- Email address with click-to-email functionality
- WhatsApp button that opens WhatsApp chat
- Language switcher (if Polylang is active)

**Location**: Appears at the very top of every page

#### 2. Sidebar with Contact Widget

A new sidebar has been added that displays:
- Contact information with icons
- Clickable phone, email, and WhatsApp links
- Call-to-action button for free consultation

**Usage**: 
- Use the "Page with Sidebar" template when creating/editing pages
- The contact widget appears automatically in the sidebar
- Additional widgets can be added via Appearance > Widgets > Main Sidebar

#### 3. Footer with Widget Areas

The footer now includes:
- 4 widget areas for organizing footer content
- Footer menu support
- Copyright and disclaimer text (bilingual)
- Professional styling with grid layout

**Configuration**:
- Go to Appearance > Widgets
- Add widgets to Footer 1, Footer 2, Footer 3, Footer 4
- Configure footer menu in Appearance > Menus > Footer Menu

#### 4. Menu Locations

Three menu locations are now registered:
- **Primary Menu**: Main navigation header
- **Footer Menu**: Links in footer bottom area
- **Sidebar Menu**: Optional menu for sidebar

**Setup**: Go to Appearance > Menus to assign menus to these locations

### Page Templates

#### Page with Sidebar
Use this template to display pages with the sidebar contact widget.

**How to use**:
1. Edit or create a page
2. In the Page Attributes box, select "Template: Page with Sidebar"
3. Publish/Update the page

### Responsive Design

All new features are fully responsive:
- **Desktop**: Full layout with topbar, sidebar, and 4-column footer
- **Tablet**: Sidebar moves below content, footer becomes 2 columns
- **Mobile**: Simplified topbar (icons only), single-column footer

### RTL (Arabic) Support

All features automatically adapt for Arabic pages:
- Right-to-left text direction
- Mirrored layouts
- Arabic labels for all interface elements

---

## النسخة العربية

### دمج معلومات الاتصال

يعرض القالب الفرعي الآن معلومات الاتصال تلقائيًا في جميع أنحاء الموقع باستخدام البيانات المكوّنة في `inc/cta.php`:

- **الهاتف**: +971502974604
- **البريد الإلكتروني**: info@almoustasharlegal.com
- **واتساب**: +971502974604

### الميزات الجديدة

#### 1. الشريط العلوي مع معلومات الاتصال

يعرض الشريط العلوي الآن:
- رقم الهاتف مع إمكانية الاتصال المباشر
- عنوان البريد الإلكتروني مع إمكانية المراسلة المباشرة
- زر واتساب الذي يفتح محادثة واتساب
- مبدل اللغة (إذا كان Polylang نشطًا)

**الموقع**: يظهر في أعلى كل صفحة

#### 2. الشريط الجانبي مع ودجت الاتصال

تمت إضافة شريط جانبي جديد يعرض:
- معلومات الاتصال مع الأيقونات
- روابط قابلة للنقر للهاتف والبريد الإلكتروني وواتساب
- زر الحث على اتخاذ إجراء للحصول على استشارة مجانية

**الاستخدام**:
- استخدم قالب "صفحة مع شريط جانبي" عند إنشاء/تحرير الصفحات
- يظهر ودجت الاتصال تلقائيًا في الشريط الجانبي
- يمكن إضافة ودجتات إضافية عبر المظهر > الودجتات > الشريط الجانبي الرئيسي

#### 3. التذييل مع مناطق الودجتات

يتضمن التذييل الآن:
- 4 مناطق ودجتات لتنظيم محتوى التذييل
- دعم قائمة التذييل
- نص حقوق النشر وإخلاء المسؤولية (ثنائي اللغة)
- تصميم احترافي مع تخطيط شبكي

**التكوين**:
- انتقل إلى المظهر > الودجتات
- أضف ودجتات إلى تذييل 1، تذييل 2، تذييل 3، تذييل 4
- اضبط قائمة التذييل في المظهر > القوائم > قائمة التذييل

#### 4. مواقع القوائم

تم تسجيل ثلاثة مواقع للقوائم:
- **القائمة الرئيسية**: التنقل الرئيسي في الرأس
- **قائمة التذييل**: الروابط في منطقة أسفل التذييل
- **قائمة الشريط الجانبي**: قائمة اختيارية للشريط الجانبي

**الإعداد**: انتقل إلى المظهر > القوائم لتعيين القوائم لهذه المواقع

### قوالب الصفحات

#### صفحة مع شريط جانبي
استخدم هذا القالب لعرض الصفحات مع ودجت الاتصال في الشريط الجانبي.

**كيفية الاستخدام**:
1. قم بتحرير أو إنشاء صفحة
2. في مربع سمات الصفحة، حدد "القالب: صفحة مع شريط جانبي"
3. انشر/حدّث الصفحة

### التصميم المتجاوب

جميع الميزات الجديدة متجاوبة بالكامل:
- **سطح المكتب**: التخطيط الكامل مع الشريط العلوي والشريط الجانبي وتذييل من 4 أعمدة
- **الجهاز اللوحي**: ينتقل الشريط الجانبي أسفل المحتوى، يصبح التذييل عمودين
- **الجوال**: شريط علوي مبسط (أيقونات فقط)، تذييل من عمود واحد

### دعم RTL (العربية)

تتكيف جميع الميزات تلقائيًا مع الصفحات العربية:
- اتجاه النص من اليمين إلى اليسار
- تخطيطات معكوسة
- تسميات عربية لجميع عناصر الواجهة

---

## Technical Details

### Files Modified
- `functions.php` - Added menu registration, sidebar registration, and asset enqueuing
- `template-parts/header/topbar.php` - Updated with contact information display
- `assets/css/header-footer.css` - Added comprehensive styling for topbar, sidebar, and footer
- `assets/css/custom.css` - Added page layout styles for sidebar integration

### Files Created
- `sidebar.php` - Main sidebar template
- `template-parts/sidebar-contact.php` - Contact widget template
- `footer.php` - Footer template with widget areas
- `page-with-sidebar.php` - Page template with sidebar support

### Contact Information Configuration

To update contact information, edit the constants in `inc/cta.php`:

```php
define( 'BCH_CTA_WHATSAPP', '+971502974604' );
define( 'BCH_CTA_PHONE', '+971502974604' );
define( 'BCH_CTA_EMAIL', 'info@almoustasharlegal.com' );
```

### Widget Areas

- `sidebar-1` - Main sidebar
- `footer-1` - First footer column
- `footer-2` - Second footer column
- `footer-3` - Third footer column
- `footer-4` - Fourth footer column

### Menu Locations

- `primary` - Primary navigation menu
- `footer` - Footer menu
- `sidebar` - Sidebar menu (optional)

---

## Support

For questions or issues, please refer to the main documentation files:
- README.md
- README_ELEMENTOR.md
- README_POLYLANG.md
- content_blueprints.md
