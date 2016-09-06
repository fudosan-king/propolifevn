<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header" align="left">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h4 class="modal-title" id="myModalLabel"><?php echo __('購買情報','ems'); ?></h4>
</div>
<div class="modal-body">

<div class="form-group has-feedback">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-user"></i></span>
<input type="text" name="fullname" class="form-control" placeholder="Fullname" data-error="Oh, must be input fullname" required>
</div>
<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
<span class="help-block with-errors"></span>
</div>

<div class="form-group has-feedback">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
<input type="email" name="mailaddress" pattern="^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" placeholder="name@email.com" data-error="Oh, The value is not a valid email address" required>
</div>
<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
<span class="help-block with-errors"></span>
</div>

<div class="form-group has-feedback">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-phone"></i></span>
<input type="tel" name="phone" pattern="[0-9]{10,14}" class="form-control" placeholder="Phone" data-error="Oh, that phone is invalid" required>
</div>
<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
<span class="help-block with-errors"></span>
</div>

<div class="form-group has-feedback">
<textarea name="address" class="form-control" placeholder="Address" required></textarea>
<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
<span class="help-block with-errors"></span>
</div>
<div class="form-group has-feedback">
<textarea placeholder="Message" class="form-control" name="message"></textarea>
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('キャンセル','ems'); ?></button>
<input type="submit" class="btn btn-danger" name="muahang" value="<?php echo __('支払い','ems'); ?>" />
</div>
</div>
</div>
</div>