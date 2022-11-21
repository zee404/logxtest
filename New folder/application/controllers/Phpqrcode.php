<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 *  ============================================================================== 
 *  Author	: Mian Saleem
 *  Email	: saleem@tecdiary.com 
 *  For		: PHP QR Code
 *  Web		: http://phpqrcode.sourceforge.net
 *  License	: open source (LGPL)
 *  ============================================================================== 
 */
require_once APPPATH . "/third_party/phpqrcode/qrlib.php";

class Phpqrcode
{

    public function generate($params = array())
    {
        if (isset($params['black']) && is_array($params['black']) && count($params['black']) == 3 && array_filter($params['black'], 'is_int') === $params['black']) {
            QRimage::$black = $params['black'];
        }
        if (isset($params['white']) && is_array($params['white']) && count($params['white']) == 3 && array_filter($params['white'], 'is_int') === $params['white']) {
            QRimage::$white = $params['white'];
        }
        $params['data'] = (isset($params['data'])) ? $params['data'] : 'QR Code Library';
        if (isset($params['savename'])) {
            $level = 'L';
            if (isset($params['level']) && in_array($params['level'], array('L', 'M', 'Q', 'H')))
                $level = $params['level'];
            $size = 4;
            if (isset($params['size']))
                $size = min(max((int)$params['size'], 1), 10);
            QRcode::png($params['data'], $params['savename'], $level, $size, 2);
            return $params['savename'];
        } else {
            $level = 'L';
            if (isset($params['level']) && in_array($params['level'], array('L', 'M', 'Q', 'H')))
                $level = $params['level'];
            $size = 4;
            if (isset($params['size']))
                $size = min(max((int)$params['size'], 1), 10);
            QRcode::png($params['data'], NULL, $level, $size, 2);
        }
    }
     public function qrcode($type = 'text', $text = null, $size = 4, $level = 'H', $sq = null)
    {
        $file_name = 'assets/uploads/qrcode' . $this->session->userdata('user_id') . ($sq ? $sq : '') . ($this->Settings->barcode_img ? '.png' : '.svg');
        if ($type == 'link') {
            $text = urldecode($text);
        }
        $this->load->library('tec_qrcode', '', 'qr');
        $config = array('data' => $text, 'size' => $size, 'level' => $level, 'savename' => $file_name);
        $this->qr->generate($config);
        $imagedata = file_get_contents($file_name);
        return "<img src='data:image/png;base64,".base64_encode($imagedata)."' alt='{$text}' class='qrimg' />";
    }
/* <div class="col-xs-12 order_barcodes">
 //                           <img src="<?= admin_url('misc/barcode/'.$this->sma->base64url_encode($inv->reference_no).'/code128/74/0/1'); ?>" alt="<?= $inv->reference_no; ?>" class="bcimg" />
  //                          <?= $this->sma->qrcode('link', urlencode(admin_url('purchases/view/' . $inv->id)), 2); ?>
   //                     </div> */
}
