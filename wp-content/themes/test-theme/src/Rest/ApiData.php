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
	 * @param array query parameters
   * 
   * @return array api data
   */
  public function getApiData(array $queryParams): array
  {
    $apiUrl = $this->apiUrl;
    $apiKey = $this->apiKey;

    if (!empty($queryParams)) {
      $apiUrl = esc_url(add_query_arg($queryParams, $apiUrl));
    }

    $requestArgs = array(
      'headers' => array(
        'Accept' => 'application/json',
        'Authorization' => $apiKey,
      )
    );

    $response = wp_remote_get($apiUrl, $requestArgs);

    return $response;
  }
}
