<?php
/*サニタイジング用関数*/
function h($v){
return htmlspecialchars($v,ENT_QUOTES);

}



