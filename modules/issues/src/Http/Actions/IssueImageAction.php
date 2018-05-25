<?php
namespace Chatbox\GithubIssues\Http\Action;
use Chatbox\GithubIssues\Service\GithubService;

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
        $result = $this->github->issue($username,$reponame,$issueno);
        dd($result);


    }


}
