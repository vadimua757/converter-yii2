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

        //find number of products
        $tech = (new \yii\db\Query())
            ->select(['type'])
            ->from('data')
            ->where(['type' => 'tech'])
            ->count();

        $silver = (new \yii\db\Query())
            ->select(['type'])
            ->from('data')
            ->where(['type' => 'silver'])
            ->count();
        $gold = (new \yii\db\Query())
            ->select(['type'])
            ->from('data')
            ->where(['type' => 'gold'])
            ->count();
        $diamond = (new \yii\db\Query())
            ->select(['type'])
            ->from('data')
            ->where(['type' => 'diamond'])
            ->count();

        //
        $techVal = Yii::$app->db->createCommand('SELECT lo, count(lo) AS total_point FROM data WHERE type = "Tech" GROUP BY lo')
            ->queryAll(PDO::FETCH_NUM);
        $goldVal = Yii::$app->db->createCommand('SELECT lo, count(lo) AS total_point FROM data WHERE type = "Gold" GROUP BY lo')
            ->queryAll(PDO::FETCH_NUM);
        $diamondVal = Yii::$app->db->createCommand('SELECT lo, count(lo) AS total_point FROM data WHERE type = "Diamond" GROUP BY lo')
            ->queryAll(PDO::FETCH_NUM);
        $silverVal = Yii::$app->db->createCommand('SELECT lo, count(lo) AS total_point FROM data WHERE type = "Silver" GROUP BY lo')
            ->queryAll(PDO::FETCH_NUM);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

            'techVal' => $techVal,
            'goldVal' => $goldVal,
            'diamondVal' => $diamondVal,
            'silverVal' => $silverVal,

            'gold' => $gold,
            'diamond' => $diamond,
            'silver' => $silver,
            'tech' => $tech,
        ]

        );
    }
}

