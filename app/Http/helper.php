<?php



if (!function_exists('load_dep')) {
	function load_dep($select = null, $dep_hide = null)
	{

		$departments = \App\Models\DesignDep::whereHas('translations', function ($query) {
			$query
				->selectRaw('name as text')
				->selectRaw('id as id')
				->selectRaw('parent as parent')
				->get(['text', 'parent', 'id']);
		});

		$dep_arr = [];
		foreach ($departments as $department) {
			$list_arr             = [];
			$list_arr['icon']     = '';
			$list_arr['li_attr']  = '';
			$list_arr['a_attr']   = '';
			$list_arr['children'] = [];

			if ($select !== null and $select == $department->id) {

				$list_arr['state'] = [
					'opened'   => true,
					'selected' => true,
					'disabled' => false,
				];
			}

			if ($dep_hide !== null and $dep_hide == $department->id) {

				$list_arr['state'] = [
					'opened'   => false,
					'selected' => false,
					'disabled' => true,
					'hidden'   => true,
				];
			}

			$list_arr['id']     = $department->id;
			$list_arr['parent'] = $department->parent > 0 ? $department->parent : '#';
			$list_arr['text']   = $department->text;
			array_push($dep_arr, $list_arr);
		}

		return json_encode($dep_arr, JSON_UNESCAPED_UNICODE);
	}
}


if (!function_exists('make_slug')) {
	// Slug
	function make_slug($string, $separator = '-')
	{
		if (is_null($string)) {
			return "";
		}

		$string = trim($string);

		$string = mb_strtolower($string, "UTF-8");;

		$string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

		$string = preg_replace("/[\s-]+/", " ", $string);

		$string = preg_replace("/[\s_]/", $separator, $string);

		return $string;
	} // End of Slug
}
