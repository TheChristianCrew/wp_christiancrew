# CCGaming's WordPress Theme

Welcome to the repository for CC's WordPress theme.

Any changes to the theme should be done through this GitHub repository and NOT on the server directly. Any changes made on the server directly WILL BE overwritten.

## Contributing

Anyone can contribute to this theme in a couple different ways:
1. Report issues or suggest changes by [creating a new issue](https://github.com/TheChristianCrew/wp_christiancrew/issues).
1. Fix issues or make changes yourself by forking this repository and creating a [pull request](https://github.com/TheChristianCrew/wp_christiancrew/pulls).

## Prerequisites

In order to make changes to the theme, you will need the following:
1. Local web server
  * [XAMPP](https://www.apachefriends.org/index.html) (Windows, Mac)
  * [MAMP](https://www.mamp.info/en/) (Mac)
1. [Git](https://git-scm.com/) (or [GitHub Desktop](https://desktop.github.com/))
1. [NPM](https://www.npmjs.com/)
1. [Grunt](http://gruntjs.com/)
1. [Ruby](http://www.ruby-lang.org/en/downloads/)
1. [Sass](http://sass-lang.com/install)

In addition to the packages above installed, you will need knowledge in the following areas:
1. HTML
1. CSS / Sass
1. JavaScript / jQuery
1. PHP
1. WordPress theming
1. Command line
1. Git

## Recommended Tools

### Code Editor
Atom (cross-platform): http://atom.io

## Learning Resources

### Grunt
CSS-Tricks has an introduction to Grunt if you're just learning what this tool is:
* https://css-tricks.com/video-screencasts/130-first-moments-grunt/

### Sass
* http://sass-lang.com/guide

## Setting Up

Once you have a local web development server running, install a fresh copy of [WordPress](http://wordpress.org). Clone this repository in the WordPress `wp-content/themes` directory then active it via the admin panel.

Open a command line window and cd to the theme directory: `path/to/wordpress/wp-content/themes/wp_christiancrew`.

Any changes made to the Sass files requires grunt to be ran to compile and minify the `.scss` files into `style.css`. You can manually run grunt by typing `grunt` in the command line window, or you can run `grunt watch` so grunt runs automatically upon any changes made.

## Code Guidelines
All HTML and CSS coding should follow the following guideline:
* http://codeguide.co/

PHP coding should follow WordPress' standards:
* https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/

## Development Workflow & Deployments

All changes should be done under the `develop` branch. The development site is automatically updated to the latest revision under this branch every night:
* http://develop.keithbrinks.com/ccgaming

Once changes are finalized, tested, and ready to be pushed out to the live site, the `develop` branch should be merged with `master`.

Deploying to the live site (ccgaming.com) can be done by running the `deploy_updates.sh` script on the web server.
