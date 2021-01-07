<?php
error_reporting(0);

?>
<!-- Welcome message -->
<header class="welcome bg-light">
	<div class="container text-center">
		<!-- Site title -->
		<h1><?php echo $title; ?></h1>

		<!-- Site description -->
		<?php if ($site->description()): ?>
		<p class="lead"><?php echo $site->description(); ?></p>
		<?php endif ?>

		<!-- Custom search form if the plugin "search" is enabled -->
		<?php if (pluginActivated('pluginSearch')): ?>
		<div class="form-inline d-block">
			<input id="search-input" class="form-control mr-sm-2" type="search" placeholder="<?php $language->p('Search') ?>" aria-label="Search">
			<button class="btn btn-outline-primary my-2 my-sm-0" type="button" onClick="searchNow()"><?php $language->p('Search') ?></button>
			<script>
				function searchNow() {
					var searchURL = "<?php echo Theme::siteUrl(); ?>search/";
					window.open(searchURL + document.getElementById("search-input").value, "_self");
				}
				document.getElementById("search-input").onkeypress = function(e) {
					if (!e) e = window.event;
					var keyCode = e.keyCode || e.which;
					if (keyCode == '13') {
						searchNow();
						return false;
					}
				}
			</script>
		</div>
		<?php endif ?>
	</div>
</header>

<?php if (empty($content)): ?>
	<div class="text-center p-4">
	<?php $language->p('No pages found') ?>
	</div>
<?php endif ?>

<!-- Print all the content -->



<?php 

if($pin<>""){


echo "<section class=\"home-page\"><div class=\"container\"><div class=\"row\"><div class=\"col-lg-8 mx-auto\">";

echo "<a class=\"text-dark\" href=\"\"><h2 class=\"title\">&#x1F4D1;</h2></a>";

echo "<p class=\"page-description\">";


echo str_replace("\n","<br>",$pin);

echo "</p></div></div></div></section>";



}

if(isset($_REQ["roam"])){$npa=$_REQ["roam"];}else{$npa=$_REQ["asset"];}

foreach ($listasset as $k=>$v) 

			{
			
			extract($v);

$value=hex2bin($value);

		$key2=strip_tags($key,"");

		if(stristr($key2,"_g") == true or $key=="THEME"){continue;}

		//check re





			$x_value="<h4>[ ".$key2." ]</h4>";

		
			$key=trim($key);
			$keylink=bin2hex($key);

			

		//roam



			if(stristr($value,"decodeURIComponent") == true){
				
				 if(isset($_REQ["tx"])==false){ 

					//$value = strip_tags($value);

					$value = preg_replace("<script[^>]*?>.*?</script>", "", $value);
				
				}
			}
		

	

		$rule="/\[\[([^\]]*)\]\]/i";

		preg_match_all($rule,$value,$results);

		
		
				
		

				foreach ($results[1] as $r) 

				{
					
					//echo $r;
					

					$namecheck=$kpc->keva_group_get($npa,$r);

					$ntx=$namecheck["txid"];

					if($namecheck["value"]!="") 
		
						{
						$nplink="<a href=\"/bludit/?theme=roam&asset=k".$namecheck["height"]."&roam=".$namecheck["namespace"]."&tx=".substr($ntx,0,10)."\">".$r."</a>";
						$value=str_replace($r,$nplink,$value);
						}


				}

								
if(isset($_REQ["tx"])){if(stristr($txx,$_REQ["tx"]) == false){continue;}}				



//showall



			$valuex=str_replace("\n","<br>",$value);


?>

<section class="home-page">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 mx-auto">

				<!-- Load Bludit Plugins: Page Begin -->
				<?php Theme::plugins('pageBegin'); ?>

				<!-- Page title -->
				<a class="text-dark" href="<?php echo "/bludit/?theme=roam&asset=k".$heightx."&roam=".$gnamespace."&tx=".substr($txx,0,10); ?>">
					<h2 class="title"><?php echo $key; ?></h2>
				</a>

				<!-- Page description -->
				
				<p class="page-description"><?php echo $valuex; ?><br>
				
			
				</p>
			

				<!-- Page content until the pagebreak -->
				<div>
				
				</div>

				<!-- Shows "read more" button if necessary -->
				<?php if ($page->readMore()): ?>
				<div class="text-right pt-3">
				<a class="btn btn-primary btn-sm" href="<?php echo $page->permalink(); ?>" role="button"><?php echo $L->get('Read more'); ?></a>
				</div>
				<?php endif ?>

				<!-- Load Bludit Plugins: Page End -->
				<?php Theme::plugins('pageEnd'); ?>
			</div>
		</div>
	</div>
</section>

<?php 	} ?>

<!-- Pagination -->
<?php if (Paginator::numberOfPages()>1): ?>
<nav class="paginator">
	<ul class="pagination flex-wrap justify-content-center">

		<!-- Previous button -->
		<?php if (Paginator::showPrev()): ?>
		<li class="page-item mr-2">
			<a class="page-link" href="<?php echo Paginator::previousPageUrl() ?>" tabindex="-1">&#9664; <?php echo $L->get('Previous'); ?></a>
		</li>
		<?php endif; ?>

		<!-- Home button -->
		<li class="page-item <?php if (Paginator::currentPage()==1) echo 'disabled' ?>">
			<a class="page-link" href="<?php echo Theme::siteUrl() ?>"><?php echo $L->get('Home'); ?></a>
		</li>

		<!-- Next button -->
		<?php if (Paginator::showNext()): ?>
		<li class="page-item ml-2">
			<a class="page-link" href="<?php echo Paginator::nextPageUrl() ?>"><?php echo $L->get('Next'); ?> &#9658;</a>
		</li>
		<?php endif; ?>
	</ul>
</nav>
<?php endif ?>
