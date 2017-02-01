# Learning from Disaster
Using a neural network to predict disaster survival.

## Prerequisites
You'll need to have a web server installed and configured with PHP for this to work. I really recommend [XAMPP](https://www.apachefriends.org/), especially for Windows users. Once you've done that you can proceed.

You'll also need [Node.js](https://nodejs.org/en/) and [npm](https://www.npmjs.com/) installed and working.

## Building
Clone the project down and open the folder in your favourite editor. It's a JetBrains PhpStorm project but you can use whichever paid/free software takes your fancy.

Before anything else, note that this project uses the [Composer](https://getcomposer.org/) package manager. Install composer (see their website) and run:

```
composer install
```

Or alternatively, if you're using the PHAR (make sure the `php.exe` executable is in your PATH):

```
php composer.phar install
```

Then, install the npm packages necessary to build and run the website. Run the following in your terminal in the project root directory:

```
npm install
```

This will install [Bower](https://bower.io/) which will allow you to install the assets the website requires (Bootstrap, jQuery etc.) using the command:

```
bower install
```

Gulp will also have been installed. This will compile the [Less](http://lesscss.org/) and [CoffeeScript](http://coffeescript.org/) into CSS and JavaScript ready for production. Do this using the command:

```
gulp
```

This command will need running again every time you make a change to a Less or CoffeeScript file. If you're working on them, run `gulp watch` in a terminal to watch for file changes and compile accordingly.

## Training
You'll need to run the following commands from the `training` directory to prepare the neural network for use from the web application.

```bash
php filter_data.php # Remove any data we can't work with.
php split_data.php # Randomise filtered data and split into training and testing sets.
php move_data.php # Move data from JSON to Condense database file.
php train_network.php # Train the neural network and save it to a file.
```

## Running
You can run this using PHP's built-in web server for testing purposes if you like. From the web directory:

```bash
php -S localhost:8080
```

Then navigate to `http://localhost:8080/` in your browser.
