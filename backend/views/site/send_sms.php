<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Url;

$this->title = 'Send SMS';

if(isset($jsonData)){
  print_r($jsonData);
}
$this->registerJs(
    '$("document").ready(function(){
       $("#submit").click(function(){
            
            var msidn = $("#msisdn").val();
            var mesg = $("#msg").val();    
            var response = "";
            var url1 =  "http://sms.vndsms.com/vendorsms/pushsms.aspx?user=vishwa&password=vishwa&sid=WEBSMS&fl=0&gwid=2&msisdn="+msidn+"&msg="+mesg;            
            $.ajax({
                  type: "GET",
                  dataType: "jsonp",
                  url: url1,
                  async: false,
                  success: function(data)
                  {
                    $.ajax({
                          type:"GET",
                          dataType: "jsonp",
                          url: "http://localhost/vishwashantiseva/public_html/backend/index.php?r=site/sendsms",
                          data:data,
                          async: false,
                          success: function(data)
                          {
                            $("#result").append(data);
                          }
                    });
                  }
            });                
        });
    });'
);

?>
    <h2>Send Sms Form</h2>
    <div id="result"></div>
    <div class="col-md-4">
            <div class="form-group">
                <input class="form-control" type="text" name="msisdn" id="msisdn">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="msg" id="msg"></textarea>    
            </div>
            <div class="form-group">
                <button class=" btn btn-primary" id="submit">Send SMS</button>
            </div>
        </div>

</div>
