<div class="contact-box">
        <h2>Add new picture for portfolio</h2>
        <form action="../adminPortfolio/" method="post" enctype="multipart/form-data">
          <div class="user-box">
            <input type="text" name="caption">
            <label>Caption</label>
          </div>
          <div class="user-box">
            <input type="text" name="opacityCaption">
            <label>Opacity caption</label>
          </div>
          <p><?php if(isset($msg)) echo $msg;?></p>
          Select Image File to Upload:
<input type="file" name="fileInsert">
<input type="submit" name="action" value="Insert"> 

            <span></span>
            <span></span>
            <span></span>
            <span></span>
            </div>
        </form>
        
      </div>