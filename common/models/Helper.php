<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class Helper extends Model
{
    
    public  static function getActiveInActiveStatus($status =null)
    {
        $statusList = ['1'=>'Active','0'=>'InActive']; 
        if(empty($status))
        {
            return $statusList;
        }
        else
        {
            return $statusList[$status];
        }
    }
    public  static function getSuccessFailureStatus($status =null)
    {
        $statusList = ['1'=>'Success','0'=>'Failure']; 
       
        if(empty($status))
        {
            return $statusList;
        }
        else
        {
            return $statusList[$status];
        }
    }
}
