<?php 
define('FACEBOOK_SDK_V4_SRC_DIR', __DIR__ . '/facebook-sdk-v5/');
require_once __DIR__ . '/facebook-sdk-v5/autoload.php';
?>
<p>
    <a href="<?php echo base_url('Login/fblogin');?>">Login with Facebook</a>
</p>