<?php

namespace backend\controllers;

use common\models\Sku;
use Yii;
use common\models\Data;
use common\models\DataSearch;
use common\models\V2;
use common\models\Lo;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use DOMDocument;
use yii\helpers\ArrayHelper;
use PDO;
use common\models\Sold;


/**
 * DataController implements the CRUD actions for Data model.
 */
class StatController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Data models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        global $tmp;
        $tech1 = Yii::$app->db->createCommand('SELECT lo, count(lo) AS total_point FROM data WHERE type = "Tech" GROUP BY lo')
            ->queryAll(PDO::FETCH_NUM);

        foreach($tech1 as $row) :
            $tmp .= '["'.$row[0]. '", '.(int)$row[1].'],'."</br>";
        endforeach;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'tmp' => $tmp,
            'dataProvider' => $dataProvider,
        ]);
    }
}

