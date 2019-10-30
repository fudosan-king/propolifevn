<!-- search-box -->
<?php echo modules::run('search'); ?>

<?php if (is_smartphone() == 'sp'):?>
	<!-- arrival-block -->
	<?php echo modules::run('block/arrival'); ?>

	<!-- promotion -->
	<?php echo modules::run('block/promotion'); ?>

	<!-- voucher -->
	<?php echo modules::run('block/voucher'); ?>
<?php else: ?>
	<!-- promotion -->
	<?php echo modules::run('block/promotion'); ?>

	<!-- voucher -->
	<?php echo modules::run('block/voucher'); ?>

	<!-- arrival-block -->
	<?php echo modules::run('block/arrival'); ?>
<?php endif; ?>

<!-- banner_new-->
<?php echo modules::run('block/banner_new');?>

<!-- three-feature-appartment-home -->
<?php echo modules::run('block/three_feature_appartment_home'); ?>

<!-- introduce-district -->
<?php /*echo modules::run('block/introduce_district');*/ ?>

<!-- benefit-block -->
<?php echo modules::run('block/benefit'); ?>

<?php if (is_smartphone() == 'sp'):?>
	<!-- banner_contact-->
	<?php echo modules::run('block/banner_contact'); ?>
<?php else: ?>
	<!-- banner_contact-->
	<?php echo modules::run('block/banner_contact'); ?>
<?php endif; ?>

<!-- feature-block -->
<?php echo modules::run('block/feature'); ?>

<!-- building buy sell -->
<?php echo modules::run('block/building_buy_sell'); ?>

<!-- website-information -->
<?php echo modules::run('block/website_information'); ?>

<!-- info-apartment -->
<?php /*echo modules::run('block/info_apartment');*/ ?>

<!-- support-block -->
<?php echo modules::run('block/support'); ?>

<!-- introduction-staff-company -->
<?php echo modules::run('block/introduction_staff_company'); ?>

<!-- banner-interior -->
<?php echo modules::run('block/banner_interior'); ?>

<!-- banner-block -->
<?php echo modules::run('block/banner'); ?>

<!-- tags use for seo google -->
<div class="tags-seo-block slideInUp">
	<?php $module = $this->router->fetch_class(); ?>
	<?php if($module == "home" ): ?>
	    <?php echo modules::run('common/tags'); ?>
	<?php endif; ?>
</div>