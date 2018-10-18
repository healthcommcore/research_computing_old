<p>
Please note that Research Computing’s regular support hours are Monday to Friday, 9am to 5pm. Computing support is not an on-call service. However, in emergencies or system outages that have a broad impact, we will respond after hours to the best of our ability. 
</p>
<p>
All requests that are not outage related will be handled on a first-come, first-served basis. Due to the number of ongoing requests and projects, please plan for up to <strong>two weeks</strong> for your request to be completed.
</p>
<p>Please complete the following form to request Research Computing assistance:</p>
<div class="form-inline">
  <div class="form-group">
    <?php print render( $form['first_name']); ?>
  </div>
  <div class="form-group">
    <?php print render( $form['last_name']); ?>
  </div>
</div>
<div class="form-inline">
  <div class="form-group">
    <?php print render( $form['partners_username']); ?>
  </div>
  <div class="form-group">
    <?php print render( $form['dfci_id']); ?>
  </div>
  <div class="form-group">
    <?php print render( $form['dfci_dept']); ?>
  </div>
</div>
<div class="form-inline">
  <div class="form-group">
    <?php print render( $form['dfci_email']); ?>
  </div>
  <div class="form-group">
    <?php print render( $form['phone']); ?>
  </div>
  <div class="form-group">
    <?php print render( $form['location']); ?>
  </div>
</div>
<div class="clearfix">
  <div class="col-md-5">
    <div class="form-group">
      <?php print render( $form['request_type']); ?>
    </div>
  </div>
</div>
<div class="clearfix">
  <div class="col-md-5">
    <div class="form-group">
      <?php print render( $form['impact']); ?>
    </div>
  </div>
</div>
<div class="clearfix">
  <div class="col-md-5">
    <div class="form-group">
      <?php print render( $form['service_category']); ?>
    </div>
  </div>
</div>
<div class="clearfix">
  <div class="col-md-5">
    <div class="form-group">
      <?php print render( $form['request_description']); ?>
    </div>
  </div>
</div>
<div class="clearfix">
  <div class="col-md-5">
    <?php print render( $form['upload'] ); ?>
  </div>
</div>

  <?php print render( $form['buttons']['submit'] ); ?>
