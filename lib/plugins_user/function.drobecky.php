<?php
function smarty_function_drobecky($params)
{
		if (isset($params['trail']) && is_array($params['trail']))
				$trail = &$params['trail'];
		else
				$trail = array();

		if (isset($params['separator']))
				$separator = $params['separator'];
		else
				$separator = ' &raquo; ';

		$length = (int) $params['length'];

		$links = array();

		$trailSize = count($trail);
		for ($i = 0; $i < $trailSize; $i++) {
				$title = $trail[$i]['title'];

				if (isset($trail[$i]['link']) && $i < $trailSize - 1)
						$links[] = '<a href="'.$trail[$i]['link'].'" title="'.htmlSpecialChars($trail[$i]['title']).'">'.$title.'</a>';
				else
						$links[] = $title;
		}

		return join($separator,$links);
}
?>
