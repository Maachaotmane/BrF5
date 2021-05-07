<?php
include_once APPROOT.'/Views/includes/headerAuth.php'; ?>

<div class="container">
    <div class="d-flex justify-content-center h-100">
        <div class="card" style="height: 600px;">
            <div class="card-header text-center">
                <h3>Sign Up</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="<?php echo URLROOT; ?>users/register">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="nom"
                            class="form-control <?php echo (!empty($data['data']['nom_error'])) ? 'is-invalid' : ''; ?> "
                            placeholder="Nom"
                            value="<?php echo (isset($data['data']['nom'])) ? $data['data']['nom'] : ''; ?>">
                            
                    </div>
                    <?php if (!empty($data['data']['nom_error'])) {
    echo '<small class="text-danger">'.$data['data']['nom_error'].'</small>';
} ?>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="email" name="email"
                            class="form-control <?php echo (!empty($data['data']['email_error'])) ? 'is-invalid' : ''; ?>"
                            placeholder="Email"
                            value="<?php echo  isset($data['data']['email']) ? $data['data']['email'] : ''; ?>">
                    </div>
                    <?php if (!empty($data['data']['email_error'])) {
    echo '<small class="text-danger">'.$data['data']['email_error'].'</small>';
} ?>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password"
                            class="form-control <?php echo (!empty($data['data']['password_error'])) ? 'is-invalid' : ''; ?>"
                            placeholder="Password"
                            value="<?php echo  isset($data['data']['password']) ? $data['data']['password'] : ''; ?>">
                    </div>
                    <?php if (!empty($data['data']['password_error'])) {
    echo '<small class="text-danger">'.$data['data']['password_error'].'</small>';
} ?>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="passwordRepeat"
                            class="form-control <?php echo (!empty($data['data']['passwordRepeat_error'])) ? 'is-invalid' : ''; ?>"
                            placeholder="password Repeat"
                            value="<?php echo  isset($data['data']['passwordRepeat']) ? $data['data']['passwordRepeat'] : ''; ?>">
                    </div>
                    <?php if (!empty($data['data']['passwordRepeat_error'])) {
    echo '<small class="text-danger">'.$data['data']['passwordRepeat_error'].'</small>';
} ?>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-map-marked"></i></span>
                        </div>
                        <input type="text-area" name="address"
                            class="form-control <?php echo (!empty($data['data']['address_error'])) ? 'is-invalid' : ''; ?>"
                            placeholder="Address"
                            value="<?php echo  isset($data['data']['address']) ? $data['data']['address'] : ''; ?>">
                    </div>
                    <?php if (!empty($data['data']['address_error'])) {
    echo '<small class="text-danger">'.$data['data']['address_error'].'</small>';
} ?>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-city"></i></span>
                        </div>
                        <input type="text" name="city"
                            class="form-control <?php echo (!empty($data['data']['city_error'])) ? 'is-invalid' : ''; ?>"
                            placeholder="City"
                            value="<?php echo  isset($data['data']['city']) ? $data['data']['city'] : ''; ?>">
                    </div>
                    <?php if (!empty($data['data']['city_error'])) {
    echo '<small class="text-danger">'.$data['data']['city_error'].'</small>';
} ?>
                    <div class="form-group text-center">
                        <input type="submit" name="submit" value="Register" class="btn login_btn">
                    </div>
                </form> 
                <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Have an account?<a href="<?php echo URLROOT; ?>pages/login">Sign In</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="<?php echo URLROOT; ?>">Back at Home ?</a>
                </div>
            </div>
            </div>
           
        </div>
    </div>
</div>



<?php
include_once APPROOT.'/Views/includes/footerAuth.php'; ?>