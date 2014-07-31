Working with SASS
================================

## Preparation:

You require compass and some other gems installed on your computer.

	Run `sudo gem install compass stitch susy` to install.
	Run `sudo apt-get install npm`

You require npm and bower installed on your computer.

	Run `npm install` in the directory `Resources/Private/Materials`.

	Run `sudo npm install -g grunt-cli bower`.

	Run `bower install` in the directory `Resources/Private/Materials`.

		if there is a complaint about `/usr/bin/env: node: No such file or directory`

			Run `sudo apt-get install nodejs-legacy`

## When working on *.scss files

	Run `grunt` in the directory `Resources/Private/Materials` to run the watcher scripts which
	will run `build` when `.scss` and `.js` files are changed.

	Run `grunt build` in the directory `Resources/Private/Materials` to run the `build` step only once.