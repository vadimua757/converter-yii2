<?php

namespace backend\controllers;

use common\models\Sku;
use common\models\Valgold;
use common\models\Valsilver;
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
class DataController extends Controller
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

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Data model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Data model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Data();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

    /**
     * Updates an existing Data model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Data model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Data model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Data the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Data::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUpload()
    {
        $model = new Data();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->upload()) {
                // file is uploaded successfully
                Yii::$app->session->setFlash('alert', [
                    'body' => Yii::t('backend', 'Uploaded'),
                    'options' => ['class' => 'alert alert-success']
                ]);
//                return $this->refresh();
                return $this->render('index', ['model' => $model]);
            }
        }

        return $this->render('upload', ['model' => $model]);

    }

    public function actionImport() {
        $searchModel = new DataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Data();

        Yii::$app->db->createCommand()->truncateTable('data')->execute();
        //получаем список всех жанров
//        $types = Types::model()->findAll();
        //ищем все сохраненные игры (их id)
//        $existingIds = Data::model()->getExistingIds();
        $errors = array();
        $results = '';
        $inputFile =  file_get_contents(Yii::getAlias('@webroot') . '/uploads/blago.xml');
//        $inputFile = Yii::$app->db->createCommand('SELECT url FROM config WHERE 1')
//           ->queryOne();
//        print_r($inputFile);
//        die();
//        $inputFile = implode($inputFile);
        //обработка команды
            libxml_use_internal_errors(true);
            //загружаем xml фид
            $xml = simplexml_load_string($inputFile);
//            print_r($xml);
//            die();
            if (!$xml) {
                $errors = libxml_get_errors();
                print_r($errors);
            }
            else {
                $i = 0;
                //парсинг фида
                foreach ($xml->product as $data) {

                    $newData = new Data;
                    //заполняем атрибуты
                    $newData->type = $data->product_type;
                    $newData->article = $data->sku;
//                    $newData->article2 = $data->xml_id;
                    $newData->name = $data->name . ' ' . $data->properties->brand . ' ' . $data->properties->model;
                    $newData->zu = $data->name;
//                    $newData->idmodel = $data->cml2_link;
                    $newData->ksh = $data->kcx;
                    $newData->lo = $data->stock;
//                    $newData->lo_id = $data->person;
//                    $newData->amount = $data->availability;
                    $newData->np_status = $data->transfer;
                    $minprice = preg_replace("/[^\d.]/", '', $data->price_min);
                    $newData->minprice = $minprice;
                    $price = preg_replace("/[^\d.]/", '', $data->price_roz);
                    $newData->price = $price;
//                    $newData->g_download_link = $data->price_sell;
                    $newData->marketprice = preg_replace("/[^\d.]/", '', $data->price_rin);
                    $newData->display = preg_replace("/[^0-9]/", '', $data->properties->display);
                    $newData->korpus = preg_replace("/[^0-9]/", '', $data->properties->korpus);
                    $newData->komments = $data->properties->komments;
                    $newData->proba = $data->properties->sample;
                    $newData->allweight = $data->properties->weight_all;
                    $newData->vstweight = $data->properties->weight_vst;
                    $newData->pureweight = $data->properties->weight_pure;
                    $newData->brand = $data->properties->brand;
                    $newData->model = $data->properties->model;
                    $newData->defect = $data->defect;
                    $newData->mvd = $data->mvd;
                    $newData->category = $data->category;
                    $newData->barcode = $data->barcode;
//                    $marzha = (($price/$minprice)/$price)*100;
//                    $newData->marzha = $marzha;
//                    print_r(($price/$minprice)/$price*100);
//                    die();
                    //сохраняем товар в БД

                    $newData->save();
                    if (!$newData->save(false)) {
                        echo 'Не могу сохранить товар с артикулом '.$newData->article;
                    }
                    else {
                        $i++;
                    }

                }
//                echo 'Сохранено товаров '.$i;
//                $query = "SELECT * FROM v2";

//                Yii::$app->session->setFlash('info', [
//                    'body' => Yii::t('backend', 'Сохранено товаров '.$i),
//                    'options' => ['class' => 'alert alert-success']
//                ]);
//                return $this->refresh();
                return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
            }
        //показываем форму
//        $this->render('import',
//            array('xml'=>Yii::$app->user->xml, 'errors'=>$errors, 'results'=>$results));
    }

    public function actionRefactor()
    {
        $searchModel = new DataSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $model = new Data();

        $result = Yii::$app->db->createCommand('SELECT * FROM v2')
            ->queryAll(PDO::FETCH_NUM);
        $rows = V2::find()->count();

        for ($i = 0 ; $i < $rows ; ++$i) {
            $row = ArrayHelper::getValue($result,"$i");

            //    Автоматическая привязка id элемента каталога
            Yii::$app->db->createCommand("UPDATE data SET idmodel = '$row[6]' WHERE zu = '$row[1]' AND type = 'Tech'")
                ->execute();
        }

        $resultgold = Yii::$app->db->createCommand('SELECT * FROM valgold')
            ->queryAll(PDO::FETCH_NUM);
        $rowsg = Valgold::find()->count();

        for ($i = 0 ; $i < $rowsg ; ++$i) {
            $rowg = ArrayHelper::getValue($resultgold,"$i");

            //    Автоматическая привязка id элемента каталога
            Yii::$app->db->createCommand("UPDATE data SET idmodel = '$rowg[5]' WHERE zu = '$rowg[1]' AND type = 'Gold'")
                ->execute();
            Yii::$app->db->createCommand("DELETE FROM data WHERE name = '$rowg[1]' AND allweight < '$rowg[2]' AND type = 'Gold'")
                ->execute();
            Yii::$app->db->createCommand("UPDATE data SET idmodel = '$rowg[5]' WHERE zu = '$rowg[1]' AND type = 'Diamond'")
                ->execute();
            Yii::$app->db->createCommand("DELETE FROM data WHERE name = '$rowg[1]' AND allweight < '$rowg[2]' AND type = 'Diamond'")
                ->execute();
        }

        $resultsilv = Yii::$app->db->createCommand('SELECT * FROM valsilver')
            ->queryAll(PDO::FETCH_NUM);
        $rowss = Valsilver::find()->count();

        for ($i = 0 ; $i < $rowss ; ++$i) {
            $rows = ArrayHelper::getValue($resultsilv,"$i");

            //    Автоматическая привязка id элемента каталога
            Yii::$app->db->createCommand("UPDATE data SET idmodel = '$rows[5]' WHERE zu = '$rows[1]' AND type = 'silver'")
                ->execute();
            Yii::$app->db->createCommand("DELETE FROM data WHERE name = '$rows[1]' AND allweight < '$rows[2]' AND type = 'silver'")
                ->execute();
        }

        Yii::$app->db->createCommand("DELETE FROM data WHERE zu = 'Аксессуары'")
            ->execute();
//        Yii::$app->db->createCommand("DELETE FROM data WHERE lo = 0")
//            ->execute();
        Yii::$app->db->createCommand("UPDATE data SET ucenka = 'Y' WHERE price < minprice")
            ->execute();
        Yii::$app->db->createCommand("DELETE FROM data WHERE price < 200 AND type != 'silver'")
            ->execute();
        Yii::$app->db->createCommand("DELETE FROM data WHERE price < 150 AND type = 'silver'")
            ->execute();
        Yii::$app->db->createCommand("UPDATE data SET amount = 1 WHERE  np_status != 1")
            ->execute();
        Yii::$app->db->createCommand("DELETE FROM data WHERE  proba < 585 AND type = 'Gold'")
            ->execute();
//        Yii::$app->db->createCommand("DELETE FROM data WHERE  proba < 585 AND type = 'Diamond'")
//            ->execute();
        Yii::$app->db->createCommand("DELETE FROM data WHERE  mvd = 'Y'")
            ->execute();
        Yii::$app->db->createCommand("DELETE FROM data WHERE  lo = 900")
            ->execute();
        Yii::$app->db->createCommand("DELETE FROM data WHERE  category = 'Стандарт' OR category = 'Лом' AND zu != 'Годинник'")
            ->execute();


        $result = Yii::$app->db->createCommand('SELECT * FROM lo')
            ->queryAll(PDO::FETCH_NUM);

        $rows = Lo::find()->count();

        for ($i = 0 ; $i < $rows ; ++$i) {
            $row = ArrayHelper::getValue($result,"$i");

            Yii::$app->db->createCommand("UPDATE data SET lo_id = '$row[2]' WHERE lo = '$row[1]'")
                ->execute();
            Yii::$app->db->createCommand("UPDATE data SET city = '$row[3]' WHERE lo = '$row[1]'")
                ->execute();
            Yii::$app->db->createCommand("UPDATE data SET active = '$row[4]' WHERE lo = '$row[1]'")
                ->execute();
        }

//        Yii::$app->db->createCommand("DELETE FROM data WHERE active = 0")
//            ->execute();
        Yii::$app->db->createCommand("DELETE FROM data WHERE idmodel = 0")
            ->execute();


//        $result = Yii::$app->db->createCommand('SELECT * FROM sku')
//            ->queryAll(PDO::FETCH_NUM);
//        $rows = Sku::find()->count();
//        for ($i = 0 ; $i < $rows ; ++$i) {
//            $row = ArrayHelper::getValue($result,"$i");
//            Yii::$app->db->createCommand("DELETE FROM data WHERE article = '$row[1]'")
//                ->execute();
//        }
//        Yii::$app->db->createCommand("DELETE FROM data WHERE active = 0")
//            ->execute();


        // deleting doubles
        Yii::$app->db->createCommand("DELETE FROM data WHERE id NOT IN (SELECT * FROM (SELECT MIN(n.id) FROM data n GROUP BY n.article) x)")
            ->execute();

//        Yii::$app->db->createCommand("UPDATE data SET article = TRIM(LEADING 'ДОН' FROM article)")
//            ->execute();


//        return $this->render('index', ['model' => $model]);
        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                ]);
    }

    public function actionExport(){
        $skuArray = Yii::$app->db->createCommand('SELECT * FROM data')->queryAll();
//        $skuArray = (new \yii\db\Query())
//            ->select(['*'])
//            ->from('data')
//            ->limit(10);

//        var_dump($skuArray);
//        die();

//        $skuArray = array();

        $filePath = 'uploads/sku.xml';

        $dom     = new DOMDocument('1.0', 'utf-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;

        $root1      = $dom->createElement('blagos');
        $root      = $dom->createElement('products');

        for($i=0; $i<count($skuArray); $i++){

            $bookLo        =  $skuArray[$i]['lo_id'];

            $bookArticle      =  $skuArray[$i]['article'];

            $bookKorpus    =  $skuArray[$i]['korpus'];
            $bookDisplay    =  $skuArray[$i]['display'];

            $bookName    =  htmlspecialchars($skuArray[$i]['name']);

            $bookKSH     =  $skuArray[$i]['ksh'];

            $bookKomments      =  htmlspecialchars($skuArray[$i]['komments']);

            $bookMarketprice  =  $skuArray[$i]['marketprice'];
            $bookRealprice  =  $skuArray[$i]['price'];
            $bookMinprice  =  $skuArray[$i]['minprice'];
            $bookIdmodel  =  $skuArray[$i]['idmodel'];
            $bookOstatok  =  $skuArray[$i]['amount'];
            $bookBrand  =  $skuArray[$i]['brand'];
            $bookBrand  =  htmlspecialchars($bookBrand);
            $bookModel  =  $skuArray[$i]['model'];
//            $bookAkcprice  =  $skuArray[$i][''];
            $bookType  =  $skuArray[$i]['type'];
            $bookProba  =  $skuArray[$i]['proba'];
            $bookVstweight  =  $skuArray[$i]['vstweight'];
            $bookAllweight  =  $skuArray[$i]['allweight'];
            $bookPureweight  =  $skuArray[$i]['pureweight'];
            $bookUcenka  =  $skuArray[$i]['ucenka'];
            $bookCity  =  $skuArray[$i]['city'];
            $bookDefect  =  $skuArray[$i]['defect'];

            $book = $dom->createElement('product');

//        $book->setAttribute('id', $bookId);
            $name     = $dom->createElement('product_type', $bookType);

            $book->appendChild($name);

            $name     = $dom->createElement('xml_id', $bookArticle);

            $book->appendChild($name);

            $name     = $dom->createElement('name', $bookName);

            $book->appendChild($name);

            $name     = $dom->createElement('cml2_link', $bookIdmodel);

            $book->appendChild($name);

            $name     = $dom->createElement('num_days_pros', $bookKSH);

            $book->appendChild($name);

            $name     = $dom->createElement('person', $bookLo);

            $book->appendChild($name);

            $name     = $dom->createElement('amount', $bookOstatok);

            $book->appendChild($name);

//        $name     = $dom->createElement('artnumber', $bookArticle);
//
//        $book->appendChild($name);

            $name     = $dom->createElement('price_min', $bookMinprice);

            $book->appendChild($name);

            $name     = $dom->createElement('price_roz', $bookRealprice);

            $book->appendChild($name);

//            $name     = $dom->createElement('price_sell', $bookAkcprice);
//
//            $book->appendChild($name);

            $name     = $dom->createElement('price_rin', $bookMarketprice);

            $book->appendChild($name);

            $name     = $dom->createElement('offers_city', $bookCity);

            $book->appendChild($name);

            $name     = $dom->createElement('supplier', 'blago');

            $book->appendChild($name);
            $prop = $dom->createElement('properties');
            $name     = $dom->createElement('offers_type', $bookType);
            $prop->appendChild($name);

            $name     = $dom->createElement('comments',$bookKomments);
            $prop->appendChild($name);

            $name     = $dom->createElement('offers_brand', $bookBrand);
            $prop->appendChild($name);

            $name     = $dom->createElement('model', $bookModel);
            $prop->appendChild($name);

            $name     = $dom->createElement('display', $bookDisplay);
            $prop->appendChild($name);

            $name     = $dom->createElement('korpus', $bookKorpus);
            $prop->appendChild($name);
            $name     = $dom->createElement('offers_sample', $bookProba);
            $prop->appendChild($name);
            $name     = $dom->createElement('weight_vst', $bookVstweight);
            $prop->appendChild($name);
            $name     = $dom->createElement('weight', $bookAllweight);
            $prop->appendChild($name);
            $name     = $dom->createElement('weight_pure', $bookPureweight);
            $prop->appendChild($name);
            $name     = $dom->createElement('ucenka', $bookUcenka);
            $prop->appendChild($name);
            $name     = $dom->createElement('defect', $bookDefect);
            $prop->appendChild($name);
            $book->appendChild($prop);

            $root->appendChild($book);
            $root1->appendChild($root);

        }

        $dom->appendChild($root1);

        $dom->save($filePath);

        return Yii::$app->response->sendFile($filePath);
    }
    public function actionDownload() {
        $path = Yii::getAlias('@webroot') . '/uploads';

        $file = $path . '/sku.xml';

        if (file_exists($file)) {

            Yii::$app->response->sendFile($file);

        }
    }
    public function actionSold()
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

    public function actionSvodnaja()
    {
        \moonland\phpexcel\Excel::export([
            'models' => Data::find()->all(),
            'columns' => [
                'article:text:article',
                'lo:raw:lo',
            ],
        ]);
    }
}

