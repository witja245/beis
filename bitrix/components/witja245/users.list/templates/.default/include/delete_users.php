<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
\Bitrix\Main\Loader::includeModule('sale');

use Bitrix\Sale;

$log_file = "/var/www/b2test.ecobalt.ru/logupd" . time() . ".log";

if (file_exists($log_file))
    unlink($log_file);


function Delete($id_zakaz)
{

    // die();

    global $APPLICATION;

    $isOrderConverted = \Bitrix\Main\Config\Option::get("main", "~sale_converted_15", 'Y');
    $log_file = $_SERVER["DOCUMENT_ROOT"] . "/orders.log";
    $success_delete = array();
    $errors = array();
    foreach($id_zakaz as $id)
    {
        $order = Sale\Order::load($id);
        $success_delete ['WORK'] = "Работаем с заказом " . $id;
        file_put_contents($log_file, $success_delete ['WORK'], FILE_APPEND);

        //отменяем оплаты если есть
        $paymentCollection = $order->getPaymentCollection();
        if($paymentCollection->isPaid())
        {
            $success_delete ['PAY'] = "Оплачен";
            file_put_contents($log_file, $success_delete ['PAY'], FILE_APPEND);

            foreach($paymentCollection as $payment)
            {
                $payment->setReturn("Y");
            }
        }

        //отменяем отгрузки если есть
        $shipmentCollection = $order->getShipmentCollection();

        if($shipmentCollection->isShipped())
        {
            $success_delete ['SHIPPED'] = "Отгружен";
            file_put_contents($log_file, $success_delete ['SHIPPED'], FILE_APPEND);

            $shipment = $shipmentCollection->getItemById($shipmentCollection[0]->getField("ID"));
            $res = $shipment->setField("DEDUCTED", "N");
            if(!$res->isSuccess())
            {
                $success_delete ['ERRORS_1'] = $res->getErrors();
                file_put_contents($log, print_r($res->getErrors(), true), FILE_APPEND);
            }
        }

        $order->save();

        $res_delete = Sale\Order::delete($id);
        if(!$res_delete->isSuccess()) {
            $errors = $res_delete->getErrors();
            file_put_contents($log_file, print_r($success_delete ['ERRORS'], true), FILE_APPEND);
        }
        else
        {
            $success_delete ['DELETE'] = "Заказ " . $id . " удален";
            file_put_contents($log_file, $success_delete ['DELETE'], FILE_APPEND);
        }
        file_put_contents($log_file, "------------\n", FILE_APPEND);?>
        <div class="alert alert-dark" role="alert">
              <?php
                if(!empty($success_delete['WORK'])){
                    echo $success_delete['WORK'].'<br/>';
                }
              if(!empty($success_delete['PAY'])){
                  echo $success_delete['PAY'].'<br/>';
              }
              if(!empty($success_delete['SHIPPED'])){
                  echo $success_delete['SHIPPED'].'<br/>';
              }
              foreach ($errors as $error) {
                  echo $error->getMessage().'<br/>'; // [BX_EMPTY_REQUIRED] Не заполнено обязательное поле "Адрес"
              }
              if(!empty($success_delete['DELETE'])){
                  echo $success_delete['DELETE'].'<br/>';
              }else{
                  echo 'Заказ не удален <br/>';
              }
                ?>
        </div>

   <?php }




}


$id_users = $_POST['delete_item'];
foreach ($id_users as $id):
    if (CUser::Delete($id)) echo "Пользователь с id=".$id." удален.<br/>";
endforeach;




?>

<?php require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
