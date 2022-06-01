<?php

/**
 * The file that is interface for ApiData class.
 *
 * @package TestTheme\Rest;
 */
declare(strict_types=1);

namespace TestTheme\Rest;

/**
 * ApiData interface.
 */
interface ApiDataInterface
{
  /**
   * Get data from an api
   *
	 * @param array query parameters
   *
   * @return array api data
   */
  public function getApiData(array $queryParams): array;
}