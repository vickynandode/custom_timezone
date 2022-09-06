<?php

/**
 * @file
 * Contains \Drupal\custom_timezone\Plugin\Block\CustomTimezoneBlock.
 */
namespace Drupal\custom_timezone\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;

/**
 * Provides a 'Timezone' block.
 *
 * @Block(
 *   id = "timezone_block",
 *   admin_label = @Translation("Timezone block"),
 *   category = @Translation("Custom timezone block example")
 * )
 */
class CustomTimezoneBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = array();
    //if timezone is found from routeMatch create a markup with displayTimezoneTime.
    if ($service = \Drupal::service('custom_timezone.display_timezone_time')) {
      $build = array(
        '#markup' => $service->displayTimezoneTime(),
        '#cache' => [
          'max-age' => 0,
        ]
      );
    }
    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheTags() {
    //With this when your timezone change your block will rebuild
    if ($service = \Drupal::service('custom_timezone.display_timezone_time')) {
      //if there is Current Time add its cachetag
      return Cache::mergeTags(parent::getCacheTags(), array($service->displayTimezoneTime()));
    }
    else {
      //Return default tags instead.
      return parent::getCacheTags();
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheContexts() {
    //if you depends on \Drupal::routeMatch()
    //you must set context of this block with 'route' context tag.
    //Every new route this block will rebuild
    return Cache::mergeContexts(parent::getCacheContexts(), array('route'));
  }
}
