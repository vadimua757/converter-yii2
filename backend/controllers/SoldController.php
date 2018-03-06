<?php

namespace backend\controllers;

use common\models\Sold;
use Yii;
use common\models\Data;

class SoldController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionImport()
    {
        Yii::$app->db->createCommand()->truncateTable('sold')->execute();
        $path = Yii::getAlias('@webroot') . '/uploads';

        $file = $path . '/sold.xlsx';
        $data = \moonland\phpexcel\Excel::widget([
            'mode' => 'import',
            'fileName' => $file,
            'setFirstRecordAsKeys' => true, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
            'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
//            'getOnlySheet' => 'sheet1', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
        ]);

        $model = new Sold();

        Yii::$app->db->createCommand()->batchInsert(Sold::tableName(), $model->attributes(), $data)->execute();

        Yii::$app->db->createCommand("DELETE FROM sold WHERE sku IN (SELECT article FROM data)")
            ->execute();

//        $data = Yii::$app->db->createCommand("SELECT sku FROM sold")
//            ->execute();
        \moonland\phpexcel\Excel::export([
            'models' => Sold::find()->all(),
            'columns' => [
                'sku:text:Sku',
            ],
        ]);
    }
}
