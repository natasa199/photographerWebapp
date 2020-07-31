<div class="contact-box">
        <h2>Admin login!</h2>
        <form method="post" action="">
          <div class="user-box">
            <input type="email" name="email" >
            <label>Email</label>
          </div>
          <div class="user-box">
            <input type="password" name="password">
            <label>password</label>
          </div>
          <p><?php if(isset($msg)) echo $msg;?></p>
          <button class="button "type="submit" name="action" value="login">Login
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            </div>
        </form>
        
      </div>