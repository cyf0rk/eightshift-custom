<?php

/**
 * The file that is an ApiData class.
 *
 * @package TestTheme\Rest;
 */

declare(strict_types=1);

namespace TestTheme\Rest;

/**
 * ApiData class.
 */
class ApiData implements ApiDataInterface
{
  /**
   * API url constant
   *
   * @var string
   */
  private $apiUrl;

	/**
	 * Create a new ApiData instance.
	 */
  public function __construct()
  {
    $this->apiUrl = API_URL;
  }

	/**
	 * Register all hooks
   * 
   * @return void
	 */
  public function register(): void
  {
    \add_action('get_api_data', [$this, 'getApiData']);
  }

  /**
   * Get data from an api
   *
	 * @param array query parameters
   *
   * @return array api response data
   */
  public function getApiData(array $queryParams): array
  {
    $apiUrl = $this->apiUrl;
    $numOfArticles = $queryParams['pageSize'] ?? 4;

    if (!empty($queryParams)) {
      $apiUrl = esc_url(add_query_arg($queryParams, $apiUrl));
    }

    $response = wp_remote_get($apiUrl);
    $response = json_decode(wp_remote_retrieve_body($response));
    $response = $this->sanitizeResponse($response->data);
    $response = array_slice($response, 0, $numOfArticles);

    return $response;
  }

  /**
   * Sanitize api response data
   *
	 * @param array api response data
   *
   * @return array sanitized api response data
   */
  private function sanitizeResponse(array $response): array
  {
    foreach ($response as $key => $value) {
      if (is_string($value)) {
        $response[$key] = wp_strip_all_tags($value);
      } elseif (is_array($value)) {
        $this->sanitizeResponse($value);
      }
    }

    return $response;
  }
}