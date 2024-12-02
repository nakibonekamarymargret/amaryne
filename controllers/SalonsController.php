<?php

namespace app\controllers;

use app\models\Appointments;
use app\models\CustomerModel;
use app\models\Services;
use app\models\User;
use Yii;
use yii\web\Controller;
use app\models\SalonModel;
use yii\web\NotFoundHttpException;

class SalonsController extends Controller
{
    public function actionIndex()
{
    $salons = SalonModel::find()
        ->select(['salon.*', 'COUNT(services.id) AS service_count'])
        ->joinWith('services') 
        ->groupBy('salon.id')
        ->orderBy(['service_count' => SORT_DESC])
        ->all();

    return $this->render('index', ['salons' => $salons]);
}

    public function actionView($id)
    {
        $salon = SalonModel::findOne($id);

        if (!$salon) {
            throw new \yii\web\NotFoundHttpException('Salon not found.');
        }

        $services = $salon->getServices()->all();
        $appointment = new Appointments();
        $customer = Yii::$app->user->identity;
        return $this->render('view', [
            'salon' => $salon,
            'services' => $services,
            'appointment' => $appointment,
            'customer' => $customer,
        ]);
    }

}

