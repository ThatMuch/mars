<?
/**
 * Text Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-sections.php' which is triggered by 'sections.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       mars_1.0.0
 *
 */
 ?>
<?php /*  include('../inc/php-graph-sdk-5.x/src/Facebook/autoload.php'); */  // change path as needed	$path = $_SERVER['DOCUMENT_ROOT'];
	$path = get_template_directory()."/inc/php-graph-sdk-5.x/src/Facebook/autoload.php";
	require_once $path;
    $appId = get_sub_field('app_id');
    $pageId = get_sub_field('page_id');
	$accessToken = get_sub_field('access_token');
	$appSecret = get_sub_field('app_secret');
	$fb = new \Facebook\Facebook([
		'app_id' => $appId,
		'app_secret' => $appSecret,
		'default_graph_version' => 'v2.10',
		//'default_access_token' => '{access-token}', // optional
	]);
 	try {
		// Returns a `FacebookFacebookResponse` object
		$response = $fb->get(
		"/" . $pageId . "/events?fields=start_time,name,description,cover&limit=6",
		$accessToken
		);
	} catch(FacebookExceptionsFacebookResponseException $e) {
		echo 'Graph returned an error: ' . $e->getMessage();
		exit;
	} catch(FacebookExceptionsFacebookSDKException $e) {
		echo 'Facebook SDK returned an error: ' . $e->getMessage();
		exit;
	}
	$events = $response->getGraphEdge();
?>

 <section class="section section-event">
 <div class="section__background bg-primary"></div>
	<div class="container">
		<div class="section-event_header">
			<!-- Title -->
			<?php if (get_sub_field('title')) : ?>
				<h2 class="section__title">
					<?php echo  get_sub_field('title'); ?>
				</h2>
			<?php endif; ?>
			<!-- Title -->
		<?php if ( get_sub_field('button') ) : $link = get_sub_field('button'); ?>
			<a class="btn btn-outline-dark" href="<?php echo  $link['url']; ?>">
				<?php echo  $link['title']; ?>
			</a>
		<?php endif; ?>
		</div>
<?php if (count($events) > 0) : ?>
		<div class="row">
		<?php for ($i=0; $i < count($events) ; $i++) { ?>
		<?php $dateEvent = $events[$i]['start_time'] ; ?>
			<div class="col-sm-6 col-md-4">
			<a href="https://facebook.com/events/<?php echo  $events[$i]['id']?>" class="section-event_item card" target="_blank">
					<img class="card-img-top section-event_item_img" src="<?php echo  $events[$i]['cover']['source'] ?>" alt="Card image cap">
					<div class="card-body">
						<div class="section-event_item_content">
							<div class="section-event_item_date">
								<p class="section-event_item_date_month"><?php echo  $dateEvent-> format('M') ?></p>
								<p class="section-event_item_date_day"><?php echo  $dateEvent-> format('d') ?></p>
							</div>
							<div>
							<h5 class="card-title section-event_item_title"><?php echo $events[$i]['name'] ?> </h5>
							<p class="card-text section-event_item_text"><?php echo shorten($events[$i]['description'], 60) ?></p>
							</div>
						</div>
					</div>

			</a>
			</div>
		<?php } ?>
		</div>
		<?php else : ?><p>Il n'y a aucun événements à venir.</p>
		<?php endif; ?>
	</div>
 </section>