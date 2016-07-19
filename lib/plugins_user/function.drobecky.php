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
				$separator = ' &raquo;&nbsp;';

		$links = array();

		$trailSize = count($trail);
		for ($i = 0; $i < $trailSize; $i++) {
				$title = $trail[$i]['title'];

				if (isset($trail[$i]['link']) && $i < $trailSize - 1)
						$links[] = '<span itemscope itemtype="http://data-vocabulary.org/Breadcrumb"><a href="'.$trail[$i]['link'].'" title="'.htmlSpecialChars($trail[$i]['title']).'" itemprop="url"><span itemprop="title">'.preg_replace('/ /','&nbsp;',$title).'</span></a></span>';
				else
						$links[] = preg_replace('/ /','&nbsp;',$title);
		}

		return join($separator,$links);
}
