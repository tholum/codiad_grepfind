<input class="grepfind_search" onchange="grepfind.search($(this).val(),'<?php echo $_REQUEST['path']; ?>')" />
<div class="grepfind_results" style="overflow-x: hidden;width: 100%;white-space:nowrap;"></div>
<a onclick="modal.unload()" ><button >Close</button></a>