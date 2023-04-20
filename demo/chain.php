<?php
class WebPage {
    private $url;
    private $content;

    public function __construct($url) {
        $this->url = $url;
    }

    public function get_content() {
        $curl = curl_init($this->url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $this->content = curl_exec($curl);
        curl_close($curl);
    }

    public function get_links() {
        $links = array();
        preg_match_all('/<a.*?href="(.*?)".*?>/i', $this->content, $matches);
        foreach ($matches[1] as $link) {
            if (strpos($link, 'http') === 0) {
                $links[] = $link;
            } else {
                $links[] = $this->url . '/' . ltrim($link, '/');
            }
        }
        return $links;
    }

    public function get_titles() {
        $titles = array();
        preg_match_all('/<h2.*?>(.*?)<\/h2>/i', $this->content, $matches);
        foreach ($matches[1] as $title) {
            $titles[] = $title;
        }
        return $titles;
    }
}
//  dữ liệu từ trang vnexpress
$vnexpress = new WebPage('https://vnexpress.net');
$vnexpress->get_content();
$links = $vnexpress->get_links();
$titles = $vnexpress->get_titles();
echo "Links from vnexpress: " . implode(", ", $links) . "\n";
echo "Titles from vnexpress: " . implode(", ", $titles) . "\n";

// Crawl dữ liệu từ trang vietnamnet
$vietnamnet = new WebPage('https://https://vietnamnet.vn/thoi-su');
$vietnamnet->get_content();
$links = $vietnamnet->get_links();
$titles = $vietnamnet->get_titles();
echo "Links from vietnamnet: " . implode(", ", $links) . "\n";
echo "Titles from vietnamnet: " . implode(", ", $titles) . "\n";
