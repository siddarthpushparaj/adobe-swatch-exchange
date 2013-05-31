# Adobe Swatch Exchange Generator

Programmatically generates Adobe `.ase` files for use with the Adobe suite of applications.

## Requirements
### Required
The following software is **required** for  to run:

* [PHP](http://php.net) 5.3.2+
* The [mbstring](http://php.net/manual/en/book.mbstring.php) extension.


## Examples

	<?php
	use Ase\Color\Hex;
	use Ase\Generator;
	use Ase\Palette\Palette;

	$ase = new Generator(array(
		new Palette('I got the blues', array(
			new Hex('One',   '0033ff'),
			new Hex('Two',   '#03c'),
			new Hex('Three', '#0066cc'),
		)),
	));

	file_put_contents('palette.ase', $ase->makePalette());


## Installation
Depending on your needs, there are a few different ways you can install Adobe Swatch Exchange Generator:

### Bundle with Composer
To add Adobe Swatch Exchange Generator as a [Composer](https://github.com/composer/composer) dependency in your `composer.json` file:

	{
		"require": {
			"skyzyx/adobe-swatch-encoder": ">=1.0"
		}
	}

### Install source from GitHub
To install the source code for Adobe Swatch Exchange Generator:

	git clone git://github.com/skyzyx/adobe-swatch-encoder.git
	cd adobe-swatch-encoder
	wget --quiet http://getcomposer.org/composer.phar
	php composer.phar install -o

### Install source from zip/tarball
Alternatively, you can fetch a [tarball](https://github.com/skyzyx/adobe-swatch-encoder/tarball/master) or [zipball](https://github.com/skyzyx/adobe-swatch-encoder/zipball/master):

    $ curl https://github.com/skyzyx/adobe-swatch-encoder/tarball/master | tar xzv
    (or)
    $ wget https://github.com/skyzyx/adobe-swatch-encoder/tarball/master -O - | tar xzv

### Using a Class Loader
If you're using a class loader (e.g., [Symfony Class Loader](https://github.com/symfony/ClassLoader)) for [PSR-0](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-0.md)-style class loading:

	$loader->registerNamespace('Ase', 'path/to/vendor/Ase/src');


## Contributing
To view the list of existing [contributors](/skyzyx/adobe-swatch-encoder/contributors), run the following command from the Terminal:

	git shortlog -sne --no-merges

### How?
Here's the process for contributing:

1. Fork Adobe Swatch Exchange Generator to your GitHub account.
2. Clone your GitHub copy of the repository into your local workspace.
3. Write code, fix bugs, and add tests with 100% code coverage.
4. Commit your changes to your local workspace and push them up to your GitHub copy.
5. You submit a GitHub pull request with a description of what the change is.
6. The contribution is reviewed. Maybe there will be some banter back-and-forth in the comments.
7. If all goes well, your pull request will be accepted and your changes are merged in.
8. You will become "Internet famous" with anybody who runs `git shortlog` from the Terminal. :)


## Authors, Copyright & Licensing

* Copyright (c) 2007 [Chris Williams](http://www.colourlovers.com)
* Copyright (c) 2013 [Ryan Parman](http://ryanparman.com).

See also the list of [contributors](/skyzyx/adobe-swatch-encoder/contributors) who participated in this project.

Licensed for use under the terms of the [MIT license](http://www.opensource.org/licenses/mit-license.php).
