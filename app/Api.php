<?php

namespace App;

use App\Helpers\Helper;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Api
 * @package App
 */
class Api extends Model
{

	/**
	 * @return mixed
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	static public function fetchTrending()
	{
		$sources = ['abc-news','ars-technica','associated-press','axios','bloomberg','breitbart-news','cbs-news','cnbc','cnn','fox-news','google-news','hacker-news','national-geographic','nbc-news','newsweek','recode','reuters','techcrunch','the-hill','the-new-york-times','the-next-web','the-wall-street-journal','the-washington-post','the-washington-times','time','usa-today','vice-news',];

		$urlParams = 'everything?sources='.trim($sources[rand(0, count($sources) - 1)]).'&language=en&sortBy=popularity';
		$response = (new Helper)->makeApiCalls($urlParams);

		return Arr::get($response, 'articles');

	}


	/**
	 * @param $newsSource
	 * @return mixed
	 * @throws \GuzzleHttp\Exception\GuzzleException
	 */
	public function fetch($urlParams, $type)
	{
		list($split_input['countryId'], $split_input['categoryId']) = explode(":", $urlParams);

		if ($type === 'news') {

			$urlParams = 'top-headlines?country=' . $split_input['countryId'] . '&category=' . $split_input['categoryId'] . '&pageSize=40';

			$response = (new Helper)->makeApiCalls($urlParams);

			return Arr::get($response, 'articles');

		} else if ($type === 'sources') {

			$urlParams = 'sources?country=' . $split_input['countryId'] . '&category=' . $split_input['categoryId'];

			$response = (new Helper)->makeApiCalls($urlParams);

			return Arr::get($response, 'sources');
		}

	}

	static function getAllCountries()
	{
		return
			[
				'ar' => 'Argentina',
				'au' => 'Australia',
				'at' => 'Austria',
				'be' => 'Belgium',
				'br' => 'Brazil',
				'bg' => 'Bulgaria',
				'ca' => 'Canada',
				'cn' => 'China',
				'co' => 'Colombia',
				'cu' => 'Cuba',
				'cz' => 'Czech Republic',
				'eg' => 'Egypt',
				'fr' => 'France',
				'de' => 'Germany',
				'gr' => 'Greece',
				'hk' => 'Hong Kong',
				'hu' => 'Hungary',
				'in' => 'India',
				'id' => 'Indonesia',
				'ie' => 'Ireland',
				'il' => 'Israel',
				'it' => 'Italy',
				'jp' => 'Japan',
				'kr' => 'Korea',
				'lv' => 'Latvia',
				'lt' => 'Lithuania',
				'my' => 'Malaysia',
				'mx' => 'Mexico',
				'ma' => 'Morocco',
				'nl' => 'Netherlands',
				'nz' => 'New Zealand',
				'ng' => 'Nigeria',
				'no' => 'Norway',
				'ph' => 'Philippines',
				'pl' => 'Poland',
				'pt' => 'Portugal',
				'ro' => 'Romania',
				'ru' => 'Russian Federation',
				'sa' => 'Saudi Arabia',
				'rs' => 'Serbia',
				'sg' => 'Singapore',
				'sk' => 'Slovakia',
				'si' => 'Slovenia',
				'za' => 'South Africa',
				'se' => 'Sweden',
				'ch' => 'Switzerland',
				'tw' => 'Taiwan',
				'th' => 'Thailand',
				'tr' => 'Turkey',
				'ua' => 'Ukraine',
				'us' => 'United States',
				've' => 'Venezuela',
			];
	}

	static function getAllCategories()
	{
		return
			[
				'general' => 'General',
				'entertainment' => 'Entertainment',
				'health' => 'Health',
				'science' => 'Science',
				'sports' => 'Sports',
				'technology' => 'Technology',
				'business' => 'Business'
			];
	}

}
