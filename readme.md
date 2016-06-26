# React Spark

An extension of [Laravel Spark](https://spark.laravel.com) to create Spark projects with [React JS](https://facebook.github.io/react/).

* Provides a blade template for you to extend and create your app using React rather than the incumbant Vue framework.
* Removes boiler plate dependancies that Spark requires.
* Common Nav Bar components work without requiring Bootstrap or Vue frameworks. 
* A custom build script that:
	* Separates common dependancies to reduce file sizes
	* Attaches unique string to each filename to optimise caching
* Spark Core untouched to ensure no future upgrade conflicts

	This does not replace vue components in the Spark core. 

## What does this do?

This extension separates your project into 2 modules. The Spark Core remains as is working with Blade templates, Bootstrap front-end framework and Vue components. Your project will look like it's part of the Spark Core but it will use a separate Blade template which only uses Bootstrap styling and React javascript Library.

## Installation

Require the darrenmerrett/react-spark package in your composer.json and update your dependencies.

	composer require darrenmerrett/react-spark

Install npm modules with dependancies

	npm install react-spark-js

Add the ReactSpark\ServiceProvider to your config/app.php providers array:

	'darrenmerrett\ReactSpark\ReactSparkServiceProvider'

## Building your app

Start building your React app inside 

	resources\assets\js.

Include your React Components into 

	resources\assets\js\index.js i.e. require('./my-component.js');

Next, add the following to your app blade files. This will include your JS bundle and the Spark nav bar.

	@extends('react-spark-vendor::appReact')

To build your app for development:

	php artisan react-spark:build

To build your app for production

	php artisan react-spark:build --production

To "watch" for file changes whilst your creating your app

	php artisan react-spark:build watch

	php artisan react-spark:build watch --production 

## License

Released under the MIT License, see LICENSE.