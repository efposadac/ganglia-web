<?php
$tpl = new Dwoo\Template\File( template("footer.tpl") );
$data = new Dwoo\Data(); 
$data->assign("webfrontend_version", $version["webfrontend"]);

if (isset($_GET["hide-hf"]) && filter_input(INPUT_GET, "hide-hf", FILTER_VALIDATE_BOOLEAN, ["flags" => FILTER_NULL_ON_FAILURE])) {
  $data->assign("hide_footer", true);
}

if ($version["rrdtool"]) {
   $data->assign("rrdtool_version", $version["rrdtool"]);
}

$backend_components = ["gmetad", "gmetad-python", "gmond"];

foreach ($backend_components as $backend) {
   if (isset($version[$backend])) {
      $data->assign("webbackend_component", $backend);
      $data->assign("webbackend_version", $version[$backend]);
      break;
   }
}

$data->assign("parsetime", sprintf("%.4f", $parsetime) . "s");

echo $dwoo->get($tpl, $data);
?>
