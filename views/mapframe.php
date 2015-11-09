<script src='https://api.mapbox.com/mapbox.js/v2.2.3/mapbox.js'></script>
<link href='https://api.mapbox.com/mapbox.js/v2.2.3/mapbox.css' rel='stylesheet' />
<style>
	    #map {top:0; bottom:0; width: 64vw; height: 32vw; }
</style>

<div id='map'>
</div>

<h1>Mapframe</h1>
<div>
	<h3>$data</h3>
	<pre>
		<?php print_r($data); ?>
	</pre>
</div>
<div>
	<h3>URL variables</h3>
	<pre>
		<?php print_r($data['urlVars']);?>
	</pre>
</div>

<div>
	<h3>GET variables</h3>
	<pre>
		<?php print_r($data['getVars']);?>
	</pre>
</div>