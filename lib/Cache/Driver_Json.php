<?php

function g_cache_exists() {
	global $conf;
	return file_exists( $conf['cachefile'] );
} // end function g_cache_exists

function g_cache_serialize($data) {
	global $conf;
	file_put_contents($conf['cachefile'], json_encode($data, JSON_THROW_ON_ERROR));
	file_put_contents($conf['cachefile'] . "_cluster_data", json_encode($data["cluster"], JSON_THROW_ON_ERROR));
	file_put_contents($conf['cachefile'] . "_host_list", json_encode($data["hosts"], JSON_THROW_ON_ERROR));
	file_put_contents($conf['cachefile'] . "_metric_list", json_encode(array_keys($data["metrics"]), JSON_THROW_ON_ERROR));
} // end function g_cache_serialize

function g_cache_deserialize($index) {
	global $conf;
        $index_array = [];

        switch ( $index ) {

           case "hosts_and_metrics":
	       $index_array["cluster"] = json_decode(file_get_contents($conf['cachefile'] . "_cluster_data"), TRUE, 512, JSON_THROW_ON_ERROR);
	       $index_array["hosts"] = json_decode(file_get_contents($conf['cachefile'] . "_host_list"), TRUE, 512, JSON_THROW_ON_ERROR);
	       $index_array["metrics"] = json_decode(file_get_contents($conf['cachefile'] . "_metric_list"), TRUE, 512, JSON_THROW_ON_ERROR);
               break;

           case "metric_list":
	       $index_array["metric_list"] = json_decode(file_get_contents($conf['cachefile'] . "_" . $index), TRUE, 512, JSON_THROW_ON_ERROR);
               break;

           default:
	       $index_array = json_decode(file_get_contents($conf['cachefile']), TRUE, 512, JSON_THROW_ON_ERROR);

        }
	return $index_array;
} // end function g_cache_deserialize

function g_cache_expire () {
	global $conf;
	$time_diff = time() - filemtime($conf['cachefile']);
	return $time_diff;
} // end function g_cache_expire

?>
