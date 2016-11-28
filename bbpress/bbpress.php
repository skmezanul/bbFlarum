<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title>
    <?php if(is_archive('forum')) : ?>
    <?php bloginfo('name'); ?> - <?php bloginfo('description'); ?><?php else : ?>
    <?php the_title();?> - <?php bloginfo('name'); ?>
    <?php endif; ?>
    </title>
    <meta name="revisit-after" content="1 days">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/bbpress/css/bbpress.css" type="text/css" media="screen">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/bbpress/style.css" type="text/css" media="screen">
    <link href="<?php echo get_template_directory_uri(); ?>/bbpress/img/favicon.png" rel="icon" type="image/x-icon">
</head>
<?php flush(); ?>
<body>

<nav class="navbar navbar-default  navbar-fixed-top">
<div class="container">
<div class="navbar-header">
    <?php if (is_user_logged_in()) : ?>
        <ul class="nav navbar-nav navbar-toggle">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle navbar-gravatar" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <?php echo get_avatar(wp_get_current_user()->user_email, 34 ); ?> <?php echo wp_get_current_user()->display_name; ?>
                </a>
                <ul class="dropdown-menu">
                    <li <?php if (bbp_is_single_user_edit()) { echo ' class="active"'; } ?>><a href="<?php echo bbp_get_user_profile_url( get_current_user_id() ); ?>"><i class="fa fa-user" aria-hidden="true"></i> <?php _e( 'Profile', 'bbpress' ); ?></a></li>
                    <li><a href="<?php echo bbp_get_user_profile_url( get_current_user_id() ); ?>edit"><i class="fa fa-cog" aria-hidden="true"></i> <?php _e( 'Settings', 'bbpress' ); ?></a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo wp_logout_url(); ?>"><i class="fa fa-sign-out"></i> <?php _e( 'Log Out', 'bbpress' ); ?></a></li>
                </ul>
            </li>
        </ul>
    <?php else : ?>

<div class="btn-group navbar-btn navbar-toggle">
<a class="btn btn-default" data-toggle="modal" data-target="#prijava"><?php _e( 'Log In', 'bbpress' ); ?></a>
<a class="btn btn-danger" data-toggle="modal" data-target="#registracija"><?php _e( 'Register', 'bbpress' ); ?></a>
</div>
    <?php endif; ?>

<a class="navbar-brand" href="<?php echo esc_url(home_url(bbp_get_root_slug())); ?>" title="<?php bloginfo('name'); ?>" data-toggle="tooltip" data-placement="bottom"></a>
</div>

<div class="collapse navbar-collapse" id="navmeni">

<?php if ( bbp_allow_search() ) : ?>
<form role="search" method="get" id="bbp-searchform" action="<?php echo esc_url( home_url(bbp_get_root_slug()) ); ?>" class="pretraga navbar-form navbar-nav hidden-xs hidden-sm">
<div class="form-group has-feedback has-feedback-left">
<input data-toggle="tooltip" data-placement="right" title="<?php _e( 'Search', 'bbpress' ); ?>" type="text" name="ts" id="ts" size="30" class="form-control">
<span class="fa fa-search form-control-feedback" aria-hidden="true"></span>
</div>
</form>
<?php endif; ?>

<?php if (is_user_logged_in()) : ?>
<ul class="nav navbar-nav navbar-right hidden-xs hidden-sm">
<li class="dropdown">
<a href="#" class="dropdown-toggle navbar-gravatar" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
<?php echo get_avatar(wp_get_current_user()->user_email, 34 ); ?> <?php echo wp_get_current_user()->display_name; ?>
</a>
<ul class="dropdown-menu">
<li <?php if (bbp_is_single_user_edit()) { echo ' class="active"'; } ?>><a href="<?php echo bbp_get_user_profile_url( get_current_user_id() ); ?>"><i class="fa fa-user" aria-hidden="true"></i> <?php _e( 'Profile', 'bbpress' ); ?></a></li>
<li><a href="<?php echo bbp_get_user_profile_url( get_current_user_id() ); ?>edit"><i class="fa fa-cog" aria-hidden="true"></i> <?php _e( 'Settings', 'bbpress' ); ?></a></li>
<li role="separator" class="divider"></li>
<li><a href="<?php echo wp_logout_url(); ?>"><i class="fa fa-sign-out"></i> <?php _e( 'Log Out', 'bbpress' ); ?></a></li>
</ul>
</li>
</ul>
<?php else : ?>
<div class="btn-group navbar-btn pull-right hidden-xs hidden-sm">
    <a class="btn btn-default" data-toggle="modal" data-target="#prijava"><?php _e( 'Log In', 'bbpress' ); ?></a>
    <a class="btn btn-danger" data-toggle="modal" data-target="#registracija"><?php _e( 'Register', 'bbpress' ); ?></a>
</div>
<?php endif; ?>

</div>
</div>
</nav>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="container"><?php the_content(); ?></div>
<?php endwhile; ?><?php endif; ?>

<footer>
<div class="container">
<div class="copyright text-right"><hr><a href="http://www.github.com/Sceko/White" target="_blank" title="Powered by bbPress">Powered by bbPress</a></div>
</div>
</footer>


<?php if (is_user_logged_in()) : ?>
<?php else : ?>
    <div class="modal fade" id="prijava" tabindex="-1" role="dialog" aria-labelledby="prijava" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center" id="prijava">Prijavi se</h4>
                </div>
                <div class="modal-body">
                    <form name="login-form" role="form" action="<?php echo site_url( 'wp-login.php', 'login_post' ) ?>" method="post">
                        <div class="form-group">
                            <input type="text" name="log" class="form-control" placeholder="Korisničko ime">
                        </div>
                        <div class="form-group">
                            <input type="password" name="pwd" class="form-control" placeholder="Lozinka">
                        </div>
                        <p>
                            <a href="<?php echo wp_lostpassword_url(); ?>" title="Zaboravili ste lozinku?">Zaboravili ste lozinku?</a>
                        </p>
                        <div class="form-group">
                            <button type="submit" name="wp-submit" class="btn btn-block btn-success">Prijava</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="registracija" tabindex="-1" role="dialog" aria-labelledby="registracija" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="registracija">Registruj se</h4>
                </div>
                <div class="modal-body">
                    <form name="login-form" role="form" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
                        <div class="form-group">
                            <input type="text" name="user_login" class="form-control" placeholder="Korisničko ime">
                        </div>
                        <div class="form-group">
                            <input type="text" name="user_email" class="form-control" placeholder="E-pošta">
                        </div>
                        <p>
                        <div class="alert alert-warning">Lozinka će vam biti poslata.</div>
                        </p>
                        <button type="submit" name="user-submit" class="btn btn-block btn-success">Završi registraciju</button>
                        <input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?register=true" />
                        <input type="hidden" name="user-cookie" value="1">
                    </form>

                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="<?php echo get_template_directory_uri(); ?>/bbpress/jquery-ias.min.js"></script>

<?php wp_footer(); ?>

<script>
var ias = jQuery.ias({
    container:  '#content',
    item:       '.load',
    pagination: '.pagination',
    next:       '.pagination span.current + a.page-numbers',
});
ias.extension(new IASSpinnerExtension({
    src: '<?php echo get_template_directory_uri(); ?>/bbpress/img/loading.gif',
    html: '<div class="container ias-spinner" style="text-align: left;"><img src="{src}"/></div>',
}));
</script>

<script>
    $(function () { $('[data-toggle="tooltip"]').tooltip() });
    $(document).ready(
        function() {
            if(window.location.href.indexOf("#new-post") > -1) {
                $("#new-post").fadeToggle();
            }
            $(".zapocni-temu").click(function() {
                $("#new-post").fadeToggle();
            });
            $(".bbp-topic-reply-link").click(function() {
                $("#new-post").fadeToggle();
            });
        });

    $(document).ready(function() {
        $(".zatvori").click(function() {
            $("#new-post").fadeOut();
        });
    });

    $(".poruka p img").addClass("img-responsive")


</script>

</body>
</html>