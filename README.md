## CakePHP Twitter Bootstrap Plugin
A Twitter Bootstrap plugin for CakePHP 3.+

#### API Documentation
You can read the API documentation [here](http://www.cmnworks.com/CakePHP3/plugins/Bootstrap/namespace-Bootstrap.View.Helper.html)

#### Requirements
- CakePHP version >= 3.+
- Php >=5.4
- Composer

#### Installation
You can get this plugin using composer or by cloning the repository.

###### Using Composer:
1.) You�ll need to download and install Composer if you haven�t done so already. 
  ```php
curl -s https://getcomposer.org/installer | php
 ```
2.) On your CakePHP app navigate to src/plugins folder.

3.) Get this plugin by running the codes in console:
  ```php
composer require cmnworks/bootstrap:*
 ```
###### Cloning Repository:
  - Navigate to your CakePHP src/plugins directory
  - Clone the repository using this link https://github.com/cmnworks/Bootstrap
 
#### Configuration
  - Locate your src/config folder.
  - Open the bootstrap.php file with your favorite editor.
  - At the very bottom, load the plugin by using the codes below

```php
Plugin::load('Bootstrap', ['bootstrap' => true,  'routes' => true]);
```
src/Template/Layout/default.ctp
###### Bootstrap Asset
Add the codes below inside html head.
```php
<head>
<?php echo $this->Bootstrap->Asset()->style()?>
</head>
 ```
 Add the codes below before body end tag.
```php
<?php echo $this->Bootstrap->Asset()->script()?>
 </body>
 ```
###### Example:
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $this->Bootstrap->Asset()->style()?>
  </head>
<body>
<?php echo $this->fetch('content')?>
<?php echo $this->Bootstrap->Asset()->script()?>
</body>
</html>
```
src/Controller/UsersController.php

Declare the plugin to var $helpers

```php
public $helpers = ['Bootstrap.Bootstrap'];
 ```
 
###### Example:
```php
<?php
namespace App\Controller;
class UsersController extends AppController
{
    public $helpers = ['Bootstrap.Bootstrap'];
    public function initialize()
    {
        parent::initialize();
        $this->viewBuilder()->layout('default');
    }
    public function index() 
    {
    }
}
```

src/Template/Users/index.ctp
```php
 <?php
 echo $this->Bootstrap->Tab()
                      ->nav('Tab 1')
                      ->content("This Tab 1  needs your attention.")
                      ->prepare($isActive = true)

                      ->nav('Tab 2')
                      ->content("This Tab 2 needs your attention.")
                      ->prepare()

                      ->set()
 ?>
```

###### Autoloading Plugin Classes:
Modify your application�s composer.json file and add the Bootstrap plugin details like the following information below.
```php
   "autoload": {
        "psr-4": {
			"Bootstrap\\": "./plugins/Bootstrap/src"
        }
    },
```
Additionally, you will need to tell Composer to refresh its autoloading cache:
```php
$ php composer.phar dumpautoload
```

#### Sample Output
You can check the plugin html output
[here](http://www.cmnworks.com/CakePHP3/plugins/Bootstrap/sample.php)