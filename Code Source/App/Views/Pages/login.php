<?php
include_once APPROOT.'/Views/includes/headerAuth.php'; ?>
<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3>Sign In</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>
                </div>
            </div>
            <div class="card-body">
                <?php if (isset($data['success'])) {
    echo '<div class="alert alert-success" role="alert">'.$data['success'].'</div>
                      ';
}?>
                <form method="POST" action="<?php echo URLROOT; ?>users/login" >
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="email" name="email" 
                            class="form-control  <?php echo (!empty($data['data']['email_error'])) ? 'is-invalid' : ''; ?>" 
                            placeholder="email"
                        value="<?php echo isset($data['data']['email']) ? $data['data']['email'] : ''; ?>">
                    </div>
                    <?php if (!empty($data['data']['email_error'])) {
    echo '<small class="text-danger">'.$data['data']['email_error'].'</small>';
} ?>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="text" style="-webkit-text-security:square" class="form-control" placeholder="password" name="password"
                        value="<?php echo (isset($data['data']['password'])) ? $data['data']['password'] : ''; ?>">
                        
                    </div>
                    <?php if (!empty($data['data']['password_error'])) {
    echo '<small class="text-danger">'.$data['data']['password_error'].'</small>';
} ?>
                    <div class="row align-items-center remember">
                        <input type="checkbox">Remember Me
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Login" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Don't have an account?<a href="<?php echo URLROOT; ?>pages/register">Sign Up</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="<?php echo URLROOT; ?>">Back at Home ?</a>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include_once APPROOT.'/Views/includes/footerAuth.php'; ?>