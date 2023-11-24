# WordPress

Welcome to the WordPress development repository! Please check out the [contributor handbook](https://make.wordpress.org/core/handbook/) for information about how to open bug reports, contribute patches, test changes, write documentation, or get involved in any way you can.

* [Getting Started](#getting-started)
* [Credentials](#credentials)

## Getting Started

### Using GitHub Codespaces

To get started, create a codespace for this repository by clicking this 👇 

[![Open in GitHub Codespaces](https://github.com/codespaces/badge.svg)](https://github.com/codespaces/new?hide_repo_select=true&ref=trunk&repo=75645659)

A codespace will open in a web-based version of Visual Studio Code. The [dev container](.devcontainer/devcontainer.json) is fully configured with softwares needed for this project.

**Note**: Dev containers is an open spec which is supported by [GitHub Codespaces](https://github.com/codespaces) and [other tools](https://containers.dev/supporting).

In some browsers the keyboard shortcut for opening the command palette (Ctrl/Command + Shift + P) may collide with a browser shortcut. The command palette can be opened via the `F1` key or via the cog icon in the bottom left of the editor.

When opening your codespace, be sure to wait for the `postCreateCommand` to finish running to ensure your WordPress install is successfully set up. This can take a few minutes.

### Local development

WordPress is a PHP, MySQL, and JavaScript based project, and uses Node for its JavaScript dependencies. A local development environment is available to quickly get up and running.

You will need a basic understanding of how to use the command line on your computer. This will allow you to set up the local development environment, to start it and stop it when necessary, and to run the tests.

You will need Node and npm installed on your computer. Node is a JavaScript runtime used for developer tooling, and npm is the package manager included with Node. If you have a package manager installed for your operating system, setup can be as straightforward as:

* macOS: `brew install node`
* Windows: `choco install nodejs`
* Ubuntu: `apt install nodejs npm`

If you are not using a package manager, see the [Node.js download page](https://nodejs.org/en/download/) for installers and binaries.

**Note:** WordPress currently only officially supports Node.js `16.x` and npm `8.x`.

You will also need [Docker](https://www.docker.com/products/docker-desktop) installed and running on your computer. Docker is the virtualization software that powers the local development environment. Docker can be installed just like any other regular application.

### Development Environment Commands

Ensure [Docker](https://www.docker.com/products/docker-desktop) is running before using these commands.

#### To start the development environment for the first time

Clone the current repository using `git clone https://github.com/WordPress/wordpress-develop.git`. Then in your terminal move to the repository folder `cd wordpress-develop` and run the following commands:

```
npm install
npm run build:dev
npm run env:start
npm run env:install
```

Your WordPress site will be accessible at http://localhost:8889. You can see or change configurations in the `.env` file located at the root of the project directory.

#### To watch for changes

If you're making changes to WordPress core files, you should start the file watcher in order to build or copy the files as necessary:

```
npm run dev
```

To stop the watcher, press `ctrl+c`.

#### To run a [WP-CLI](https://make.wordpress.org/cli/handbook/) command

```
npm run env:cli -- <command>
```

WP-CLI has [many useful commands](https://developer.wordpress.org/cli/commands/) you can use to work on your WordPress site. Where the documentation mentions running `wp`, run `npm run env:cli --` instead. For example:

```
npm run env:cli -- help
```

#### To run the tests

These commands run the PHP and end-to-end test suites, respectively:

```
npm run test:php
npm run test:e2e
```

You can pass extra parameters into the PHP tests by adding `--` and then the [command-line options](https://docs.phpunit.de/en/10.4/textui.html#command-line-options):

```
npm run test:php -- --filter <test name>
npm run test:php -- --group <group name or ticket number>
```

#### To restart the development environment

You may want to restart the environment if you've made changes to the configuration in the `docker-compose.yml` or `.env` files. Restart the environment with:

```
npm run env:restart
```

#### To stop the development environment

You can stop the environment when you're not using it to preserve your computer's power and resources:

```
npm run env:stop
```

#### To start the development environment again

Starting the environment again is a single command:

```
npm run env:start
```

## Credentials

These are the default environment credentials:

* Database Name: `wordpress_develop`
* Username: `root`
* Password: `password`

To login to the site, navigate to http://localhost:8889/wp-admin.

* Username: `admin`
* Password: `password`

**Note:** With Codespaces, open the portforwarded URL from the ports tab in the terminal, and append `/wp-admin` to login to the site.

To generate a new password (recommended):

1. Go to the Dashboard
2. Click the Users menu on the left
3. Click the Edit link below the admin user
4. Scroll down and click 'Generate password'. Either use this password (recommended) or change it, then click 'Update User'. If you use the generated password be sure to save it somewhere (password manager, etc).
