<?php

/**
 * The class register route for $className endpoint
 *
 * @package TestTheme\Rest\Routes
 */

declare(strict_types=1);

namespace TestTheme\Rest\Routes;

use TestThemeVendor\EightshiftLibs\Rest\Routes\AbstractRoute;
use TestThemeVendor\EightshiftLibs\Rest\CallableRouteInterface;
use WP_REST_Request;
use TestTheme\Config\Config;
use TestTheme\Rest\ApiData;

/**
 * Class TestRouteRoute
 */
class TestRouteRoute extends AbstractRoute implements CallableRouteInterface
{

	/**
	 * API json object
	 * 
	 * @var object
	 */
	private $apiData;

	/**
	 * Create a new ApiData instance.
	 */
	public function __construct(ApiData $response)
	{
		$this->apiData = $response;
	}

	/**
	 * Method that returns project Route namespace.
	 *
	 * @return string Project namespace TestThemeVendor\for REST route.
	 */
	protected function getNamespace(): string
	{
		return Config::getProjectRoutesNamespace();
	}

	/**
	 * Method that returns project route version.
	 *
	 * @return string Route version as a string.
	 */
	protected function getVersion(): string
	{
		return Config::getProjectRoutesVersion();
	}

	/**
	 * Get the base url of the route
	 *
	 * @return string The base URL for route you are adding.
	 */
	protected function getRouteName(): string
	{
		return '/test-route';
	}

	/**
	 * Get callback arguments array
	 *
	 * @return array Either an array of options for the endpoint, or an array of arrays for multiple methods.
	 */
	protected function getCallbackArguments(): array
	{
		return [
			'methods' => static::READABLE,
			'callback' => [$this, 'routeCallback'],
			'permission_callback' => '__return_true'
		];
	}

	/**
	 * Method that returns rest response
	 *
	 * @param WP_REST_Request $request Data got from endpoint url.
	 *
	 * @return WP_REST_Response|mixed If response generated an error, WP_Error, if response
	 *                                is already an instance, WP_HTTP_Response, otherwise
	 *                                returns a new WP_REST_Response instance.
	 */
	public function routeCallback(WP_REST_Request $request)
	{
		$requestParams = $this->sanitizeRequestParameters($request->get_params());
		$response = $this->apiData->getApiData($requestParams);

		return $response;
	}

	/**
	 * Method that returns sanitized request parameters
	 *
	 * @param array request parameters
	 *
	 * @return array sanitized parameters
	 */
	private function sanitizeRequestParameters(array $requestParams): array
	{
		$sanitizedRequestParams = [];

		foreach ($requestParams as $key => $value)
		{
			$sanitizedRequestParams[$key] = stripslashes(sanitize_text_field($value));
		}

		return $sanitizedRequestParams; 
	}
}
