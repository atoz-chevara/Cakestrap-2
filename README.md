## CakePHP Twitter Bootstrap Plugin
A Twitter Bootstrap plugin for CakePHP 3.+

#### API Documentation
You can read the API documentation [here](http://www.cmnworks.com/CakePHP3/plugins/Bootstrap/namespace-Bootstrap.View.Helper.html)

#### Installation
###### Using Composer:
1.) You’ll need to download and install Composer if you haven’t done so already. 
  ```php
curl -s https://getcomposer.org/installer | php
 ```
2.) On your CakePHP app go to plugins folder.

3.) Get a new Bootstrap plugin by running:
  ```php
composer require cmnworks/bootstrap
 ```
 
###### Github Repo
  - On GitHub, navigate to your CakePHP plugins directory
  - Clone the repository with this link https://github.com/cmnworks/Bootstrap
 
#### Configuration
  - Navigate to your app config folder
  - Open the bootstrap.php with your favorite editor.
  - Load the plugin by using the codes below

```php
Plugin::load('Bootstrap', ['bootstrap' => true,  'routes' => true]);
```
Template/Layout/default.ctp
###### Bootstrap Asset
  ```php
<?php echo $this->Bootstrap->Asset()->style()?>
 ```
```php
<?php echo $this->Bootstrap->Asset()->script()?>
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

Template/Users/index.ctp
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
#### Sample Output
You can check the plugin html output
[here](http://www.cmnworks.com/CakePHP3/plugins/Bootstrap/sample.php)