VlabsGoogleMapBundle
================

Installation
------------

### Step 1: Download the bundle

Open your command console, browse to your project and execute the following:

```sh
$ composer require vlabs/google-map
```

### Step 2: Enable the bundle

``` php
// config/bundles.php
public function registerBundles()
{
    return array(
        // ...
        Vlabs\GoogleMap\GoogleMapBundle::class => ['all' => true],
    );
}
```
