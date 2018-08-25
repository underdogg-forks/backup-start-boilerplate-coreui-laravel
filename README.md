# Laravel BS4 CoreUI Boilerplate

## Demo

* Frontend demo : [https://laravel-boilerplate.pc-world.fr](https://laravel-boilerplate.pc-world.fr)
* Backend demo : [https://laravel-boilerplate.pc-world.fr/admincp](https://laravel-boilerplate.pc-world.fr/admincp) (demo@example.com/demo, read-only)

## Features

### Frontend

* Bootstrap 4 (beta) Frontend with basic home-about-contact and legal mentions pages,
* [Slick carousel](http://kenwheeler.github.io/slick/) and [Cookie Consent](https://cookieconsent.insites.com/) integrated,
* Client-side validation with [vee-validate](https://github.com/baianat/vee-validate),
* Blog section, including navigation by tags & authors,
* [Intervention image](https://github.com/Intervention/image) for dynamic optimized images with cache plugin,
* Login throttle by recaptcha & [password strength meter](https://github.com/ablanco/jquery.pwstrength.bootstrap),
* Frontend user space and profile management. Email validation included. Registration can be disabled by environment parameter,
* [Laravel Socialite](https://github.com/laravel/socialite) included with all supported socialite providers (facebook/twitter/linkedin/github/bitbucket).

### Backend

#### Underlying layer

* Based on Bootstrap 4 [CoreUI](https://github.com/mrholek/CoreUI-Free-Bootstrap-Admin-Template) theme with many useful plugins ([DataTables](https://www.datatables.net/), [SweetAlert2](https://limonte.github.io/sweetalert2/), [Flatpickr](https://chmln.github.io/flatpickr/), [Quill](https://quilljs.com/), etc.),
* Entirely written with Vue components thanks to [Bootstrap-Vue](https://bootstrap-vue.js.org/),
* Vue-route for instant client-side navigation,
* All main CRUD actions are ajaxified,
* Native [vue-select](https://github.com/sagalbot/vue-select) component for powerful select system (autocomplete, tags, etc.),
* Batch actions integrated within DataTables with use of his select plugin,
* Client-side CSV export feature included by buttons DataTable plugin,
* Instant search engine (for posts) thanks to [Laravel Scout](https://github.com/laravel/scout) & [TNTSearch](https://github.com/teamtnt/tntsearch).

#### Features included

* User and permissions management (classic users <-> roles <-> permissions structure),
* Impersonation feature for quick user context testing,
* Frontend forms module, including settings (recipients and translatable message confirmation) & submissions management,
* Posts management for frontend blog, with granular publication permissions (classic draft-pending-published workflow). Posts include title, summary, html body, tags, featured image, metas. They can be published and/or unpublished at specific datetime and pinned if needed. Specific user can have limited access to his own posts only, according to his permissions,

### Localization & SEO

* Multilingual ready thanks to [Laravel Localization](https://github.com/mcamara/laravel-localization) package. Each routes are prefixed by locale in URL for best SEO support. For this boilerplate, EN & FR locales are 100% supported, including translated routes,
* Model Field Translatable support with [Laravel Translatable](https://github.com/dimsav/laravel-translatable), used for contact form confirmed message, metatags and posts,
* Robots and Sitemap integrated, including multilingual alternates,
* Full Metatags manager interface with translatable title & description. Meta entity can be either linked to route or specific entity like post,
* 301/302 redirections manager interface, with CSV/XLSX import feature.

### Developer Specific

* Usage of [Laravel-Mediable](https://github.com/plank/laravel-mediable) package for orderable media model management, used for featured image on posts,
* Permissions configuration based on config file rather than database,
* Form types defined on config file for settings & submission support. This boilerplate include just one "contact form" type,
* Custom webpack integration rather than laravel mix, for better flexibility

## Install

### For Local/Development :

```shell
composer install
php artisan key:generate
php artisan storage:link
php artisan migrate [--seed]
```

### Backend access

The first user to register will be automatically super admin with no restriction and will cannot be deletable.
Both frontend and backend have dedicated login pages.

## Development notes

### Compiling assets with Webpack

1. Install dependencies with `yarn` (make sure it's installed, on Windows I started the cmd prompt with administrator privileges):
```shell
yarn
```


2. Launch `yarn dev` for compiling assets and start dev-server with HMR enabled

> N1 : Use `yarn watch` if you prefer old school auto-building without HMR  
> N2 : If assets modified, don't forget to launch `yarn prod` before deploy on each production environment.





### Permissions definitions

Unlike other known project as [ENTRUST](https://github.com/Zizaco/entrust) or [laravel-permission](https://github.com/spatie/laravel-permission), which are very well suited for generic roles/permissions, i preferred a more lite and integrated custom solution.

The mainly difference is that instead of store all permissions into specific SQL table, there are directly defined in a specific config file permissions. SQL side, roles entities relies only to a list of permissions key names.

Indeed i feel this approach better for maintainability simply because permissions are hardly tied to the application with Laravel Authorization. This is anyway the standard way in CMS as Drupal where each module have specific config permission file. Permissions should be only owned by developers.

