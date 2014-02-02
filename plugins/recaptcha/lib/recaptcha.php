            <?php 
            require_once SCRIPTBASE.'plugins/recaptcha/lib/recaptcha-php-1.11/recaptchalib.php';
            require_once SCRIPTBASE.'plugins/recaptcha/lib/site_lib.php';
            require_once SCRIPTBASE.'_lib/_base/basics.php';
            if(!defined('RECAPTCHA_PRIVATE'))
                define('RECAPTCHA_PRIVATE','6LcDOeASAAAAAEH4cTy34Bawv4AsDvY7PPdnCNS_'); // place private key here
            if(!defined('RECAPTCHA_PUBLIC'))
                define('RECAPTCHA_PUBLIC','6LcDOeASAAAAAAxAnLzfr81dFMbWTtlejwRSE9CZ'); // place public key here