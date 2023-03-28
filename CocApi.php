<?php
class CocApi {
    public $config;

    public function __construct () {
        $this->config = [
            'cocApiToken' => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjQxYjJiZGUwLTExNjctNGZlMy04Y2Y0LTY4MmZlZDY0NTQ3NyIsImlhdCI6MTY3OTg0NDg1Niwic3ViIjoiZGV2ZWxvcGVyL2ZhNmE4ZDQ5LWZjNzQtM2M5Ny00MDUyLTYwMjlkNWQxOGQ4ZiIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjEzNi4xNTguNTcuNDYiXSwidHlwZSI6ImNsaWVudCJ9XX0.1nuaSksm-u9DR8fOvTK9SVhS4yRsc9YBorkmDCDXkVolewmTEAxmiX9-jqnrjcOQWFs-SlYWHwaAofEzGe6PPw",
            'cocUrl' => "https://api.clashofclans.com/v1"
        ];
    }

    public function getClan() {
        $search = 'barurot';
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
        }
        $url = $this->config['cocUrl'].'/clans?name='.$search;
        return $this->setCurl($url);
    }

    public function setCurl($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer '.$this->config['cocApiToken']
        ]);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        
        $response = curl_exec($curl);
        echo $response;
    }

    public function getClanDetails() {
        $search = $_GET['tag'];
        $url = $this->config['cocUrl'].'/clans/%23'.$search;
        return $this->setCurl($url);
    }
}