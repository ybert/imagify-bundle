# imagify-bundle
This bundle integrates [Imagify PHP](https://github.com/wp-media/imagify-php) in [the Symfony framework](http://symfony.com).

## Installation

Use [Composer](http://getcomposer.org) to install the bundle:

`composer require ybert/imagify-bundle`

Then, update your `app/config/AppKernel.php` file:

```php
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Ybert\ImagifyBundle\YbertImagifyBundle(),
            // ...
        );

        return $bundles;
    }
```

Configure the bundle in `app/config/config.yml`:

```yaml
ybert_imagify:
    apiKey: %imagify_apiKey%
```

Finally, update your `app/config/parameters.yml` file to store your Imagify API credentials:

```yaml
parameters:
    # ...
    imagify_apiKey: MyAPIKey
```

## Usage

The bundle automatically registers a `ybert_imagify.optimizer` service in the Dependency Injection Container. That service is
an instance of `Imagify\Optimizer`.

Example usage in a controller:

```php
// ...

    public function optimizeImage()
    {
        /**
         * Get the Imagify service
         *
         * @var \Imagify\Optimizer $imagify
         */
        $imagify = $this->get('ybert_imagify.optimizer');
        $param = array(
            "level"=> 'ultra',
            "resize"=> array("width"=> 50),
        );
        $image = '1.jpg';
        $result = $imagify->optimize($image, $param);
    }

// ...
}
```

# For further use, please read the [Imagify API documentation](https://imagify.io/docs/api/?php#upload-and-optimize-an-image)
