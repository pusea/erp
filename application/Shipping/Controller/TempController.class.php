<?php
namespace Shipping\Controller;
use Common\Controller\AppframeController;
use SystemRecord\Model\SystemRecordModel;
header("content-Type:text/html;charset=utf-8");
class TempController extends AppframeController {
    private $lock_write_data = 'lock_shtw_data.lock';
    protected $urls = array(
        'send_order' => 'https://www.hct.com.tw/phone/searchGoods_Main_Xml.ashx',
    );
    public function _initialize() {
        parent::_initialize();
    }
    /*
     * 森鸿台湾抓取的物流信息归纳
     */
    public function grap(){

        $sql = "SELECT
	track_number,status_label
FROM
	erp_order_shipping
WHERE
	track_number IN (
		8613021491,
		8613013684,
		8613013544,
		8613013511,
		8613014771,
		8613014664,
		8613007686,
		8613007664,
		8613007653,
		8613008530,
		8613013216,
		8613009650,
		8613009646,
		8613007476,
		8613020846,
		8613009554,
		8613007384,
		8613008261,
		8613014244,
		8613007281,
		8613006006,
		8613014222,
		8613005973,
		8613014082,
		8613014071,
		8613007992,
		8613007104,
		8613007082,
		8613009241,
		8613009182,
		8613009112,
		8613013802,
		8613012225,
		8613012203,
		8613008946,
		8613008935,
		8613008913,
		8613010873,
		8613008891,
		8366086223,
		8613010840,
		8613010836,
		8613006684,
		8613006640,
		8613013566,
		8613008784,
		8366081006,
		8613011993,
		8613008740,
		8613008725,
		8613010685,
		8613008714,
		8613011956,
		8613008692,
		8613008681,
		8613010604,
		8613008633,
		8613006463,
		8613008622,
		8613008611,
		8613008596,
		8613010534,
		8613011805,
		8613011772,
		8613010475,
		8613013275,
		8613011713,
		8613011691,
		8613011676,
		8613010383,
		8613010346,
		8613011610,
		8613010324,
		8613020905,
		8613011503,
		8613010221,
		8613020802,
		8613011470,
		8613010195,
		8613006054,
		8613011466,
		8366091952,
		8613010151,
		8613011411,
		8613011400,
		8613011363,
		8613005925,
		8613020651,
		8613011330,
		8613011326,
		8613011282,
		8613009985,
		8613011245,
		8613012494,
		8613012472,
		8613011175,
		8613012424,
		8613012391,
		8613009134,
		8613006931,
		8613013850,
		8613009064,
		8613009053,
		8613010991,
		8613009020,
		8613006835,
		8613020286,
		8613008994,
		8613012236,
		8366081150,
		8366091381,
		8366084856,
		8366091160,
		8366084624,
		8366085641,
		8366091974,
		8366080446,
		8366085405,
		8366082701,
		8613021970,
		8366060253,
		8613026892,
		8613021524,
		8613021885,
		8613020135,
		8613021815,
		8366082314,
		8366061325,
		8366060021,
		8613021712,
		8366083493,
		8366080936,
		8366061281,
		8613021266,
		8613025341,
		8613022784,
		8613014734,
		8613018654,
		8366083412,
		8613019903,
		8613017335,
		8366059892,
		8366082060,
		8613018525,
		8613021060,
		8613025142,
		8613026413,
		8366088360,
		8613017162,
		8613020975,
		8613024980,
		8613018315,
		8613016985,
		8366059520,
		8613020791,
		8613024836,
		8613022456,
		8613016871,
		8613022320,
		8613020614,
		8613025960,
		8613022202,
		8366080122,
		8613022132,
		8366082631,
		8366081356,
		8366087704,
		8613020360,
		8613017803,
		8366085136,
		8366086400,
		8366083832,
		8613021616,
		8613022036,
		8613015180,
		8613020275,
		8613021911,
		8613021465,
		8366088791,
		8613025525,
		8613020150,
		8613021826,
		8366090003,
		8366089966,
		8366061605,
		8613016215,
		8613021745,
		8366084786,
		8366083504,
		8366080940,
		8366061292,
		8613022810,
		8366061546,
		8613021270,
		8366089885,
		8613018665,
		8366059936,
		8366091075,
		8613025260,
		8366089782,
		8366082093,
		8613021152,
		8613018540,
		8366085873,
		8613019811,
		8613021082,
		8613007620,
		8366063904,
		8366090972,
		8613022574,
		8613017195,
		8613015891,
		8366090880,
		8366085766,
		8613026354,
		8613020986,
		8366090876,
		8366085755,
		8366088275,
		8366090821,
		8613025002,
		8613009624,
		8613018341,
		8366060894,
		8366090762,
		8613017000,
		8366089454,
		8366085571,
		8613024862,
		8613018212,
		8613007314,
		8613007292,
		8613016904,
		8613012925,
		8366090600,
		8613026041,
		8613022386,
		8366090563,
		8613020640,
		8613015515,
		8613008062,
		8366091786,
		8613019310,
		8366087914,
		8613022224,
		8366089126,
		8613022143,
		8613020393,
		8613017825,
		8613016543,
		8366091554,
		8366086433,
		8613021631,
		8613026984,
		8613025702,
		8613019052,
		8366091506,
		8613017733,
		8366081220,
		8366090176,
		8366079934,
		8613021981,
		8613021550,
		8366058982,
		8366087586,
		8613023053,
		8613020216,
		8613026844,
		8613021476,
		8366083670,
		8613022913,
		8613021771,
		8613021340,
		8366082266,
		8613020043,
		8613017464,
		8366084790,
		8613018713,
		8366086046,
		8366061255,
		8366082163,
		8613021642,
		8613007712,
		8366083375,
		8613018595,
		8366061141,
		8613017280,
		8613025186,
		8613021093,
		8366082023,
		8613026446,
		8613022596,
		8366080693,
		8613015902,
		8613023823,
		8613019730,
		8613026376,
		8613022530,
		8366087052,
		8613020990,
		8613020920,
		8613023720,
		8613013113,
		8613014351,
		8366060824,
		8613024906,
		8613009484,
		8613016915,
		8613019461,
		8613026063,
		8613015530,
		8613023414,
		8613016720,
		8613017991,
		8613022235,
		8366082734,
		8366080170,
		8613019203,
		8613023285,
		8366086514,
		8613020441,
		8613013920,
		8613016580,
		8613022110,
		8366081290,
		8613017755,
		8613026940,
		8613022003,
		8613021572,
		8613020290,
		8366079945,
		8366091300,
		8366087435,
		8366083434,
		8366061115,
		8366088080,
		8366082723,
		8366081404,
		8613022095,
		8366079901,
		8613024324,
		8613025595,
		8613021933,
		8366091366,
		8366081124,
		8366061443,
		8613021863,
		8613022950,
		8366061664,
		8613024206,
		8613021395,
		8613021804,
		8366091226,
		8366089922,
		8366083482,
		8366061266,
		8613021244,
		8613025326,
		8366091123,
		8613022736,
		8366061185,
		8366088500,
		8613016020,
		8613022600,
		8613022552,
		8366090913,
		8366079470,
		8366060986,
		8613025061,
		8613015821,
		8366090832,
		8366089550,
		8366085630,
		8613009543,
		8366083036,
		8366081754,
		8366090681,
		8613022423,
		8613020706,
		8613016856,
		8366089270,
		8366081581,
		8366085383,
		8366090460,
		8613022246,
		8366084016,
		8613016650,
		8613007922,
		8366089045,
		8613022121,
		8366081301,
		8366082572,
		8613023156,
		8366085103,
		8613021583,
		8366090180,
		8613017571,
		8613020102,
		8366091230,
		8366089944,
		8366061583,
		8366088636,
		8613026645,
		8366088533,
		8613018606,
		8613019870,
		8613017291,
		8366090961,
		8613019752,
		8366085803,
		8613026391,
		8366089605,
		8613018396,
		8613026295,
		8613018282,
		8366089432,
		8366090703,
		8613026155,
		8613019483,
		8366088065,
		8366059413,
		8366090526,
		8366086595,
		8613019225,
		8366091646,
		8366082454,
		8366084775,
		8366061804,
		8366074150,
		8366076320,
		8366063020,
		8366042145,
		8366078604,
		8366040804,
		8366061642,
		8366072691,
		8366073936,
		8366074964,
		8366070532,
		8366036081,
		8366068863,
		8366072245,
		8366078232,
		8366062390,
		8366032242,
		8366076946,
		8366073450,
		8366063646,
		8366070226,
		8366063510,
		8366066026,
		8366070090,
		8366074463,
		8366042510,
		8366063333,
		8366034364,
		8366015372,
		8366063311,
		8365979274,
		8366038542,
		8366074286,
		8366042075,
		8366039426,
		8366077311,
		8366014716,
		8366072433,
		8366072201,
		8366074684,
		8366073332,
		8366072982,
		8366078700,
		8366035344,
		8366040852,
		8366074043,
		8366073844,
		8366072540,
		8366079595,
		8366079466,
		8366073461,
		8366071571,
		8366032032,
		8366076622,
		8366074382,
		8366041110,
		8366038505,
		8366077764,
		8366072923,
		8366032706,
		8366033502,
		8366074124,
		8366073870,
		8366035075,
		8366041784,
		8366073590,
		8366072223,
		8366073413,
		8366035801,
		8366077871,
		8366033001,
		8366038520,
		8366036980,
		8366036873,
		8366021543,
		8366056871,
		8366045520,
		8365978390,
		8366055493,
		8366051632,
		8366056694,
		8366048736,
		8366036582,
		8366051046,
		8366019933,
		8366047115,
		8366047056,
		8366050862,
		8366054955,
		8366024671,
		8366021020,
		8366038715,
		8366044470,
		8366017085,
		8365962765,
		8366030046,
		8366016993,
		8366016901,
		8366019082,
		8366031030,
		8366029744,
		8366017914,
		8366023691,
		8365964563,
		8366030886,
		8366025916,
		8366025872,
		8365965311,
		8366018533,
		8365962942,
		8366030234,
		8366031096,
		8365967326,
		8366031903,
		8365991480,
		8366006471,
		8366000075,
		8365993926,
		8366011474,
		8365999994,
		8365993764,
		8365989881,
		8366008674,
		8366009945,
		8366001022,
		8365996203,
		8365991060,
		8366004732,
		8366008405,
		8366001991,
		8366007101,
		8365999434,
		8366007031,
		8365994475,
		8365993112,
		8366009385,
		8366005546,
		8365966943,
		8366000392,
		8366007974,
		8365964003,
		8365992924,
		8365965204,
		8365990242
	)";
        $res = M()->query($sql);

        $status = '';
        foreach($res as $key=>$value){
//            var_dump($value);
            if(strpos($value['status_label'],'配送中')!==false||strpos($value['status_label'],'已抵達')!==false||strpos($value['status_label'],'途中')!==false){
                $status = '派送中';
            }
            elseif(strpos($value['status_label'],'送達。貨物件數')!==false){
                $status = '送達';
                $sign_time = '';
            }
            elseif(strpos($value['status_label'],'所保管中')!==false){
                $status = '問題件';

            }
            elseif(strpos($value['status_label'],'取收回')!==false||strpos($value['status_label'],'拒絕')!==false){
                $status = '拒絕';
            }
            if($status&&$value['status_label'])
            {
                echo $value['track_number']."\n";
                $this->shipping_grap($status,$value['status_label'],$value['track_number'],$sign_time = '');
            }
        }
    }
    /*
     * 抓取结果写入系统
     */
    public function shipping_grap($status,$grap_status,$track_number,$sign_time = ''){
        $shipping_api_name = "\\Shipping\\Lib\\ShippingApi";
        $shipping_api_model = new $shipping_api_name();
        $shipping_api_model->track_number = $track_number;
        $shipping_api_model->status_name = $grap_status;
        switch($status){
            case '派送中':
                $shipping_api_model->status_type = '派送中';
                break;
            case '送達':
                $shipping_api_model->status_type = '順利送達';
                break;
            case '問題件':
                $shipping_api_model->status_type = '問題件';
                break;
            case '拒絕':
                $shipping_api_model->status_type = '拒收';
                break;
        }
        $result = $shipping_api_model->update_status($sign_time);
    }
    /*
     * 结果处理
     */
    protected function result_handler($result){
        $return = array();
        $xml = $this->decrypt($result);
        $obj = simplexml_load_string($xml);
        $result = json_decode(json_encode($obj),TRUE);
//        file_put_contents('6.txt',json_encode($result),FILE_APPEND);
        foreach($result['orders'] as $key=>$v){
            if(is_array($v['order'])){
                foreach($v['order'] as $vv){
                    $track_number = $vv['@attributes']['orderid'];
                    $grap_status = $vv['@attributes']['status'];
                    if(strpos($vv['@attributes']['status'],'配送中')!==false||strpos($vv['@attributes']['status'],'已抵達')!==false||strpos($vv['@attributes']['status'],'途中')!==false){
                        $status = '派送中';
                        break;
                    }
                    elseif(strpos($vv['@attributes']['status'],'送達。貨物件數')!==false){
                        $status = '送達';
                        $sign_time = $vv['@attributes']['wrktime'];
                        break;
                    }
                    elseif(strpos($vv['@attributes']['status'],'所保管中')!==false){
                        if(strpos($vv['@attributes']['status'],'取收回')!==false||strpos($vv['@attributes']['status'],'拒絕')!==false){
                            $status = '拒絕';
                        }else{
                            $status = '問題件';
                        }
                    }
                    elseif(strpos($vv['@attributes']['status'],'取收回')!==false||strpos($vv['@attributes']['status'],'拒絕')!==false){
                        $status = '拒絕';
                        break;
                    }
                }
                $this->shipping_grap($status,$grap_status,$track_number,$sign_time = '');
            }
        }
    }
    /*
   * no加密
   */
    public function encrypt($input) {
        $date = date('Ymd');
        $key = date('Ymd',strtotime("$date +76 day"));
        $iv = 'QJWOQPAC';  //$iv为加解密向量
        $size = 8; //填充块的大小,单位为bite    初始向量iv的位数要和进行pading的分组块大小相等!!!
        $input = $this->pkcs5_pad($input, $size);  //对明文进行字符填充
        $td = mcrypt_module_open(MCRYPT_DES, '', 'cbc', '');    //MCRYPT_DES代表用DES算法加解密;'cbc'代表使用cbc模式进行加解密.
        mcrypt_generic_init($td, $key, $iv);
        $data = mcrypt_generic($td, $input);    //对$input进行加密
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        $data = base64_encode($data);   //对加密后的密文进行base64编码
        return $data;
    }
    /*
    * 对明文进行给定块大小的字符填充
    */
    public function pkcs5_pad($text, $blocksize) {
        $pad = $blocksize - (strlen($text) % $blocksize);
        return $text . str_repeat(chr($pad), $pad);
    }

    /*
    * 在采用DES加密算法,cbc模式,pkcs5Padding字符填充方式,对密文进行解密函数
    */
    public function decrypt($crypt) {
        $crypt = base64_decode($crypt);   //对加密后的密文进行解base64编码
        $date = date('Ymd');
        $key = date('Ymd',strtotime("$date +76 day"));
        $iv = 'QJWOQPAC';  //$iv为加解密向量
        $td = mcrypt_module_open(MCRYPT_DES, '', 'cbc', '');    //MCRYPT_DES代表用DES算法加解密;'cbc'代表使用cbc模式进行加解密.
        mcrypt_generic_init($td, $key, $iv);
        $decrypted_data = mdecrypt_generic($td, $crypt);    //对$input进行解密
        mcrypt_generic_deinit($td);
        mcrypt_module_close($td);
        $decrypted_data = $this->pkcs5_unpad($decrypted_data); //对解密后的明文进行去掉字符填充
        $decrypted_data = rtrim($decrypted_data);   //去空格
        return $decrypted_data;
    }

    public function pkcs5_unpad($text) {
        $pad = ord($text{strlen($text)-1});
        if ($pad>strlen($text))
            return false;
        return substr($text,0, -1 * $pad);
    }
    protected function post($url,$data=array(),$ssl=true){
        $ch = curl_init();
        if ($ssl){
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 1);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        }
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_TIMEOUT,1800);
        if(is_array($data)){
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        }else {
            curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($data));
        }
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    private function returnResult($error=0, $message='', $data = array()){
        header("content-type: application/json");
        $result['error'] = $error;
        $result['message'] = $message;
        if(!empty($data)){
            $result['data'] = $data;
        }
        echo json_encode($result);exit;
    }
    public function kill_lock(){
        if (file_exists(CACHE_PATH.$this->lock_write_data)) {
            unlink(CACHE_PATH.$this->lock_write_data);
            echo '删除成功';
        }
    }
}
