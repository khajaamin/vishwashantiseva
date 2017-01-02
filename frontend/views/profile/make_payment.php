<?php
//print_r($profile);exit;
// Merchant key here as provided by Payu
$MERCHANT_KEY = "KRHfD2Fy";

// Merchant Salt as provided by Payu
$SALT = "1QndRCDvhC";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

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
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
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

    <h2>Pay And Access Selected Profile For Forever</h2>
    <br/>
    <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      
      <!-- <div class="container"> -->
      <!-- <div class="form-group">
        <b>Mandatory Parameters <span class="text-danger">*</span></b>
      </div>  -->
        
        <div class="row">
            <div class="col-md-2">
               <label for="email">Amount: </label>        
            </div>
            <div class="col-md-3 ">
                <div class="form-group">
                  <input name="amount" value="100" class="form-control" readOnly="true" />                   
                </div>
   
            </div>
        
            <div class="col-md-offset-1 col-md-2">
               <label for="email">First Name: </label>        
            </div>
            <div class="col-md-3">
              <div class="form-group">
               <input name="firstname" class="form-control" id="firstname" value="<?php if(isset($user->username)){echo $user->username;} ?>">    
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
               <label for="email">Email:  </label>        
            </div>
            <div class="col-md-3">
                <div class="form-group">  
                  <input name="email" id="email" class="form-control" value="<?php if(isset($user->email)){echo $user->email; } ?>" />    
                </div>
            </div>
        
            <div class="col-md-offset-1 col-md-2">
               <label for="email">Phone: </label>        
            </div>
            <div class="col-md-3">
                <div class="form-group">
                  <input name="phone" class="form-control" value="<?php if(isset($profile->mobile)){echo $profile->mobile; } ?>" />
                </div>    
            </div>

        </div>
        

        <div class="row">
            <div class="col-md-2">
               <label for="email">Product Info:  </label>        
            </div>
            <div class="col-md-3">
                <textarea name="productinfo" class="form-control">One profile access</textarea>    
            </div>
        
            <!-- <div class="col-md-3">
               <label for="email">Phone: </label>        
            </div>
            <div class="col-md-3">
                <input name="phone" value="<?php// if(isset($profile->mobile)){echo $profile->mobile; } ?>" />    
            </div>
 -->    </div>

      <!-- </div> -->
        
        <!-- <tr>
          <td><b>Mandatory Parameters</b></td>
        </tr>
        <tr>
          <td>Amount: </td>
          <td><input name="amount" value="100" readOnly="true" /></td>
          <td>First Name: </td>
          <td><input name="firstname" id="firstname" value="<?php //if(isset($user->username)){echo $user->username;} ?>" /></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input name="email" id="email" value="<?php //if(isset($user->email)){echo $user->email; } ?>" /></td>
          <td>Phone: </td>
          <td><input name="phone" value="<?php //if(isset($profile->mobile)){echo $profile->mobile; } ?>" /></td>
        </tr>
        <tr>
          <td>Product Info: </td>
          <td colspan="3"><textarea name="productinfo">One profile access </textarea></td>
        </tr> -->
        <tr>
         
          <td colspan="3"><input type="hidden" name="surl" value="<?php echo Yii::$app->urlManager->createAbsoluteUrl(["profile/paymentsuccess","pid"=>$pid]); ?>" size="64" /></td>
        </tr>
        <tr>
         
          <td colspan="3"><input  type="hidden"  name="furl" value="<?php echo Yii::$app->urlManager->createAbsoluteUrl(["profile/paymentfail","pid"=>$pid]); ?>" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>

        <!--<tr>
          <td><b>Optional Parameters</b></td>
        </tr>
        <tr>
          <td>Last Name: </td>
          <td><input name="lastname" id="lastname" value="<?php //echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /></td>
          <td>Cancel URI: </td>
          <td><input name="curl" value="" /></td>
        </tr>
        <tr>
          <td>Address1: </td>
          <td><input name="address1" value="<?php// echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" /></td>
          <td>Address2: </td>
          <td><input name="address2" value="<?php //echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" /></td>
        </tr>
        <tr>
          <td>City: </td>
          <td><input name="city" value="<?php //echo (empty($posted['city'])) ? '' : $posted['city']; ?>" /></td>
          <td>State: </td>
          <td><input name="state" value="<?php //echo (empty($posted['state'])) ? '' : $posted['state']; ?>" /></td>
        </tr>
        <tr>
          <td>Country: </td>
          <td><input name="country" value="<?php //echo (empty($posted['country'])) ? '' : $posted['country']; ?>" /></td>
          <td>Zipcode: </td>
          <td><input name="zipcode" value="<?php// echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF1: </td>
          <td><input name="udf1" value="<?php //echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
          <td>UDF2: </td>
          <td><input name="udf2" value="<?php //echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF3: </td>
          <td><input name="udf3" value="<?php //echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /></td>
          <td>UDF4: </td>
          <td><input name="udf4" value="<?php //echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /></td>
        </tr>
        <tr>
          <td>UDF5: </td>
          <td><input name="udf5" value="<?php //echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" /></td>
          <td>PG: </td>
          <td><input name="pg" value="<?php //echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" /></td>
        </tr>-->
        <!-- <tr> -->
        <div class="row">
        <?php if(!$hash) { ?>
          <div class=" col-md-2">
            <input type="submit" value="Confirm" class="btn btn-success btn_1"/>
          </div>
         <?php }else{
          ?>

           <div class=" col-md-12 text-center" style="padding :15px;"> <h3><i class="fa fa-spinner fa-spin fa-3" style="font-size:24px"></i> Please wait...</h3></div>
          <?php
          } ?> 
        </div>
          <?php //if(!$hash) { ?>
            <!-- <td colspan="4"><input type="submit" value="Confirm" /></td> -->
          <?php// } ?>
        <!-- </tr> -->
      <!-- </table> -->

    </form>
    </div>
    </div>
  </body>
</html>
