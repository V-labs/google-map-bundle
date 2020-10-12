<?php

namespace Vlabs\GoogleMapBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class VlabsGoogleMapExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('vlabs_google_map.config', $config);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources'));
        $loader->load('services.xml');

        if(isset($config['geocoder']))
        {
            $geocoder = $container->getDefinition('vlabs_google_map.service.geocoder');

            if(isset($config['geocoder']['google_api_key'])){
                $geocoder->replaceArgument(0, $config['geocoder']['google_api_key']);
            }
            if(isset($config['geocoder']['google_geocoder_base_url'])){
                $geocoder->replaceArgument(1, $config['geocoder']['google_geocoder_base_url']);
            }
        }
    }
}
