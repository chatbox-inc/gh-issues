<?php
namespace Chatbox\GithubIssues\Http\Action;
use Chatbox\GithubIssues\Service\GithubService;
use GuzzleHttp\Exception\ClientException;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/05/25
 * Time: 23:09
 */
class IssueImageAction {

    protected $github;

    /**
     * IssueImageAction constructor.
     *
     * @param $github
     */
    public function __construct(GithubService $github ) {
        $this->github = $github;
    }


    public function __invoke($username,$reponame,$issueno) {
        try{
            $result = $this->github->issue($username,$reponame,$issueno);
        }catch (ClientException $e){
            return  response()->file(app()->basePath("resources/assets/images/default.png"));
        }
        if(is_array($result)){
            if(array_get($result,"state") === "open"){
                return  response()->file(app()->basePath("resources/assets/images/open.png"));
            }else if(array_get($result,"state") === "closed"){
                return  response()->file(app()->basePath("resources/assets/images/close.png"));
            }
        }
        return  response()->file(app()->basePath("resources/assets/images/default.png"));
    }


}
