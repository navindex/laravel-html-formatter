<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;
use Navindex\HtmlFormatter\Formatter;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\StreamedResponse;

class HtmlFormatter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Support\Facades\Request  $request
     * @param  \Closure                             $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (($response instanceof BinaryFileResponse) or
            ($response instanceof JsonResponse) or
            ($response instanceof RedirectResponse) or
            ($response instanceof StreamedResponse)
        ) {
            return $response;
        }

        if (!App::environment('production') || !Config::get('htmlformatter.safety', true)) {

            $contentType = $response->headers->get('Content-Type');
            if (strpos($contentType, 'text/html') !== false) {
                $response->setContent($this->format($response->getContent()));
            }
        }

        return $response;
    }

    /**
     * Format a HTML string.
     *
     * @param string $content String to format
     *
     * @return string Formatted string
     */
    protected function format(string $content): string
    {
        $config = Config::get('htmlformatter', []);

        $action = $config['action'] ?? null;
        unset($config['action'], $config['safety']);

        if (empty($action) || !method_exists(Formatter::class, $action)) {
            return $content;
        }

        return (new Formatter($config))->$action($content);
    }
}
