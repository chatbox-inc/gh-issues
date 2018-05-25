<?php
namespace Chatbox\GithubIssues\Service;
use GuzzleHttp\Client;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/05/25
 * Time: 23:15
 */

class GithubService {

    protected $token;

    /**
     * GithubService constructor.
     *
     * @param $token
     */
    public function __construct( $token ) {
        $this->token = $token;
    }


    protected function request($url,$options=[]){
        $client = new Client([
            'base_uri' => 'https://api.github.com/',
        ]);
        $options["headers"] = array_merge(array_get($options,"headers",[]),[
            "Authorization" => "token {$this->token}"
        ]);
        return $client->request("get",$url,$options);
    }

    /**
     * @see https://developer.github.com/v3/issues/#get-a-single-issue
     */
    public function issue($owner,$repo,$number){
        $url = "/repos/{$owner}/{$repo}/issues/{$number}";
        $response =  $this->request($url);
        if($response->getStatusCode() == 200){
            return json_decode($response->getBody()->getContents(),true);
        }
        return null;
    }

}

