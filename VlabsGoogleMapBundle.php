<?php

namespace Vlabs\GoogleMapBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Vlabs\GoogleMapBundle\DependencyInjection\Compiler\ValidatorPass;

class VlabsGoogleMapBundle extends Bundle
{

    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new ValidatorPass());
    }
}
