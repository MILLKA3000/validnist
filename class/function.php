<? 
	function js_str($s) {
	return '"'.addcslashes($s, "\0..\37\"\\").'"';
	}
	function js_array($array) {
	$temp=array();
	foreach ($array as $value)
		$temp[] = js_str($value);
	return '['.implode(',', $temp).']';
	}
	function cleanDir($dir) {
    $files = glob($dir."/*");
    $c = count($files);
    if (count($files) > 0) {
        foreach ($files as $file) {      
            if (file_exists($file)) {
            unlink($file);
            }   
        }
    }
	}
?>