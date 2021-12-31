<?php
namespace Wamb\TaggingBundle\DependencyInjection;

use Exception;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * SecurityHeadersExtension
 */
class TaggingExtension extends Extension
{
    /**
     * @throws Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
       //$loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
       $loader = new XmlFileLoader($container, new FileLocator('@WambTaggingBundle/Resources/config'));
       $loader->load('services.xml');
        /*$configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        foreach ($config as $key => $value) {
            $container->setParameter('tagging_bundle.' . $key, $value);
        }  */
    }
}