## *Note: this module is still under initial development and does not yet provide the full functionality of [Neatline 2.6.1 for Omeka Classic](https://omeka.org/classic/plugins/Neatline/).*

## Neatline 3 Omeka S adapter

This module for [Omeka S](http://omeka.org/s/) provides the latest version of Neatline, a suite of tools for scholars, students, and curators to tell stories with maps and timelines. Neatline 3 is in early development.

### Installing
To add Neatline to your Omeka S instance, add this repository as 'Neatline' within your instance's /modules directory. From the Admin dashboard for your instance, click Modules to install and activate Neatline.

### Development setup
To install and run a local copy of this repository for development, first set up a local copy of Omeka S if you do not already have one, either via the [latest version](http://omeka.org/s/) or via [GitHub](https://github.com/omeka/omeka-s). Follow the [installation instructions](http://omeka.org/s/docs/user-manual/install/). You will need an Apache-MySQL-PHP stack to run the local instance, for which [MAMP](https://www.mamp.info/en/) (Mac OS) or [WampServer](https://sourceforge.net/projects/wampserver/) (Windows) are popular solutions. Set this local web server to use the root Omeka S directory.

Next, add this repository to the /modules directory in your Omeka S copy, naming the subdirectory 'Neatline'. You can do so with `git clone https://github.com/performant-software/neatline-omeka-s.git Neatline`.

This repository provides only the back-end adapter for the Neatline service to interface with Omeka S. The front end for the service is maintained in a separate directory, https://github.com/performant-software/neatline-3. This repository links to that one by including it as a git submodule. To install this submodule after you have added this repository to your Omeka instance, `cd` into the /modules/Neatline directory and run two commands: `git submodule init`, then `git submodule update`. This will create a subdirectory named /asset/neatline with the contents of the front end application.

Adding the submodule directory will enable you to access the Neatline view by appending /neatline to the end of the URL for a Site in your instance, e.g. /s/my-site/neatline. This view is rendered by static files from the latest build of the front end project. If you are working on front end features, you will likely want to run the front end application independently so that your changes will be reflected prior to rebuilding the package. To do this, you will need to install [yarn](https://yarnpkg.com/en/). Within the /modules/Neatline/asset/neatline directory in your Omeka S copy, run `yarn install`. If your local Omeka S instance is served on a port other than 8888, open the package.json file inside that directory and edit the value for 'proxy' to match the URL for your local instance—this allows the independent front end application to communicate with the Omeka S adapter. Finally, enter `yarn start` to launch the front end application dynamically at its own port.

#### API authentication in local development
Neatline uses JSON web tokens (JWTs) to handle user authentication between the front end application and back end adapter. When running the front end independently from the back end in a local development setup, you can authenticate API calls by adding a `jwt` url parameter. To get the value for this parameter, open the neatline view inside your local Omeka S instance. In your browser's JavaScript console, enter `jwt` — the JWT string that is printed will work for your independent front end application when used as the value for the `jwt` URL parameter.

### Heroku deployment
Pending a more streamlined workflow for staging and review app deployment, the following approach with Git and Heroku is recommended. Keep in mind: the repository you want to push to Heroku is Omeka, not either of the Neatline repositories themselves. By following the git submodule process, you'll modify your copy of Omeka such that it will automatically pull down the neatline-omeka-s repository from GitHub into its modules folder (with neatline-omeka-s, in turn, pulling down neatline-3 from GitHub) when it’s deployed into an environment like Heroku that knows how to handle submodules.

To prepare your deployment setup:
- Make a deployment-only local copy of Omeka S: `git clone https://github.com/omeka/omeka-s.git omeka-neatline-deployment`. Using a separate, Git-managed copy for deployment will help you cleanly manage submodule updates without otherwise touching any of the codebase.
- Copy the git URL from your Heroku app's Settings pane and add it as a remote called 'heroku' in your new Omeka directory: `cd omeka-neatline-deployment`, then `git remote add heroku your-heroku-app-git-url`.
- In the same directory, add this repository to the modules directory of your deployment Omeka S as Neatline: `git submodule add https://github.com/performant-software/neatline-omeka-s.git modules/Neatline`.
- Initialize the front-end repository's nested submodule: `git submodule update --init --recursive`.

Each time you are ready to deploy:
- When you want to deploy a feature branch in the front-end repository (https://github.com/performant-software/neatline-3), from the directory you use for front-end development, build the React asset files using `yarn build` and commit and push these to your branch.
- In your deployment-only directory, `cd modules/Neatline/asset/neatline`, then `git fetch origin` and `git checkout your-branch-name`.
- Open the file omeka-neatline-deployment/modules/Neatline/.gitmodules and set `branch = your-branch-name`.
- Return to omeka-neatline-deployment/modules/Neatline and, if you do not already have a current feature branch for this repository, create one to accompany your feature branch in neatline-3 (its name does not need to match the name of your neatline-3 branch). Add and commit the changes to .gitmodules and asset/neatline.
- Repeat the same step at the root level of omeka-neatline-deployment: edit that directory's .gitmodules file to set `branch = your-neatline-omeka-s-branch-name` and commit the changes to .gitmodules and modules/Neatline.
- Finally, `git push heroku master` to deploy to your Heroku app (`git push -f` may be necessary).
