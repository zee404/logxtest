<?php defined('BASEPATH') OR exit('No direct script access allowed');



//use PHPQRCode\QRcode;
require_once APPPATH . "/third_party/phpqrcode/qrlib.php";
class Tec_qrcode
{

    public function generate($params = array()) {
        $params['data'] = (isset($params['data'])) ? $params['data'] : 'http://www.cyanbs.com';
        QRcode::png($params['data'], $params['savename'], 'H', 2, 0);
        return $params['savename'];
    }

}
