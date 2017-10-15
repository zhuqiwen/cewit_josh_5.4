<?php
/**
 * Created by PhpStorm.
 * User: zqw
 * Date: 10/14/17
 * Time: 23:41
 */

namespace app\UiHelpers;


class containers
{

	/**
	 * @param $id_suffix
	 * @param array $contents
	 * @return string
	 * contents = [
	 *      id => [
	 *          title => string,
	 *          content => string or html
	 *      ]
	 * ]
	 */
	public static function tabs($id_suffix, $contents = [])
	{
		$tabs = '';
		$content = '';
		$cnt = 0;
		foreach ($contents as $id => $title_and_content)
		{
			$id = $id . '_' . $id_suffix;
			//tabs
			if($cnt == 0)
			{
				$tabs .= '<li class="active">';
				$content .= '<div class="tab-pane fade active in" id="' . $id . '">';
			}
			else
			{
				$tabs .= '<li>';
				$content .= '<div class="tab-pane fade" id="' . $id . '">';
			}
			$tabs .= '<a href="#' . $id . '" data-toggle="tab">';
			$tabs .= $title_and_content['title'] . '</a>';
			$tabs .= '</li>';

			//contents
			$content .= $title_and_content['content'] . '</div>';

			$cnt ++;
		}

		$container = <<<END
		<div class="bs-example" style="margin:0 15px 15px 15px; border-bottom: 1px solid #ddd;">
			<ul class="nav nav-tabs" style="margin-bottom: 15px;">
				$tabs
			</ul>
			<div id="myTabContent" class="tab-content">
				$content
			</div>
		</div>

END;

		return $container;
	}

	public static function panel()
	{
		return __FUNCTION__ . ' container';
	}

	public static function accordion()
	{
		return __FUNCTION__ . ' container';

	}

	public static function carousel()
	{
		return __FUNCTION__ . ' container';

	}

	public static function modal()
	{
		return __FUNCTION__ . ' container';

	}
}