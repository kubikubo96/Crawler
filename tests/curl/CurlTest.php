<?php

require __DIR__ . "/../../app/curl/Curl.php";

use PHPUnit\Framework\TestCase;
use App\Curl\Curl;

class CurlTest extends TestCase
{
    public function urlProvider()
    {
        return [
            'url of Dantri' => ['https://dantri.com.vn/xa-hoi/nguoi-ngheo-ha-noi-xep-hang-nhan-gao-mien-phi-o-cay-atm-20200411112515372.htm'],
            'url of Vietnamnet' => ['https://vietnamnet.vn/vn/thoi-su/dan-do-ra-duong-cong-an-bo-doi-van-dong-ve-nha-de-cach-ly-xa-hoi-632697.html?vnn_source=trangchu&vnn_medium=moinong3'],
            'url of Vnexpress' => ['https://vnexpress.net/trung-quoc-di-tren-luoi-dao-4082679.html'],
        ];
    }

    /**
     * @dataProvider urlProvider
     */
    public function testWebContentReturnNotNull($curl)
    {
        $curl = new Curl($curl);

        $this->assertNotEquals("", $curl->getWebContent());
    }
}
