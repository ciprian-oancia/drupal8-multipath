<?php
/**
 * Created by PhpStorm.
 *
 */
namespace Drupal\domains_rewrites_dynamicaly\Plugin\Purl\Provider;

use Drupal\purl\Plugin\Purl\Provider\ProviderAbstract;

/**
 * @PurlProvider(
 *      id="dynamic_provider"
 * )
 */
class DynamicProvider extends ProviderAbstract
{

    public function getModifiers()
    {
        return array(
           \Drupal::configFactory()->getEditable('domains_rewrites_dynamicaly.settings')->get('rewrites_path_prefix') => 1,
        );
    }
}
