<div class="contact-box">
        <h2>Contact me!</h2>
        <form method="post" action="">
          <div class="user-box">
            <input type="text" name="name" >
            <label>Name</label>
          </div>
          <div class="user-box">
            <input type="email" name="email">
            <label>Email</label>
          </div>
          <div class="user-box">
            <input type="text" name="message">
            <label>Message</label>
          </div>
          <p><?php if(isset($msg)) echo $msg;?></p>
          <button class="button "type="submit" name="action" value="submit">Submit
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            </div>
        </form>
        
      </div>