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

### Step 3: Enable custom doctrine types

``` yml
# config/packages/doctrine.yaml
doctrine:
    dbal:
        types:
            lat_lng:  Vlabs\GoogleMapBundle\Utils\DoctrineType\LatLngType
            lat_lng_bounds: Vlabs\GoogleMapBundle\Utils\DoctrineType\LatLngBoundsType
```

### Step 3: Enable jms serializer if needed

``` yml
# config/packages/jms_serializer.yaml
jms_serializer:
    handlers:
    metadata:
        directories:
            address:
                namespace_prefix: Vlabs\GoogleMapBundle
                path: "@VlabsGoogleMapBundle/Resources/config/serializer"
```