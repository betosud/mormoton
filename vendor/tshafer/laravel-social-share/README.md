# Laravel SocialShare

## Installation

First, pull in the package through Composer.

```js
composer require tshafer/laravel-social-share
```

And then, if using Laravel 5, include the service provider within `app/config/app.php`.

```php
'providers' => [
    // ... Illuminate Providers
    // ... App Providers
    Tshafer\SocialShare\ServiceProvider::class
];
```

And, for convenience, add a facade alias to this same file at the bottom:

```php
'aliases' => [
    // ... Illuminate Facades
    'Share' => Tshafer\SocialShare\Facades\SocialShare::class
];
```

## Usage

```php
Share::delicious(route('post.show', $post->id), $post->title, $post->thumbnail);
Share::digg(route('post.show', $post->id), $post->title, $post->thumbnail);
Share::evernote(route('post.show', $post->id), $post->title, $post->thumbnail);
Share::facebook(route('post.show', $post->id), $post->title, $post->thumbnail);
Share::gmail(route('post.show', $post->id), $post->title, $post->thumbnail);
Share::googleplus(route('post.show', $post->id), $post->title, $post->thumbnail);
Share::linkedin(route('post.show', $post->id), $post->title, $post->thumbnail);
Share::pinterest(route('post.show', $post->id), $post->title, $post->thumbnail);
Share::reddit(route('post.show', $post->id), $post->title, $post->thumbnail);
Share::scoopit(route('post.show', $post->id), $post->title, $post->thumbnail);
Share::springpad(route('post.show', $post->id), $post->title, $post->thumbnail);
Share::tumblr(route('post.show', $post->id), $post->title, $post->thumbnail);
Share::twitter(route('post.show', $post->id), $post->title, $post->thumbnail);
Share::viadeo(route('post.show', $post->id), $post->title, $post->thumbnail);
Share::vkcom(route('post.show', $post->id), $post->title, $post->thumbnail);
```
