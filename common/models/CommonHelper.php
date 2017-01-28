<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class CommonHelper extends Model
{


	public static function show ($str)
	{
		if(empty($str))
		{
			return "Not Mentioned"; 
		}
		else
		{
			return $str; 
		}
	}

}

