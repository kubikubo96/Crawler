<?php

namespace App\Crawler;

class Crawler
{
    public function getWebContent($uri)
    {
        return file_get_contents($uri);
    }

    public function getSpecificData($regex, $uri)
    {
        preg_match_all($regex, $this->getWebContent($uri), $matches);
        return !empty($matches[1]) ? $matches[1] : FALSE;
    }
}
//
//class aab extends Crawler
//{
//    function getTitleDanTri($uri)
//    {
//        return $this->getSpecificData('/<title>(.*?)<\/title>/m', $uri);
//    }
//}
//
////
//$abc = new aab();
//$uri = "https://vnexpress.net/suc-khoe/ba-benh-nhan-covid-19-xuat-vien-4075658.html";
//
//echo $abc->getTitleDanTri($uri)[0];
//var_dump($abc->getTitleDanTri($uri));

//
//foreach ($titles as $title) {
//    echo $title;
//}

//$uri = "https://vnexpress.net/the-gioi/hon-1-000-nguoi-chet-covid-19-tang-toc-o-my-4075057.html";
//$regex = '/<title>(.*?)<\/title>/m';
//$crawl = new Crawler;
//var_dump($crawl->getSpecificData($regex, $uri));

/*
 * dantri.com.vn
 */

//get titles dantri.com.vn
//$uri = "https://dantri.com.vn/tam-long-nhan-ai/vo-chong-nghen-ngao-ban-ca-nha-doc-long-cuu-con-20200305160841368.htm";
//$re = '/<h1 class="fon31 mgb15">(.*?)<\/h1>/ms';
//$str = file_get_contents($uri);
//$crawl = new Crawler;
//var_dump($crawl->getContents($re, $str));

//get contents dantri.com.vn
//$uri = "https://dantri.com.vn/kinh-doanh/bo-giao-thong-thay-chu-dau-tu-du-an-cao-toc-gan-5000-ty-dong-20200326155247149.htm";
/*$re = '/<div id="divNewsContent".*?>(.*?)<style>/ms';*/
//$str = file_get_contents($uri);
//$crawl = new Crawler;
//var_dump($crawl->getContents($re, $str));

//$crawl = new Crawler('https://vietnamnet.vn/vn/ban-doc/chia-se/trao-hon-113-trieu-dong-den-em-nguyen-hong-dinh-ung-thu-trung-that-627737.html');
//$regex_titles = '/<div id="ArticleContent"(.*?)<div class="m-t-10 ArticleDateTime clearfix">/ms';
//$ttt = $crawl->getSpecificData($regex_titles);
//
//echo "<pre>";
//print_r($ttt);
//echo "</pre>";

//get titles vnexpress
//$uri = "https://vnexpress.net/the-gioi/hon-1-000-nguoi-chet-covid-19-tang-toc-o-my-4075057.html";
//$re = '/<title>(.*?)<\/title>/m';
//$str = file_get_contents($uri);
//$crawl = new Crawler;
//var_dump($crawl->getContents($re, $str));


//get article vnexpress
//$uri = "https://vnexpress.net/the-gioi/hon-1-000-nguoi-chet-covid-19-tang-toc-o-my-4075057.html";
/*$re = '/<article class="content_detail .*?>(.*?)<\/article>/ms';*/
//$str = file_get_contents($uri);
//$crawl = new Crawler;
//var_dump($crawl->getContents($re, $str));

/*
 *vietnamnet.vn
 */

//get titles vietnamnet.vn
//$uri = "https://vietnamnet.vn/vn/ban-doc/chia-se/trao-hon-113-trieu-dong-den-em-nguyen-hong-dinh-ung-thu-trung-that-627737.html";
/*$re = '/<h1 class="title.*?>(.*?)<\/h1>/m';*/
//$str = file_get_contents($uri);
//$crawl = new Crawler;
//var_dump($crawl->getContents($re, $str));

//get contents vietnamnet.vn
//$uri = "https://vietnamnet.vn/vn/the-thao/bong-da-viet-nam/v-league/v-league-da-tap-trung-bau-duc-tu-choi-dua-ra-dap-an-628297.html";
//$re = '/<div id="ArticleContent"(.*?)<div class="m-t-10 ArticleDateTime clearfix">/ms';
//$str = file_get_contents($uri);
//$crawl = new Crawler;
//var_dump($crawl->getContents($re, $str));