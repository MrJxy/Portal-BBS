<?php

//加载全局配制
include_once('./config.php');

//进行请求分发(dispatch)
include_once(BBS_ROOT.'/src/include/lib/dispatcher.php');

//输出
include_once(BBS_TEMPLATE.'/header.html');
include_once(BBS_TEMPLATE.'/search.html');
include_once(BBS_TEMPLATE.'/announcement.html');
include_once(BBS_TEMPLATE.'/official.html');
include_once(BBS_TEMPLATE.'/hot.html');
include_once(BBS_TEMPLATE.'/forum.html');
include_once(BBS_TEMPLATE.'/footer.html');


exit(0);
?>
