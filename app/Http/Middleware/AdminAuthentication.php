<?php

namespace App\Http\Middleware;
use Illuminate\Contracts\Auth\Guard; // Authを利用するためのuse
use Illuminate\Http\RedirectResponse; // リダイレクトクラスを利用するためのuse
use Closure;

class AdminAuthentication
{
    protected $auth;
    
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) //リクエストするユーザーがログインしているかどうか
        {
            if ($this->auth->user()->admin == 7) //ユーザーが管理者かどうか
            {
                return $next($request);
            }
        }
        // 管理者でない場合はリダイレクトでTOPページへ戻る
        return new RedirectResponse(url('/'));
    
    }
}