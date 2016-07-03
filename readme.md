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

Finally, publish files into resources.

	php artisan vendor:publish --provider="darrenmerrett\ReactSpark\ReactSparkServiceProvider"

## Upgrading

Update the darrenmerrett/react-spark package.

	composer update darrenmerrett/react-spark

Then update the npm modules

	npm update react-spark-js

## Creating your app

Start creating your React app inside 

	resources\assets\js\

Include your React Components into 

	resources\assets\js\index.js i.e. require('./my-component.js');

You can safely edit Blade 'sections' here

	resources\views\react-spark\reactApp.blade.php

Next, add the following to your app blade files. This will include your JS bundle and the Spark nav bar.

	@extends('react-spark.reactApp')

## Building your app

To build your app for development:

	php artisan react-spark:build

To build your app for production

	php artisan react-spark:build --production

To "watch" for file changes whilst your creating your app

	php artisan react-spark:build watch

	php artisan react-spark:build watch --production

## Using Redux 

First, add your [reducers](http://redux.js.org/docs/basics/Reducers.html) in resources\assets\js\reactApp\reducers.js

Access the store dispatch method by adding the following statement after your component.

	YourComponent.contextTypes = { store: React.PropTypes.object };

Then format your constructor as follows

```
constructor(props,context) {

    super(props,context);

}
```

You can now access the store dispatch method as follows

	this.context.store.dispatch(YOUR_ACTION);

To access your store add the dependancy

	import {connect} from 'react-redux';

Then add the following code after your component

```
function mapStateToProps(state) {

  return {
    YOUR_STORE: state.YOUR_STORE,
  };

}

function mapDispatchToProps(dispatch) {
  return {};
}

function mergeProps(stateProps, dispatchProps, ownProps) {

  return Object.assign({}, stateProps, ownProps);
}

export default connect(mapStateToProps, mapDispatchToProps, mergeProps)(YOUR_COMPONENT);
```

You can now access your store through props

	this.props.YOUR_STORE;

## License

Released under the MIT License, see LICENSE.
