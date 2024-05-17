# Twill skeleton

## Description

This boilerplate provides a basic structure for projects based on Twill CMS, with the following specifications:

## Technologies Used

- **Laravel** (latest available version) for the backend.
- **Twill CMS** (latest available version) for content management.
- **Spatie Google Fonts** for integrating Google fonts.
- **SEO Metadata** for optimizing data for search engines.
- **Page Cache** for improving site performance.
- **Menu Header** and **Menu Footer** for site navigation.

## Site Modules

The site will consist of the following modules:

- **Pages**: For managing the site's pages.
- **Settings**: For general site configuration.

## Components

The following components will be available for page building:

- **Contact Form**: For creating contact forms.
- **Hero**: For introductory banners on pages.
- **Free Text**: For inserting free text.
- **Title**: For adding titles to pages.
- **Free Text with Image**: For inserting free text with images.
## Settings Management

Site settings will include the ability to manage:

- Selection of the homepage.
- Logo and Favicon.
- SEO optimization.
- Google Analytics.
- Iubenda.
- Matomo.


## Installation

To set up this boilerplate on your local machine, follow these steps:

1. **Install project**

   ```bash
   php configure.php
2. **Install twill**
    ```bash
    php artisan twill:install
    php artisan twill:build --install
