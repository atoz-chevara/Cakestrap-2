## CakePHP Twitter Bootstrap Plugin
A simple plugin that helps to speed up your application development time.

#### API Documentation
You can read the API documentation [here](http://www.cmnworks.com/CakePHP3/plugins/Bootstrap/namespace-Bootstrap.View.Helper.html)
#### Version
version 1.1.8 (not complete)

#### Installation
  - Clone or download the CakePHP Twitter Bootstrap Plugin
  - Drop it to your CakePHP application i.e app/plugins
  - Edit your config/bootstrap.php and load the Bootstrap plugin
```php
Plugin::load('Bootstrap', ['bootstrap' => true,  'routes' => true]);
```
Template/Layout/default.ctp
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
You can check the sample output
[here](http://www.cmnworks.com/CakePHP3/plugins/Bootstrap/sample.php)