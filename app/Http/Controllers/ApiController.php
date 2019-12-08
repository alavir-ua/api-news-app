<?php

namespace App\Http\Controllers;

use App\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Pagination\LengthAwarePaginator;

class ApiController extends Controller
{
	public function displayNews(Request $request)
	{
		$response = $this->determineMethodHandler($request);

		$urlParams = $response['countryId'] . ':' . $response['categoryId'];

		if (Cache::get('idsPare') !== $urlParams) {
			Cache::put('idsPare', $urlParams, 1 * 60);
			$response['countryName'] = Api::getAllCountries()[$response['countryId']];
			$response['categoryName'] = Api::getAllCategories()[$response['categoryId']];
			$apiModel = new Api;
			$response['sources'] = array_slice($apiModel->fetch($urlParams, 'sources'), 0, 8);
			$response['newsCountries'] = Api::getAllCountries();
			$response['newsCategories'] = Api::getAllCategories();
			Cache::put('response', $response, 1 * 60);
			$news = $apiModel->fetch($urlParams, 'news');
			Cache::put('news', $news, 1 * 60);
		} else {
			$response = Cache::get('response');
			$news = Cache::get('news');
		}
		$response['trending'] = Api::fetchTrending();

		$paginatedItems = $this->paginate($news, $request, 5);

		return view('pages.home', $response, ['news' => $paginatedItems]);
	}


	/**
	 * @param $request
	 * @return mixed
	 */
	protected function determineMethodHandler($request)
	{
		if (isset($request->page)) {

			list($response['countryId'], $response['categoryId']) = explode(":", Cache::get('idsPare'));

		} else if (!isset($request->country) && !isset($request->category)) {

			$response['countryId'] = config('app.default_news_country_id');
			$response['categoryId'] = config('app.default_news_category');

		} else {

			$response['countryId'] = $request->country;
			$response['categoryId'] = $request->category;

		}
		return $response;
	}

	public function paginate($array, $request, $perPage)
	{
		$currentPage = LengthAwarePaginator::resolveCurrentPage();

		$itemCollection = collect($array);

		$currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();

		$paginatedItems = new LengthAwarePaginator($currentPageItems, count($itemCollection), $perPage);

		return $paginatedItems->setPath($request->url());
	}

}
