<?php

/**
* @file providing the service that return current time from defined timezone.
*
*/

namespace  Drupal\custom_timezone;
use Drupal\Core\Datetime\DrupalDateTime;

class DisplayTimezoneTimeServices {
  protected $timezone;

  public function __construct() {
    $config =  \Drupal::config('custom_timezone.settings');
    $this->timezone = $config->get('timezone');
  }

  public function  displayTimezoneTime() {
    if (isset($this->timezone) && !empty($this->timezone)) {
      $current_date_time = new DrupalDateTime("now", new \DateTimeZone($this->timezone));
      return 'Timezone: ' . $this->timezone . ' <br> Current Time: ' . $current_date_time->format('dS M Y - h:i A');
    }
    else {
      return "Timezone not set from admin side.";
    }
  }
}
