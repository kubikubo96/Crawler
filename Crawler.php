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

    protected function _get_images()
    {
        if (!empty($this->content)) {
//            $regex_images = '/src\s*=\s*"([^data].+?)"/m';
            $regex_images = '/src="([^data].*?)"/m';
            preg_match_all($regex_images, $this->content, $images);
            return !empty($images[1]) ? $images[1] : FALSE;
        }
    }

    protected function _get_titles()
    {
        if (!empty($this->content)) {
            $regex_titles = '/<h3><a href="\/.*?>(.*?)<\/a><\/h3>/m';
            preg_match_all($regex_titles, $this->content, $titles);
            return !empty($titles[1]) ? $titles[1] : FALSE;
        }
    }
}

//show all website
//$uri = "https://cafebiz.vn/";
//echo file_get_contents($uri);

//$crawl = new Crawler('https://vietnamnet.vn/');
$crawl = new Crawler('https://cafebiz.vn/   ');
$ttt = $crawl->get('images');
//$ttt = $crawl->get('titles');

//echo "images= " . $ttt . "<br>";
//echo "links = " . $ttt . "<br>";
//echo "titles = " . $ttt . "<br>";

foreach ($ttt as $tt) {
    echo "$tt";
    echo "<br>";
}

//var_dump($ttt);