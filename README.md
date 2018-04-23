## Neatline 3 Omeka S adapter

This module for [Omeka S](http://omeka.org/s/) provides the latest version of Neatline, a suite of tools for scholars, students, and curators to tell stories with maps and timelines. Neatline 3 is in early development.

### Installing
To add Neatline to your Omeka S instance, add this repository as 'Neatline' within your instance's /modules directory. From the Admin dashboard for your instance, click Modules to install and activate Neatline.

### Development setup
To install and run a local copy of this repository for development, first set up a local copy of Omeka S if you do not already have one, either via the [latest version](http://omeka.org/s/) or via [GitHub](https://github.com/omeka/omeka-s). Follow the [installation instructions](http://omeka.org/s/docs/user-manual/install/). You will need an Apache-MySQL-PHP stack to run the local instance, for which [MAMP](https://www.mamp.info/en/) (Mac OS) or [WampServer](https://sourceforge.net/projects/wampserver/) (Windows) are popular solutions. Set this local web server to use the root Omeka S directory.

Next, add this repository to the /modules directory in your Omeka S copy, naming the subdirectory 'Neatline'. You can do so with `git clone https://github.com/performant-software/neatline-omeka-s.git Neatline`.

This repository provides only the back-end adapter for the Neatline service to interface with Omeka S. The front end for the service is maintained in a separate directory, https://github.com/performant-software/neatline-3. This repository links to that one by including it as a git submodule. To install this submodule after you have added this repository to your Omeka instance, `cd` into the /modules/Neatline directory and run two commands: `git submodule init`, then `git submodule update`. This will create a subdirectory named /asset/neatline with the contents of the front end application.

Adding the submodule directory will enable you to access the Neatline view by appending /neatline to the end of the URL for a Site in your instance, e.g. /s/my-site/neatline. This view is rendered by static files from the latest build of the front end project. If you are working on front end features, you will likely want to run the front end application independently so that your changes will be reflected prior to rebuilding the package. To do this, you will need to install [yarn](https://yarnpkg.com/en/). Within the /modules/Neatline/asset/neatline directory in your Omeka S copy, run `yarn install`. If your local Omeka S instance is served on a port other than 8888, open the package.json file inside that directory and edit the value for 'proxy' to match the URL for your local instance—this allows the independent front end application to communicate with the Omeka S adapter. Finally, enter `yarn run` to launch the front end application dynamically at its own port.
