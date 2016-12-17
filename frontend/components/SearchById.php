<?php
namespace frontend\components;
 
 
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;
use common\models\ProfilesSearch; 
 
class SearchById extends Component
{
	 public function welcome()
	 {
	 	$ProfileSearch = new ProfilesSearch(); 
	 	return Yii::$app->controller->renderPartial("/profile/search_by_id",['model'=>$ProfileSearch]);
	 }
 
}
?>