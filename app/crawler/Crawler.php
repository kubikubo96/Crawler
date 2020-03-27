<?php

class Crawler
{
    protected $content = "";

    public function __construct($uri)
    {
        $this->content = $this->getContent($uri);
    }

    //crawler data from url
    public function getContent($uri)
    {
        //file_get_contents() return the contents of the file into a string
        return file_get_contents($uri);
    }

    public function get($type)
    {
        $method = "_get_{$type}";
        if (method_exists($this, $method)) {
            return call_user_func(array($this, $method));
        }
    }

    protected function _get_titles()
    {
        if (!empty($this->content)) {
            $regex_titles = '/<div id="ArticleContent"(.*?)<div class="m-t-10 ArticleDateTime clearfix">/ms';
            preg_match_all($regex_titles, $this->content, $titles);
            return !empty($titles[1]) ? $titles[1] : FALSE;
        }
    }
}


$crawl = new Crawler('https://vietnamnet.vn/vn/ban-doc/chia-se/trao-hon-113-trieu-dong-den-em-nguyen-hong-dinh-ung-thu-trung-that-627737.html');
$ttt = $crawl->get('titles');

echo "<pre>";
print_r($ttt);
echo "</pre>";

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