<?php

namespace Vlabs\GoogleMapBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Finder\Finder;

class ValidatorPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $validatorBuilder = $container->getDefinition('validator.builder');
        $validatorFiles   = [];
        $finder           = new Finder();

        foreach ($finder->files()->in(__DIR__ . '/../../Validation')->name('*.yml') as $file) {
            $validatorFiles[] = $file->getRealPath();
        }

        $validatorBuilder->addMethodCall('addYamlMappings', [$validatorFiles]);
    }
}