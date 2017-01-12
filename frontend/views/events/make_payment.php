<?php
use yii\helpers\Html;
// Merchant key here as provided by Payu
//echo $site->salt.' '.$site->merchant_key.' '.$site->payment_url;
//print_r($event);exit;
$MERCHANT_KEY = "plAebeeQ";

// Merchant Salt as provided by Payu
$SALT = "iCV58CoyKg";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
  
  }
}
$field1=1;
$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
          || empty($posted['service_provider'])
          || empty($posted['udf1'])
  ) {
    $formError = 1;
  } else {
  $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';  
  foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  <body onload="submitPayuForm()">
  <div class="grid_3">

 <div class="container">

    <h2><?= Html::encode(\Yii::t('app', 'Pay for Event Registration')) ?></h2>
    <br/>
    <?php if($formError) { ?>
  
      <span style="color:red"><?= Html::encode(\Yii::t('app', 'Pay for Event Registration')) ?></span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key"  value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      
      

        <div class="row">
            <div class="col-md-2">
               <label for="amount"><?= Html::encode(\Yii::t('app', 'Amount')) ?>: </label>        
            </div>
            <div class="col-md-3 ">
                <div class="form-group">
                  <input name="amount" value="<?php if(isset($event->fees)){echo $event->fees;}else{ echo '';} ?>" class="form-control" readOnly="true" />                   
                </div>
   
            </div>
        
            <div class="col-md-offset-1 col-md-2">
               <label for="firstname"><?= Html::encode(\Yii::t('app', 'Name')) ?>: </label>        
            </div>
            <div class="col-md-3">
              <div class="form-group">
               <input name="firstname" class="form-control" id="firstname" value="<?php if(isset($user->username)){echo $user->username;} ?>">    
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
               <label for="email"><?= Html::encode(\Yii::t('app', 'Email')) ?>:  </label>        
            </div>
            <div class="col-md-3">
                <div class="form-group">  
                  <input name="email" id="email" class="form-control" value="<?php if(isset($user->email)){echo $user->email; } ?>" />    
                </div>
            </div>        
            <div class="col-md-offset-1 col-md-2">
               <label for="phone"><?= Html::encode(\Yii::t('app', 'Phone Number')) ?>: </label>        
            </div>
            <div class="col-md-3">
                <div class="form-group">
                  <input name="phone" class="form-control" value="<?php if(isset($user->mobile_no)){echo $user->mobile_no; } ?>" />
                </div>    
            </div>

        </div>
        <div class="row">
            <div class="col-md-2">
               <label for="productinfo"><?= Html::encode(\Yii::t('app', 'Event Info')) ?>:  </label>        
            </div>
            <div class="col-md-3">
                <textarea name="productinfo" class="form-control" readOnly="true"><?= Html::encode(\Yii::t('app', 'Access for One Event')) ?></textarea>    
            </div>
     </div>   
        
        <tr>
         
          <td colspan="3"><input type="hidden" name="surl" value="<?php echo Yii::$app->urlManager->createAbsoluteUrl(["events/paymentsuccess","pid"=>$pid]); ?>" size="64" /></td>
        </tr>
        <input type="hidden" name="udf1" value="<?php echo $field1; ?>" />
        <tr>
         
          <td colspan="3"><input  type="hidden"  name="furl" value="<?php echo Yii::$app->urlManager->createAbsoluteUrl(["events/paymentfail","pid"=>$pid]); ?>" size="64" /></td>
        </tr>
        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>
        <div class="row">
        <?php if(!$hash) { ?>
          <div class=" col-md-2">
            <input type="submit" value="<?= Html::encode(\Yii::t('app', 'Confirm')) ?>" class="btn btn-success btn_1"/>
          </div>
         <?php }else{
          ?>

           <div class=" col-md-12 text-center" style="padding :15px;"> <h3><i class="fa fa-spinner fa-spin fa-3" style="font-size:24px"></i> <?= Html::encode(\Yii::t('app', 'Please wait')) ?>...</h3></div>
          <?php
          } ?> 
        </div>
    </form>
    </div>
    </div>
  </body>
</html>
