<?php
// SDK de Mercado Pago
require __DIR__ .  '/vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('APP_USR-1159009372558727-072921-8d0b9980c7494985a5abd19fbe921a3d-617633181');
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

# Crear un objeto preferencia
$preference = new MercadoPago\Preference();

$preference->back_urls = array(
  "success" => "https://mpid.herokuapp.com/success",
  "failure" => "https://mpid.herokuapp.com/failure",
  "pending" => "https://mpid.herokuapp.com/pending"
);

$preference->auto_return = "approved";


$preference->payment_methods = array(
  "excluded_payment_methods" => array(
    array("id" => "amex")
  ),
  "excluded_payment_types" => array(
    array("id" => "atm")
  ),
  "installments" => 6
);


$payer = new MercadoPago\Payer();
$payer->name = "Lalo";
$payer->surname = "Landa";
$payer->email = "test_user_58295862@testuser.com";
$payer->phone = array(
  "area_code" => "52",
  "number" => "​5549737300"
);

$payer->address = array(
  "street_name" => "Insurgentes Sur",
  "street_number" => 1602,
  "zip_code" => "0394​0"
);


# Crea ítems en la preferencia
$$item = new MercadoPago\Item();
$item->id = "1234";
$item->title = $_POST['title'];
$item->description = "Dispositivo móvil de Tienda e-commerce";
$item->picture_url = 'https://mpid.herokuapp.com/assets/samsung-galaxy-s9-xxl.jpg';
$item->category_id = "phones";
$item->quantity = 1;
$item->unit_price = $_POST['price'];
$item->notification_url ='https://mpid.herokuapp.com/assets/samsung-galaxy-s9-xxl.jpg';
$item->external_reference ='issadorado@gmail.com';

$preference->items = array($item);
$preference->payer = $payer;

# Guardar y postear la preferencia
$preference->save();

echo $payment->status;

 echo '<a href="'.$preference->sandbox_init_point.'" target="_blank">Pagar con Mercado Pago</a>';


?>


