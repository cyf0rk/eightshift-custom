<?php

/**
 * The class for fetching data from public api
 *
 * @package TestTheme\Rest
 */

declare(strict_types=1);

namespace TestTheme\Rest;

/**
 * Class ApiData
 */
class ApiData
{
  /**
   * API url constant
   * 
   * @var string
   */
  private $apiUrl;

  /**
   * API key constant
   * 
   * @var string
   */
  private $apiKey;

	/**
	 * Create a new ApiData instance.
	 */
  public function __construct()
  {
    $this->apiUrl = API_URL;
    $this->apiKey = API_KEY;
  }

  /**
   * Get data from an api
   * 
   * @return object json object
   */
  public function getApiData(array $queryParams): object
  {
    $apiUrl = $this->apiUrl;
    $apiKey = $this->apiKey;

    if (!empty($queryParams)) {
      $apiUrl = add_query_arg($queryParams, $apiUrl);
    }

    $response = wp_remote_get($apiUrl, array(
      'headers' => array(
        'Authorization' => $apiKey
      )
    ));

    return $response;
  }
}
