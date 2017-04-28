<?php

namespace Drupal\purl\Plugin;

use Drupal\Component\Plugin\Factory\DefaultFactory;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;

class ContextProviderManager extends DefaultPluginManager implements ContextProviderManagerInterface
{
    public function __construct(
        \Traversable $namespaces,
        CacheBackendInterface $cacheBackend,
        ModuleHandlerInterface $moduleHandler
    ) {
        parent::__construct(
            'Plugin/Purl/Context',
            $namespaces,
            $moduleHandler,
            'Drupal\purl\Plugin\Context\ContextInterface',
            'Drupal\purl\Annotation\PurlContext'
        );
        $this->setCacheBackend($cacheBackend, 'purl_context_plugins');
    }

    /**
     * @param string $id
     * @return Drupal\purl\Plugin\Purl\Context\ContextProviderInterface
     */
    public function getContextProvider($id)
    {
        // TODO: Implement getContextProvider() method.
    }

    /**
     * @param string $id
     * @return Drupal\purl\Plugin\Purl\Context\ContextProviderInterface
     */
    public function hasContextProvider($id)
    {
        // TODO: Implement hasContextProvider() method.
    }
}
