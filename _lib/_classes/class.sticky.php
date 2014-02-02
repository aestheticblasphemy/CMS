<?php

class sticky {
    public $elements;
    private $login_member;
    
    public function sticky()
    {
        global $url;
            //Check if the Login Form has been filled?
            //Check only if session is not set
            
            if(isset($_POST['login_home']))
            {
                //The Login Button was clicked, check if Username and Password were filled
                if((isset($_POST['email'])&& filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) && isset($_POST['password']))
                {
                    $password = md5($_POST['email'].'|'.$_POST['password']);
                    $r=db_row(
                        'select * from ab_admin_users where
                        admin_user_email="'.addslashes($_REQUEST['email']).'" and
                            admin_user_pass="'.$password.'" and status'
                    );
                    if($r==false){
                    //Login failed, take us to the main login page which has a captcha
                    header('Location: /site/core/');
                    die();
                    }

                    // success! set the session variable, then redirect
                    $_SESSION['userdata']=$r;
                    $groups=json_decode($r['admin_user_group']);
                    $_SESSION['userdata']['groups']=array();
                    foreach($groups as $g)
                    $_SESSION['userdata']['groups'][$g]=true;
                    
                }
              //Unset the Post variables
                unset($_POST['action']);
                unset($_REQUEST['action']);
                if(isset($_POST['email']))
                {
                    unset($_POST['email']);
                    unset($_REQUEST['email']);
                }
                if(isset($_POST['password']))
                {
                    unset($_POST['password']);
                    unset($_REQUEST['password']);
                }
            }
            //Now check if logged in
            if(!isset($_SESSION['userdata']))
            {
                //Not logged in. Show login form
            
                $this->login_member = <<<LOGIN
                            <div class="login">
            	<form method="post" action="{$url}">
            		<table>
                    	<tr><th>e-mail</th><td><input type="email"  name="email"/></td><th>Password</th><td><input type="password" name="password" /></td><td><input type="submit" value="Login" name="login_home"/></td></tr>
               		</table>
                </form>
            </div>
LOGIN;
            }
            else
            {
                //logged in
                $this->login_member = <<<LOGGED
                        <div class="login">
                            <ul>
                                <li>Welcome {$_SESSION['userdata']['admin_user_email']}! </li>
                                <li><a href="/core/" target="_blank"> Dashboard </a></li>
                                <li><a href="/site/login/logout.php?redirect="{$url}">Logout</a></li>
                            </ul>
                        </div>
LOGGED;
            }

                
        $this->elements = <<<STICKY
                <div class="sticky">
                    <div class="networking">
                        <ul class="social">
                        <li><a class="twitter" href="https://twitter.com/anonymoussum1" title="Find Me on Twitter!"><img src="/themes/base/images/twitter-logo.png" /></a></li>
                        <li><a class="facebook" href="https://www.facebook.com/aestheticblasphemy" title="Join Me on Facebook!"><img src="/themes/base/images/facebook-logo.png" /></a></li>
                        <li><a class="google" href="https://plus.google.com/101515895294607983592" title="I am on Google+ too!"><img src="/themes/base/images/google-logo.png" /></a></li>
                        <li><a class="linkedin" href="http://www.linkedin.com/profile/view?id=79711957" title="For Professional Networking"><img src="/themes/base/images/linkedin-logo.png" /></a></li>
                        </ul>
                    </div>
STICKY;
                $this->elements .= $this->login_member;
                $this->elements .= '       </div>';
    }
}
