<?php
namespace Chatbox\GithubIssues;
use Chatbox\GithubIssues\Http\Action\IssueImageAction;
use Chatbox\GithubIssues\Service\GithubService;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

/**
 * Created by PhpStorm.
 * User: mkkn
 * Date: 2018/05/25
 * Time: 23:06
 */

class GithubIssueUtilServiceProvider extends ServiceProvider {

    public function boot() {

        Route::get("/{owner}/{repo}/issues/{number}",IssueImageAction::class);

        $this->app->booted(function () {
            $this->app['router']->getRoutes()->refreshNameLookups();
            $this->app['router']->getRoutes()->refreshActionLookups();
        });

    }

    public function register(  ) {

        $this->app->singleton(GithubService::class,function(){
            return new GithubService(env("GITHUB_API_TOKEN"));
        });

    }
}
